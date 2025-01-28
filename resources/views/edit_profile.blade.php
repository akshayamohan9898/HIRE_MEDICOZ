<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>
</head>
<body>

<div class="panel panel-default">
    <form method="POST" action="{{ route('candidate.submit') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="uid" value="{{ session('uid') }}">
        <div class="panel-heading wt-panel-heading p-a20"></div>
        <div class="panel-body wt-panel-body p-a20 m-b30">
            
            <div>
                <div class="form-group mb-3">
                    <label for="tye_of_duty" class="control-label">Type of duty</label>
                    <select name="type_of_duty" id="dropdown">
                        <option value="short_term">Short term</option>
                        <option value="long_term">Long Term</option>
                
                    </select>
                </div>
            </div>
           
            <h3>Educational Details:-</h3>
            <div class="educational-details">
                <div class="education">
                    <div class="form-group mb-3">
                        <label for="course" class="control-label">Course</label>
                        <select name="course[]" id="dropdown">
                            <option value="MBBS">MBBS</option>
                            <option value="MD">MD</option>
                            <option value="MS">MS</option>
                            <option value="superspeciality">Super Speciality</option>
                        </select>
                    </div>
                    <div class="specialization1" style="display: none;">
                        <div class="form-group mb-3">
                            <label for="specialization1" class="control-label">Specialization</label>
                            <select name="specialization[]" id="dropdown">
                                <option value="" selected disabled>Select Specialization</option>
                                <option value="Aerospace_Medicine">Aerospace Medicine</option>
                                <option value="Anatomy">Anatomy</option>
                                <option value="Anesthesiology">Anesthesiology</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="specialization2" style="display: none;">
                        <div class="form-group mb-3">
                           
                            <label for="specialization2" class="control-label">Specialization</label>
                            <select name="specialization[]" id="dropdown">
                                <option value="" selected disabled>Select Specialization</option>
                                <option value="ENT">ENT</option>
                                <option value="General_Surgery">General Surgery</option>
                                <option value="Obstetrics_Gynaecology">Obstetrics & Gynaecology</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Registration number</label>
                        <input class="form-control" name="Registration_number[]" type="text">
                    </div>
                    <div class="form-group">
                        <label>College</label>
                        <input class="form-control" name="college[]" type="text">
                    </div>
                    <div class="form-group">
                        <label>Passout Year</label>
                        <input class="form-control" name="Passout_year[]" type="text">
                    </div>
                    <div class="form-group">
                        <label for="certificate">Upload Certificate:</label>
                        <input type="file" name="certificate[]" multiple accept=".pdf">
                    </div>
                </div>
            </div>
            <button type="button" class="add-more-education">Add More</button>

            <br>

            
            <h3>Experience Details:-</h3>
            <div class="experience-details">
                <div class="experience">
                    <div class="form-group">
                        <label>Organization</label>
                        <input class="form-control" name="organization[]" type="text">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input class="form-control" name="duration[]" type="text">
                    </div>
                    <div class="form-group">
                        <label>Duration Type</label>
                        <select name="duration_type[]" id="dropdown">
                            <option value="Days">Days</option>
                            <option value="Months">Months</option>
                            <option value="Years">Years</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description[]" type="text">
                    </div>
                    <div class="form-group">
                        <label for="experience_certificate">Upload Experience Certificate:</label>
                        <input type="file" name="experience_certificate[]" multiple accept=".pdf">
                    </div>
                </div>
            </div>
            <button type="button" class="add-more-experience">Add More</button>

            <br>

           
            <h3>Personal Details:-</h3>
            <div class="form-group">
                <label>Additional Contact Number</label>
                <input 
                            type="tel" 
                            class="form-control" 
                            id="additional_contact_no" 
                            name="additional_contact_no" 
                            pattern="^\d{10}$" 
                             required 
                            placeholder="Enter a 10-digit phone number"
                                >  
            </div>
            <div class="form-group">
                <label>Permanent Address</label>
                <input class="form-control" name="permanent_address" type="text">
            </div>
            <div class="form-group">
                <label>City</label>
                <input class="form-control" name="permanent_city" type="text">
            </div>
            <div class="form-group">
                <label for="permanent_state">State</label>
                <select name="permanent_state" id="dropdown">
                    <option value="Kerala">Kerala</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                </select>
            </div>
            <div class="form-group">
                <label for="permanent_district">District</label>
                <select name="permanent_district" id="dropdown">
                    <option value="Alappuzha">Alappuzha</option>
                    <option value="Ernakulam">Ernakulam</option>
                  
                </select>
            </div>
            <div class="form-group">
                <label>Pincode</label>
                <input class="form-control" name="permanent_pincode" type="text">
            </div>
            <div class="form-group">
                <label>Current Address</label>
                <input class="form-control" name="current_address" type="text">
            </div>
            <div class="form-group">
                <label>City</label>
                <input class="form-control" name="current_city" type="text">
            </div>
            <div class="form-group">
                <label for="current_state">State</label>
                <select name="current_state" id="dropdown">
                    <option value="Kerala">Kerala</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                </select>
            </div>
            <div class="form-group">
                <label for="current_district">District</label>
                <select name="current_district" id="dropdown">
                    <option value="Alappuzha">Alappuzha</option>
                    <option value="Ernakulam">Ernakulam</option>
                  
                </select>
            </div>
            <div class="form-group">
                <label>Pincode</label>
                <input class="form-control" name="current_pincode" type="text">
            </div>

            <div class="text-left">
                <input type="submit" value="Save" name="edit_submit">
            </div>
        </div>
    </form>                                   
