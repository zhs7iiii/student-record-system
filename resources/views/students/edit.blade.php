@props(['courses', 'countries', 'student'])
@php
    $current_course = $student->course;
    $current_subject = $student->subject;
    $current_season = $student->season;
    $current_country = $student->country;
    $current_state = $student->state;
    $current_city = $student->city;
    $season = $student->season;
@endphp
<x-layout title="Student Registration">
    <x-slot:heading>Student Registration</x-slot:heading>
    <form action="/students/{{ $student->id }}" method="post" class="mx-10 my-5 w-full text-xl">
        @csrf
        @method('PATCH')
        <x-forms.select id="course" label="Select Course" name="course_id" class="text-center">
            <option value="">--SELECT--</option>
            @foreach ($courses as $course)
                @if ($course->id === $current_course->id)
                    <option selected value="{{ $course->id }}">{{ $course->short_name }}</option>
                @else
                    <option value="{{ $course->id }}">{{ $course->short_name }}</option>
                @endif

            @endforeach
        </x-forms.select>

        <x-forms.select id="subject" label="Select Subject" name="subject_id" class="text-center">
            <option value="">--SELECT--</option>
            <option selected value="{{ $current_subject->id }}">
                {{ $current_subject->subject1 . '+' . $current_subject->subject2 . '+' . $current_subject->subject3 . '+' . $current_subject->subject4 }}
            </option>
        </x-forms.select>

        <x-forms.input class="text-center" label="Current Season" name="season"
            value="{{ $season->season_start . '-' . $season->season_end }}" disabled />
        <input type="text" name="season_id" id="" value="{{ $season->id }}" hidden>
        <!-- PERSONAL INFORMATION -->
        <span class="bg-gray-200 block text-center my-5 ">Personal Information</span>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="First Name" name="first_name" value="{{ $student->first_name }}" />
            </div>
            <div class="w-1/2">
                <x-forms.input label="Middle Name" name="middle_name" value="{{ $student->middle_name }}" />
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="Last Name" name="last_name" value="{{ $student->last_name }}" />
            </div>
            <div class="w-1/2">
                <div class="flex">
                    <label for="gender" class="mr-4 w-40 text-right">Gender</label>
                    <div>
                        <input type="radio" name="gender" id="male" value="Male" {{ $student->gender == 'Male' ? 'checked' : '' }} />
                        Male
                        <input type="radio" name="gender" id="female" value="Female" {{ $student->gender == 'Female' ? 'checked' : '' }} />
                        Female
                        <input type="radio" name="gender" id="other" value="Other" {{ $student->gender == 'Other' ? 'checked' : '' }} />
                        Other
                    </div>
                </div>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="Guardian Name" name="guardian_name" value="{{ $student->guardian_name }}" />
            </div>
            <div class="w-1/2">
                
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select label="Family Income" name="income" class="text-center">
                    <option value="">--SELECT--</option>

                    @php
                        $incomes = ['70000' => '70,000', '140000' => '140,000', '250000' => '250,000'];
                    @endphp
                    @foreach ($incomes as $income => $income_label)
                        @if ($income == $student->income)
                            <option selected value="{{ $income }}">{{ $income_label }}</option>
                        @else
                            <option value="{{ $income }}">{{ $income_label }}</option>
                        @endif
                    @endforeach
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.select label="Category" name="category" class="text-center">
                    <option value="">--SELECT--</option>
                    @php
                        $categories = ['DOA', 'DEFT', 'IMP', 'RLR'];
                    @endphp
                    @foreach ($categories as $category)
                        @if ($category == $student->category)
                            <option selected value="{{ $category }}">{{ $category }}</option>
                        @else
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endif
                    @endforeach
                </x-forms.select>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select label="Physically Challenged" name="physically_challenged" class="text-center">
                    <option value="">--SELECT--</option>
                    @foreach (['YES', 'NO'] as $option)
                        @if ($option == $student->physically_challenged)
                            <option selected value="{{ $option }}">{{ $option }}</option>
                        @else
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endif
                    @endforeach
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.input label="Nationality" name="nationality" value="{{ $student->nationality }}" />
            </div>
        </div>
        <!-- CONTACT INFORMATION -->
        <span class="bg-gray-200 block text-center my-5 ">Contact Information</span>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="Mobile Number" name="mobile_number" value="{{ $student->mobile_number }}" />
            </div>
            <div class="w-1/2">
                <x-forms.input label="Email" name="email" type="email" value="{{ $student->email }}" />
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select id="country" label="Country" name="country_id" class="text-center">
                    <option value="">--SELECT--</option>
                    @foreach ($countries as $country)
                        @if ($country->id == $current_country->id)
                            <option selected value="{{ $country->id }}">{{ $country->name }}</option>
                        @else
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endif
                    @endforeach
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.select id="state" label="State" name="state_id" class="text-center">
                    <option value="">--SELECT--</option>
                    <option selected value="{{ $current_state->id }}">{{ $current_state->name }}</option>
                </x-forms.select>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select id="city" label="City" name="city_id" class="text-center">
                    <option value="">--SELECT--</option>
                    <option selected value="{{ $current_city->id }}">{{ $current_city->name }}</option>
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.text-area label="Permanent Address" name="permanent_address">
                    {{ $student->permanent_address }}
                </x-forms.text-area>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.text-area label="Correspondence Address" name="correspondence_address">
                    {{ $student->correspondence_address }}
                </x-forms.text-area>
            </div>
        </div>

        <!-- ACADEMIC INFORMATION -->
        <span class="bg-gray-200 block text-center my-5 ">Academic Information</span>

        <div class="flex justify-evenly">
            <span>Board</span>
            <span>Roll. No</span>
            <span>Year Of Passing</span>
        </div>

        <div class="border-b border-gray-500 mt-3"></div>
        <div class="flex justify-evenly">
            <div class="w-1/3">
                <x-forms.input label="" name="board1" class="mx-5" value="{{ $student->board1 }}" />
                <x-forms.input label="" name="board2" class="mx-5" value="{{ $student->board2 }}" />
            </div>
            <div class="w-1/3">
                <x-forms.input label="" name="roll_no1" class="mx-5" value="{{ $student->roll_no1 }}" />
                <x-forms.input label="" name="roll_no2" class="mx-5" value="{{ $student->roll_no2 }}" />
            </div>
            <div class="w-1/3">
                <x-forms.input label="" name="year_pass1" class="mx-5" value="{{ $student->year_pass1 }}" />
                <x-forms.input label="" name="year_pass2" class="mx-5" value="{{ $student->year_pass2 }}" />
            </div>
        </div>

        <div class="flex justify-evenly">
            <span>S.No</span>
            <span>Subject</span>
            <span>Marks Obtained</span>
            <span>Full Marks</span>
        </div>

        <div class="border-b border-gray-500 mt-3"></div>
        <div class="flex">
            <div class="w-1/4 flex flex-col items-center">
                <div>1.-</div>
                <div>2.-</div>
            </div>
            <div class="w-1/4">
                <x-forms.input label="" name="subject1" class="mx-5" value="{{ $student->subject1 }}" />
                <x-forms.input label="" name="subject2" class="mx-5" value="{{ $student->subject2 }}" />
            </div>
            <div class="w-1/4">
                <x-forms.input label="" name="marks_obtained1" class="mx-5" value="{{ $student->marks_obtained1 }}" />
                <x-forms.input label="" name="marks_obtained2" class="mx-5" value="{{ $student->marks_obtained2 }}" />
            </div>
            <div class="w-1/4">
                <x-forms.input label="" name="full_marks1" class="mx-5" value="{{ $student->full_marks1 }}" />
                <x-forms.input label="" name="full_marks2" class="mx-5" value="{{ $student->full_marks2 }}" />
            </div>
        </div>

        <x-forms.button>Update</x-forms.button>
    </form>
