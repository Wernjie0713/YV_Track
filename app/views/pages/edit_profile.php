<style>
    
    .custom-bg-color {
        background-color: #fcbd32; /* card color */
        color: #7c1c2b; /* Example text color */
        
        
    }

    .custom-btn-color{
        background-color: #183d64; /* Set your preferred button background color */
        color: #fff; 
    }

    .custom-card-color{
        background-color: #7c1c2b; /* Set your preferred button background color */
        opacity:1.5;
    }

    .avatar-column {
        width: 1%; /* Adjust the width of the avatar column */
        white-space: nowrap; /* Prevent avatar from breaking into multiple lines */
    }

    .content-column {
        width: 50%; /* Adjust the width of the content column */
        text-align:left;
    }
    
   
</style>
<html>
<head>
<title>Font Awesome 5 Icons</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
</head>

<body>
<div class="card shadow-sm custom-btn-color">
    <div class="card-header">
        <h3 class="card-title" style="color:#fff"><i style='font-size:24px' class='far'>&#xf044;</i>&nbsp;Edit Profile</h3>
        <div class="card-toolbar">
      
        </div>
    </div>
    <div class="card-body custom-bg-color">

                <?php
                    foreach ($data['studentProfile'] as $studentProfile) :
                                    ?>
                                    <?php endforeach; ?>
                                  
                                    <form action="<?php echo URLROOT; ?>/pages/edit_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
    
        <!-- Avatar Section -->
        <div class="row mb-6 " >
            <label class="col-lg-4 col-form-label fw-semibold fs-6" style="color: #7c1c2b;">Avatar</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->stu_photo; ?>')">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->stu_photo; ?>')"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="profile_avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                    
                </div>
                <div class="form-text" style="color: #7c1c2b;">Allowed file types: png, jpg, jpeg.</div>
            </div>
        </div>

        <!-- Full Name Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Full Name</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" pattern="[A-Z ]+" name="stu_name" title="Only capital letters are allowed" type="text" required value="<?php echo $studentProfile->stu_name; ?>" />
            </div>
        </div>

        
        <!-- Email Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Email Address</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="stu_email" type="email" readonly value="<?php echo $studentProfile->stu_email; ?>" />
            </div>
        </div>

        <!-- Gender Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Gender</label>
            <div class="col-lg-8">
                <select class="form-select form-select-solid form-select-lg" name="stu_gender">
                    <option value="<?php echo $studentProfile->stu_gender ?>"><?php echo $studentProfile->stu_gender ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <!-- Age Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Age</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="stu_age" type="number" required value="<?php echo $studentProfile->stu_age; ?>" />
            </div>
        </div>

        <!-- Phone Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Contact Number</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="stu_phone" type="number" required value="<?php echo $studentProfile->stu_phone; ?>" />
            </div>
        </div>
        
        <!-- Institution of Higher Learning Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Institution of Higher Learning</label>
            <div class="col-lg-8">
                <select class="form-select form-select-solid form-select-lg" name="stu_university">
                    <option value="UTM">UTM</option>
                    <option value="UM">UM</option>
                    <option value="UPM">UPM</option>
                    <option value="USM">USM</option>
                    <option value="UTM">Others</option>
                    <!-- Additional options here -->
                </select>
            </div>
        </div>

        <!-- Course Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Course</label>
            <div class="col-lg-8">
             <textarea class="form-control form-control-solid" name="stu_course" pattern="[A-Za-z ]+" rows="3" required><?php echo $studentProfile->stu_course ?></textarea>
            </div>
        </div>

         <!-- Skill Section -->
         <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Skill</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="stu_skill" rows="3" required><?php echo $studentProfile->stu_skill ?></textarea>
                <div class="form-text" style="color: #7c1c2b;">Eg: Skill1, Skill2...</div>
            </div>
        </div>

        <!-- Language  Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Language</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="stu_lan" rows="3" required>
                <?php echo  $studentProfile->stu_lan; ?>
            </textarea>
            <div class="form-text" style="color: #7c1c2b;">Eg: English, Melayu(without "Bahasa")</div>
        
            </div>
        </div>

        <!-- Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Address</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="stu_address" rows="3" required><?php echo $studentProfile->stu_address ?></textarea>
            </div>
        </div>

        <!-- Bio Section -->
        <div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-semibold fs-6" style="color: #7c1c2b;">Bio</label>
    <div class="col-lg-8">
        <textarea class="form-control form-control-solid" name="stu_des" id="stu_des" rows="3" required><?php echo $studentProfile->stu_des ?></textarea>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var textarea = document.getElementById('stu_des');

    // Set the minimum length you want (e.g., 50 characters)
    var minLength = 50;

    textarea.addEventListener('input', function () {
        var value = textarea.value.trim();

        if (value.length < minLength) {
            // You can customize the validation message or take other actions
            textarea.setCustomValidity('Minimum ' + minLength + ' characters required.');
        } else {
            textarea.setCustomValidity('');
        }
    });
});
</script>

        <!-- Submit Button -->
        <div class=" d-flex justify-content-end py-6 px-9">
            <input type="hidden" id="update_student" name="update_student" value="update_student">
            <button type="submit" name="submit" class="btn custom-card-color" style="color:#fff">Update</button>

            <?php
                
                if (isset($_POST['submit'])) {
                  
                    header("Location: " . URLROOT . "/pages/studentprofile");
                    exit(); 
                }
            ?>
        </div>
   
</form>


    </div>

    
    <div class="card-footer"> </div>
</div>
</body>
</html>