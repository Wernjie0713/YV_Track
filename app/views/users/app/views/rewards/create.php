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
    <h3 class="card-title" style="color: #fff;">Create Reward</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/rewards" class="btn custom-btn-color">Rewards List</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color">


        <form action="<?php echo URLROOT; ?>/rewards/create" method="POST" enctype="multipart/form-data">
            <div class="mb-10">
                <label for="reward_name" class="required form-label" style ="color: #183d64;">Reward Name</label>
                <input type="text" name="reward_name" class="form-control form-control-solid" placeholder="Name" required>
            </div>

            <div class="mb-10">
                <label for="experience_needed" class=" required form-label" style ="color: #183d64;">Experience Needed</label>
                <div class="position-relative">
                    <div class="position-absolute top-0"></div>
                    <input type="number" name="experience_needed" class="form-control" placeholder="Experience Needed" required>
                </div>
            </div>

            <div class="mb-10">
            <label class="col-lg-4 col-form-label fw-semibold fs-6 required" style ="color: #183d64;">Badge Image:</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Add image" style ="color: #183d64;">
                        <i class="ki-duotone ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" required/>
                        <input type="hidden" name="profile_avatar_remove" required/>
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                </div>
                <div class="form-text" style ="color: #183d64;">Allowed file types: png, jpg, jpeg.</div>
            </div>
        </div>

            <div class="mb-10">
                <label for="reward_desc"  class="required form-label" style ="color: #183d64;">Description</label>
                    <textarea name="reward_desc" class="form-control" aria-label="With textarea" required></textarea>
            </div>

            <button type="submit" class="btn custom-btn-color font-weight-bold">Submit</button>

        </form>

    </div>
    <div class="card-footer">
       
    </div>
</div>
            </body>
            </html>