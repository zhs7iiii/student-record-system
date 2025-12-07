<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportWorldData extends Command
{
    protected $signature = 'world:import';
    protected $description = 'Import countries, states, and cities into the database';

    protected $dataPath;

    public function __construct()
    {
        parent::__construct();
        // Use realpath to resolve the data path and avoid \r\n issues
        $this->dataPath = realpath(__DIR__ . '/../../../database/data');
    }

    public function handle()
    {
        $this->info("Starting import...");
        $this->importCountries();
        $this->importStates();
        $this->importCities();
        $this->info("Import finished successfully!");
    }

    protected function importCountries()
    {
        $file = $this->dataPath . '/countries.json';
        if (!file_exists($file)) {
            $this->error("Countries file not found: $file");
            return;
        }

        $this->info("Importing countries...");

        DB::table('countries')->truncate();

        $handle = fopen($file, 'r');
        if (!$handle) {
            $this->error("Failed to open countries file.");
            return;
        }

        // Skip any whitespace and the initial '['
        while (($char = fgetc($handle)) !== false) {
            if ($char === '[')
                break;
        }

        $batch = [];
        $batchSize = 500;
        $depth = 0;
        $buffer = '';
        $allowed = Schema::getColumnListing('countries');

        while (($char = fgetc($handle)) !== false) {

            if ($char === '{')
                $depth++;
            if ($char === '}')
                $depth--;

            $buffer .= $char;

            // Completed one object
            if ($depth === 0 && trim($buffer) !== '') {
                $obj = json_decode($buffer, true);
                if ($obj && is_array($obj)) {
                    $obj = array_intersect_key($obj, array_flip($allowed));
                    $batch[] = $obj;
                }

                if (count($batch) >= $batchSize) {
                    DB::table('countries')->insert($batch);
                    $this->info("Inserted " . count($batch) . " countries...");
                    $batch = [];
                }

                // Reset buffer and skip commas/whitespace
                $buffer = '';
                while (($next = fgetc($handle)) !== false) {
                    if ($next === '{') {
                        $buffer = '{';
                        $depth = 1;
                        break;
                    } elseif ($next === ']') {
                        break 2; // End of array
                    }
                }
            }
        }

        // Insert final batch
        if (!empty($batch)) {
            DB::table('countries')->insert($batch);
            $this->info("Inserted final " . count($batch) . " countries.");
        }

        fclose($handle);

        $this->info("Countries import complete!");
    }



    protected function importStates()
    {
        $file = $this->dataPath . '/states.json';
        if (!file_exists($file)) {
            $this->error("States file not found: $file");
            return;
        }

        $this->info("Importing states...");

        DB::table('states')->truncate();

        $handle = fopen($file, 'r');
        if (!$handle) {
            $this->error("Failed to open states file.");
            return;
        }

        // Skip initial whitespace and '['
        while (($char = fgetc($handle)) !== false) {
            if ($char === '[')
                break;
        }

        $allowed = Schema::getColumnListing('states');
        $maxBatch = floor(999 / count($allowed)); // safe batch size for SQLite
        $batch = [];
        $buffer = '';
        $depth = 0;

        while (($char = fgetc($handle)) !== false) {

            if ($char === '{')
                $depth++;
            if ($char === '}')
                $depth--;

            $buffer .= $char;

            // Completed one object
            if ($depth === 0 && trim($buffer) !== '') {
                $obj = json_decode($buffer, true);
                if ($obj && is_array($obj)) {
                    // Encode translations column if exists
                    if (isset($obj['translations']) && is_array($obj['translations'])) {
                        $obj['translations'] = json_encode($obj['translations']);
                    }

                    // Keep only valid DB columns
                    $obj = array_intersect_key($obj, array_flip($allowed));

                    $batch[] = $obj;
                }

                if (count($batch) >= $maxBatch) {
                    DB::table('states')->insert($batch);
                    $this->info("Inserted " . count($batch) . " states...");
                    $batch = [];
                }

                // Reset buffer and skip commas/whitespace
                $buffer = '';
                while (($next = fgetc($handle)) !== false) {
                    if ($next === '{') {
                        $buffer = '{';
                        $depth = 1;
                        break;
                    } elseif ($next === ']') {
                        break 2; // end of array
                    }
                }
            }
        }

        if (!empty($batch)) {
            DB::table('states')->insert($batch);
            $this->info("Inserted final " . count($batch) . " states.");
        }

        fclose($handle);

        $this->info("States import complete!");
    }


    protected function importCities()
    {
        $jsonFile = $this->dataPath . '/cities.json';

        if (!file_exists($jsonFile)) {
            $this->error("cities.json not found.");
            return;
        }

        $this->info("Importing cities (streaming JSON array)...");

        // Disable foreign key checks
        DB::statement('PRAGMA foreign_keys = OFF');

        DB::table('cities')->truncate();

        $handle = fopen($jsonFile, 'r');

        // Skip ahead to first object "{"
        while (($char = fgetc($handle)) !== false) {
            if ($char === '{') {
                $buffer = '{';
                break;
            }
        }

        $depth = 1;
        $batch = [];
        $batchSize = 500; // sqlite sweet spot

        $allowed = Schema::getColumnListing('cities');

        while (($char = fgetc($handle)) !== false) {

            if ($char === '{') {
                $depth++;
            }
            if ($char === '}') {
                $depth--;
            }

            $buffer .= $char;

            // Completed one object
            if ($depth === 0) {

                $obj = json_decode($buffer, true);

                if (is_array($obj)) {
                    // Encode translations
                    if (isset($obj['translations']) && is_array($obj['translations'])) {
                        $obj['translations'] = json_encode($obj['translations']);
                    }

                    // Keep only valid columns
                    $obj = array_intersect_key($obj, array_flip($allowed));

                    $batch[] = $obj;
                }

                if (count($batch) >= $batchSize) {
                    DB::table('cities')->insert($batch);
                    $this->info("Inserted " . count($batch) . " cities...");
                    $batch = [];
                }

                // Reset buffer & skip commas, whitespace
                $buffer = '';
                while (($next = fgetc($handle)) !== false) {
                    if ($next === '{') {
                        $buffer = '{';
                        $depth = 1;
                        break;
                    } elseif ($next === ']') {
                        break 2; // end of array
                    }
                }
            }
        }

        fclose($handle);

        if (!empty($batch)) {
            DB::table('cities')->insert($batch);
            $this->info("Inserted final " . count($batch) . " cities.");
        }

        // Re-enable foreign key checks
        DB::statement('PRAGMA foreign_keys = ON');

        $this->info("Cities import complete!");
    }



}