</x-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        $('#country').trigger('change'); // populate states
        $('#state').trigger('change');   // populate cities (if needed)

        $('#country').on('change', function () {
            var countryId = $(this).val();
            if (countryId) {
                $.get('/get-states/' + countryId, function (data) {
                    $('#state').empty().append('<option value="">Select State</option>');
                    $('#city').empty().append('<option value="">Select City</option>');
                    $.each(data, function (key, state) {
                        $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                    });
                });
            } else {
                $('#state').empty().append('<option value="">Select State</option>');
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });

        $('#state').on('change', function () {
            var stateId = $(this).val();
            if (stateId) {
                $.get('/get-cities/' + stateId, function (data) {
                    $('#city').empty().append('<option value="">Select City</option>');
                    $.each(data, function (key, city) {
                        $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                });
            } else {
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });

        $('#course').on('change', function () {
            var courseId = $(this).val();
            if (courseId) {
                console.log('course_id ' + courseId)
                $.get('/get-subjects/' + courseId, function (data) {
                    $('#subject').empty().append('<option value="">--Select Subject--</option>');
                    var current_subject_id = {{ $current_subject->id }}
                        $.each(data, function (key, subject) {
                            $('#subject').append('<option value="' + subject.id + '">' + subject.subject1 + '+' + subject.subject2 + '+' + subject.subject3 + '+' + subject.subject4 + '</option>');
                        });
                });
            } else {
                $('#subject').empty().append('<option value="">--Select Subject--</option>');
            }
        });


    });
</script>