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
<title>Font Awesome 5 Icons</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
</head>
<body>
<div class="card shadow-sm custom-card-color">
    <div class="card-header">
        <h3 class="card-title" style="color:#fff"><i style='font-size:24px' class='far'>&#xf044;</i>&nbsp;Update Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/activities" class="btn custom-btn-color">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color">
    <form action="<?php echo URLROOT; ?>/activities/update/<?php echo $data['activity']->act_id ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label" style="color: #183d64;">Activity Name</label>
                <input type="text" name="act_name" class="form-control form-control-solid" value="<?php echo $data['activity']->act_name ?>"  />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label" style="color: #183d64;">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <textarea name="act_des" class="form-control" aria-label="With textarea"
                        ><?php echo $data['activity']->act_des;?></textarea>
                </div>
            </div>

            <?php
            $originalstartDate = $data['activity']->act_start;
            $formattedstartDate = date("Y-m-d\TH:i", strtotime($originalstartDate));
            ?>

            <div class="mb-10">
                <label for="act_start" style="color: #183d64;">Activity Start Date:</label>
                    <input type="datetime-local" id="act_start" name="act_start" value="<?php echo $formattedstartDate ?>" >
            </div>

            <?php
            $originalendDate = $data['activity']->act_end;
            $formattedendDate = date("Y-m-d\TH:i", strtotime($originalendDate));
            ?>

            <div class="mb-10">
                <label for="act_end" style="color: #183d64;">Activity End Date:</label>
                    <input type="datetime-local" id="act_end" name="act_end" value="<?php echo $formattedendDate ?>" >
            </div>

            <div class="mb-10">
                <label for="act_link" style="color: #183d64;">Add your Registration Link (if any):</label>
                    <input type="url" id="act_link" name="act_link" value="<?php echo $data['activity']->act_link ?>"><br><br>
            </div>

            <div class="row mb-10">
            <label class="col-lg-4 col-form-label fw-semibold fs-6" style="color: #183d64;">Activity Poster</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$data['activity']->act_photo; ?>');"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="profile_avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                   
                </div>
                <div class="form-text" style="color: #183d64;">Allowed file types: png, jpg, jpeg. <br>(If no update on this part,just ignore)</div>
            </div>
        </div>
        <div class=" d-flex justify-content-end py-6 px-9">

            <button type="submit" class="btn custom-btn-color font-weight-bold">Submit</button>
         </div>
        </form>

    </div>
    <div class="card-footer">
       
    </div>
</div>
</body>
</html>