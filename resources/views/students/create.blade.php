@props(['courses','countries','season'])
<x-layout title="Student Registration">
    <x-slot:heading>Student Registration</x-slot:heading>
    <x-forms.form action="/students" method="POST" class="mx-10 my-5">
        <x-forms.select id="course" label="Select Course" name="course_id" class="text-center">
            <option value="">--SELECT--</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->short_name }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select id="subject" label="Select Subject" name="subject_id" class="text-center">
            <option value="">--SELECT--</option>
        </x-forms.select>

        <x-forms.input class="text-center" label="Current Season" name="season" value="{{ $season->season_start.'-'.$season->season_end }}" disabled/>
        <input type="text" name="season_id" id=""  value="{{ $season->id }}" hidden>
        <!-- PERSONAL INFORMATION -->
        <span class="bg-gray-200 block text-center my-5 ">Personal Information</span>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="First Name" name="first_name" />
            </div>
            <div class="w-1/2">
                <x-forms.input label="Middle Name" name="middle_name" />
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="Last Name" name="last_name" />
            </div>
            <div class="w-1/2">
                <div class="flex">
                    <label for="gender" class="mr-4 w-40 text-right">Gender</label>
                    <div>
                        <input type="radio" name="gender" id="male" value="Male">
                        Male
                        <input type="radio" name="gender" id="male" value="Female">
                        Female
                        <input type="radio" name="gender" id="male" value="Other">
                        Other
                    </div>
                </div>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="Guardian Name" name="guardian_name" />
            </div>
            <div class="w-1/2">

            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select label="Family Income" name="income" class="text-center">
                    <option value="">--SELECT--</option>
                    <option value="70000">70,000</option>
                    <option value="140000">140,000</option>
                    <option value="250000">250,000</option>
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.select label="Category" name="category" class="text-center">
                    <option value="">--SELECT--</option>
                    <option value="DOA">DOA</option>
                    <option value="DEFT">DEFT</option>
                    <option value="IMP">IMP</option>
                    <option value="RLR">RLR</option>
                </x-forms.select>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select label="Physically Challenged" name="physically_challenged" class="text-center">
                    <option value="">--SELECT--</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.input label="Nationality" name="nationality" />
            </div>
        </div>
        <!-- CONTACT INFORMATION -->
        <span class="bg-gray-200 block text-center my-5 ">Contact Information</span>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.input label="Mobile Number" name="mobile_number" />
            </div>
            <div class="w-1/2">
                <x-forms.input label="Email" name="email" type="email" />
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select id="country" label="Country" name="country_id" class="text-center">
                    <option value="">--SELECT--</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.select id="state" label="State" name="state_id" class="text-center">
                    <option value="">--SELECT--</option>
                </x-forms.select>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.select id="city" label="City" name="city_id" class="text-center">
                    <option value="">--SELECT--</option>
                </x-forms.select>
            </div>
            <div class="w-1/2">
                <x-forms.text-area label="Permanent Address" name="permanent_address" />
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2">
                <x-forms.text-area label="Correspondence Address" name="correspondence_address" />
            </div>
        </div>

        <!-- ACADEMIC INFORMATION -->
        <span class="bg-gray-200 block text-center my-5 ">Contact Information</span>

        <div class="flex justify-evenly">
            <span>Board</span>
            <span>Roll. No</span>
            <span>Year Of Passing</span>
        </div>

        <div class="border-b border-gray-500 mt-3"></div>
        <div class="flex justify-evenly">
            <div class="w-1/3">
                <x-forms.input label="" name="board1" class="mx-5" />
                <x-forms.input label="" name="board2" class="mx-5" />
            </div>
            <div class="w-1/3">
                <x-forms.input label="" name="roll_no1" class="mx-5" />
                <x-forms.input label="" name="roll_no2" class="mx-5" />
            </div>
            <div class="w-1/3">
                <x-forms.input label="" name="year_pass1" class="mx-5" />
                <x-forms.input label="" name="year_pass2" class="mx-5" />
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
                <x-forms.input label="" name="subject1" class="mx-5" />
                <x-forms.input label="" name="subject2" class="mx-5" />
            </div>
            <div class="w-1/4">
                <x-forms.input label="" name="marks_obtained1" class="mx-5" />
                <x-forms.input label="" name="marks_obtained2" class="mx-5" />
            </div>
            <div class="w-1/4">
                <x-forms.input label="" name="full_marks1" class="mx-5" />
                <x-forms.input label="" name="full_marks2" class="mx-5" />
            </div>
        </div>

        <x-forms.button>Register</x-forms.button>
    </x-forms.form>
</x-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#country').on('change', function() {
        var countryId = $(this).val();
        if(countryId) {
            $.get('/get-states/' + countryId, function(data) {
                $('#state').empty().append('<option value="">Select State</option>');
                $('#city').empty().append('<option value="">Select City</option>');
                $.each(data, function(key, state) {
                    $('#state').append('<option value="'+state.id+'">'+state.name+'</option>');
                });
            });
        } else {
            $('#state').empty().append('<option value="">Select State</option>');
            $('#city').empty().append('<option value="">Select City</option>');
        }
    });

    $('#state').on('change', function() {
        var stateId = $(this).val();
        if(stateId) {
            $.get('/get-cities/' + stateId, function(data) {
                $('#city').empty().append('<option value="">Select City</option>');
                $.each(data, function(key, city) {
                    $('#city').append('<option value="'+city.id+'">'+city.name+'</option>');
                });
            });
        } else {
            $('#city').empty().append('<option value="">Select City</option>');
        }
    });

    $('#course').on('change', function() {
        var courseId = $(this).val();
        if(courseId) {
            console.log('course_id ' + courseId)
            $.get('/get-subjects/' + courseId, function(data) {
                $('#subject').empty().append('<option value="">--Select Subject--</option>');
                $.each(data, function(key, subject) {
                    $('#subject').append('<option value="'+subject.id+'">'+subject.subject1+'+'+subject.subject2+'+'+subject.subject3+'+'+subject.subject4+'</option>');
                });
            });
        } else {
            $('#subject').empty().append('<option value="">--Select Subject--</option>');
        }
    });


});
</script>
