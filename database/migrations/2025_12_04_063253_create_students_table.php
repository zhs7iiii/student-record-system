<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Season;
use App\Models\State;
use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(Subject::class);

            $table->foreignIdFor(Season::class);

            $table->foreignIdFor(Country::class);
            $table->foreignIdFor(State::class);
            $table->foreignIdFor(City::class);
            

            $table->string(column: 'first_name')->nullable();
            $table->string(column: 'middle_name')->nullable();
            $table->string(column: 'last_name')->nullable();
            $table->string(column: 'gender')->nullable();
            $table->string(column: 'guardian_name')->nullable();
            $table->string(column: 'income')->nullable();
            $table->string(column: 'category')->nullable();
            $table->string(column: 'physically_challenged')->nullable();
            $table->string(column: 'nationality')->nullable();

            $table->string(column: 'mobile_number')->nullable();
            $table->string(column: 'email')->nullable();
            $table->string(column: 'permanent_address')->nullable();
            $table->string(column: 'correspondence_address')->nullable();

            $table->string(column: 'board1')->nullable();
            $table->string(column: 'board2')->nullable();
            $table->string(column: 'roll_no1')->nullable();
            $table->string(column: 'roll_no2')->nullable();
            $table->string(column: 'year_pass1')->nullable();
            $table->string(column: 'year_pass2')->nullable();


            $table->string(column: 'subject1')->nullable();
            $table->string(column: 'subject2')->nullable();
            $table->string(column: 'marks_obtained1')->nullable();
            $table->string(column: 'marks_obtained2')->nullable();
            $table->string(column: 'full_marks1')->nullable();
            $table->string(column: 'full_marks2')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
