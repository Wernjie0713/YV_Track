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
                color: #fff;
            }

</style>

<div class="card shadow-sm custom-btn-color">
    <div class="card-header">
        <h3 class="card-title" style="color:#fff">Badge Description</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/rewards/desc/<?php echo $data['rewards']->reward_id; ?>" class="btn custom-card-color" style="color:#fff">Back</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color">
        <form action="<?php echo URLROOT; ?>/rewards/update/<?php echo $data['rewards']->reward_id; ?>" method="POST"  enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table custom-bg-color">
                <tr class="custom-bg-color">
                    <td colspan="2" style="text-align:center">
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-125px h-125px" ></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="ki-duotone ki-pencil fs-7"></i>
                                <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_avatar_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="ki-duotone ki-cross fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="ki-duotone ki-cross fs-2"></i>
                            </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%">Badge Name</td>
                    <td style="width:70%">
                        <div class="mb-10">
                            <input type="text" name="reward_name" class="form-control form-control-solid" value="<?php echo $data['rewards']->reward_name; ?>">
                        </div>
                    </td>
                </tr>
                <tr class="custom-bg-color">
                    <td style="width:30%">Description</td>
                    <td style="width:70%">
                        <div class="mb-10">
                            <input type="text" name="reward_desc" class="form-control form-control-solid" value="<?php echo $data['rewards']->reward_desc; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:30%">Experience Needed</td>
                    <td style="width:70%">
                        <div class="mb-10">
                            <input type="number" name="experience_needed" class="form-control form-control-solid" value="<?php echo $data['rewards']->experience_needed; ?>">
                        </div>
                    </td>
                </tr>
               
            </table>
        </div>
            <div class="hover-elevate-up d-grid col-6 mx-auto">
                <button type="submit" class="btn custom-btn-color font-weight-bold">Submit</button>
            </div>
        </form>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>