</div>
</body>
</html>

 <script>
    document.addEventListener('DOMContentLoaded', function () {

        
       function updateSpecializationFields(courseDropdown) {
    const selectedCourse = courseDropdown.value;
    const specialization1 = courseDropdown.closest('.education').querySelector('.specialization1');
    const specialization2 = courseDropdown.closest('.education').querySelector('.specialization2');

    // Show specialization fields based on the selected course
    if (selectedCourse === 'MD') {
        specialization1.style.display = 'block';
        specialization2.style.display = 'none';
    } else if (selectedCourse === 'MS') {
        specialization1.style.display = 'none';
        specialization2.style.display = 'block';
    } else if (selectedCourse === 'superspeciality') {
        specialization1.style.display = 'block';
        specialization2.style.display = 'block';
    } else {
        specialization1.style.display = 'none';
        specialization2.style.display = 'none';
    }

    // Ensure only the selected specialization is kept in the input when selecting specialization
    const specializationSelect = courseDropdown.closest('.education').querySelectorAll('select[name="specialization[]"]');
    specializationSelect.forEach(function(select) {
        // Clear unselected options
        const selectedOptions = Array.from(select.selectedOptions).map(option => option.value);
        select.value = selectedOptions.length > 0 ? selectedOptions : [];
    });
}

        // Function to ensure MBBS is selected before MD, MS, or Super Speciality
        function enforceMBBSFirst(courseDropdown) {
            const selectedCourse = courseDropdown.value;

            // Check if MD, MS or Super Speciality is selected
            if (selectedCourse !== 'MBBS') {
                // If MBBS is not selected in any of the previous fields, show a warning
                let isMBBSSelected = false;
                document.querySelectorAll('[name="course[]"]').forEach(function (dropdown) {
                    if (dropdown.value === 'MBBS') {
                        isMBBSSelected = true;
                    }
                });

                if (!isMBBSSelected) {
                    alert("Please select MBBS first!");
                    courseDropdown.value = 'MBBS'; // Automatically select MBBS if another course is selected first
                    updateSpecializationFields(courseDropdown); // Update specialization fields
                }
            }
        }

        // Initialize the first course dropdown to have MBBS selected by default
        document.querySelectorAll('[name="course[]"]').forEach(function (courseDropdown) {
            // Set default course to MBBS
            if (courseDropdown.selectedIndex === 0) {
                courseDropdown.value = 'MBBS';
            }

            // Event listener for course change to handle specialization fields
            courseDropdown.addEventListener('change', function() {
                updateSpecializationFields(courseDropdown);
                enforceMBBSFirst(courseDropdown); // Enforce MBBS first if needed
            });

            // Ensure that MBBS is preselected for newly added courses
            if (courseDropdown.closest('.education').querySelector('[name="course[]"]:checked') === null) {
                courseDropdown.value = 'MBBS';
            }
        });

        // Handle Add More Education button click
        document.querySelector('.add-more-education').addEventListener('click', function () {
            const educationSection = document.querySelector('.education');
            const newEducation = educationSection.cloneNode(true); // Clone the section

            // Clear the values in the cloned section (reset the dropdown and other fields)
            newEducation.querySelectorAll('input, select').forEach((field) => {
                if (field.type === 'text') {
                    field.value = '';
                } else if (field.tagName === 'SELECT') {
                    field.selectedIndex = 0; // Default to MBBS
                }
            });

            // Append the new section
            document.querySelector('.educational-details').appendChild(newEducation);

            // Ensure MBBS is selected by default in the new section and update specialization fields
            const newCourseDropdown = newEducation.querySelector('[name="course[]"]');
            newCourseDropdown.value = 'MBBS'; // Ensure MBBS is selected in the new section
            updateSpecializationFields(newCourseDropdown);

            // Add event listener for newly added course dropdown
            newCourseDropdown.addEventListener('change', function() {
                updateSpecializationFields(newCourseDropdown);
                enforceMBBSFirst(newCourseDropdown); // Enforce MBBS first rule
            });
        });

        // Handle Add More Experience button click
    document.querySelector('.add-more-experience').addEventListener('click', function () {
        const experienceSection = document.querySelector('.experience');
        const newExperience = experienceSection.cloneNode(true); // Clone the section

        // Clear the values in the cloned section (reset all fields)
        newExperience.querySelectorAll('input, select').forEach((field) => {
            if (field.type === 'text') {
                field.value = '';
            } else if (field.tagName === 'SELECT') {
                field.selectedIndex = 0; // Reset dropdowns to the first option
            }
        });

        // Append the new section to the experience details container
        document.querySelector('.experience-details').appendChild(newExperience);
    });


    });
</script>














