<style>
    
    .custom-bg-color {
        background-color: #fcbd32; /* Replace 'yourCustomColor' with your preferred color code */
        /* You can also add other styles like text color, padding, border-radius, etc. */
        color: #7c1c2b; /* Example text color */
        /* Add any other styles to customize your card */
       
    }

    .custom-btn-color{
        background-color: #183d64; /* Set your preferred button background color */
        color: #fff; 
    }

    .custom-card-color{
        background-color: #7c1c2b; /* Set your preferred button background color */
        color: #fff;
    }
</style>
<html>
<head>
<title>Google Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="card shadow-sm custom-card-color">
    <div class="card-header">
        <h3 class="card-title" style="color: #fff;"><i class="material-icons" >&#xe24f;</i>&nbsp;Create Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/activities" class="btn custom-btn-color">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color" style="color: #183d64;">


        <form action="<?php echo URLROOT; ?>/activities/create" method="POST" enctype="multipart/form-data" >
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label" style="color: #183d64;">Activity Name</label>
                <input type="text" name="act_name" class="form-control form-control-solid"  required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <textarea name="act_des" class="form-control" aria-label="With textarea" required></textarea>
                </div>
            </div>

            <div class="mb-10">
            <div class="form-text text-danger">*</div>
                <label for="act_start">Activity Start Date:</label>
             
                    <input type="datetime-local" id="act_start" name="act_start" required>
                    
            </div>

            <div class="mb-10">
            <div class="form-text text-danger">*</div>
                <label for="act_end">Activity End Date:</label>
                    <input type="datetime-local" id="act_end" name="act_end" required>
            </div>

            <div class="mb-10">
                <label for="act_link">Add your Registration Link (if any):</label>
                    <input type="url" id="act_link" name="act_link" ><br><br>
            </div>

            <div class="row mb-10">
            <label class="col-lg-4 col-form-label fw-semibold fs-6" style="color: #183d64;">Activity Poster</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px" ></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" required />
                        <input type="hidden" name="profile_avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                </div>
                <div class="form-text" style="color: #183d64;">Allowed file types: png, jpg, jpeg.</div>
                <div class="form-text text-danger">(Required)</div>

            </div>
        <div class=" d-flex justify-content-end py-6 px-9">

            <button type="submit" class="btn custom-btn-color font-weight-bold" >Submit</button>
            </div>

        </form>

    </div>
    <div class="card-footer">
     
    </div>
</div>

</body>
</html>