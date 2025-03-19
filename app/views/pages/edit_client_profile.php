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
<div class="card shadow-sm custom-card-color">
    <div class="card-header">
        <h3 class="card-title"style="color:#fff"><i style='font-size:24px' class='far'>&#xf044;</i>&nbsp;Edit Client Profile</h3>
        <div class="card-toolbar">
      
        </div>
    </div>
    <div class="card-body custom-bg-color">

                <?php
                    foreach ($data['clientProfile'] as $clientProfile) :
                                    ?>
                                    <?php endforeach; ?>
                                  
                                    <form action="<?php echo URLROOT; ?>/pages/edit_client_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
  
        <!-- Avatar Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6" style = "color: #183d64;">Avatar</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$clientProfile->client_photo; ?>')">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$clientProfile->client_photo; ?>')"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="profile_avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                    
                </div>
                <div class="form-text" style = "color: #183d64;">Allowed file types: png, jpg, jpeg.</div>
            </div>
        </div>

        <!-- Full Name Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style = "color: #183d64;">Organization Name</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid"pattern="[A-Z ]+" name="client_organization" type="text" required value="<?php echo $clientProfile->client_organization; ?>" />
            </div>
        </div>

        
        <!-- Email Address Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style = "color: #183d64;">Email Address</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="stu_email" type="text" readonly value="<?php echo $clientProfile->client_email; ?>" />
            </div>
        </div>


        <!-- Phone Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style = "color: #183d64;">Contact Number</label>
            <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="client_phone" type="number" required value="<?php echo $clientProfile->client_phone; ?>" />
            </div>
        </div>
        
        <!-- Bio Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6" style = "color: #183d64;">About organization</label>
            <div class="col-lg-8">
                <textarea class="form-control form-control-solid" name="client_des" rows="3" required><?php echo $clientProfile->client_des ?></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class=" d-flex justify-content-end py-6 px-9">
            <input type="hidden" id="update_client" name="update_client" value="update_client">
            <button type="submit" name="submit" class="btn custom-btn-color">Update</button>
            <?php
                
                if (isset($_POST['submit'])) {
                  
                    header("Location: " . URLROOT . "/pages/clientprofile");
                    exit(); 
                }
            ?>
        </div>
    
</form>


    </div>
    <div class="card-footer">
        
    </div>
</div>

</body>
</html>