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
            <a href="<?php echo URLROOT;?>/rewards" class="btn custom-card-color" style="color:#fff">Back</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color">
        <div class="table-responsive">
            <table class="table custom-bg-color">
                <tr class="custom-bg-color">
                    <td colspan="2" style="text-align:center;"><img src="<?php echo URLROOT . "/public/" . $data['rewards']->reward_badgeimg; ?>" width="200px" height="200px"></td>
                </tr>
                <tr>
                    <td style="width:30%">Badge Name</td>
                    <td style="width:70%;text-transform:uppercase"><?php echo $data['rewards']->reward_name; ?></td>
                </tr>
                <tr class="custom-bg-color">
                    <td style="width:30%">Description</td>
                    <td style="width:70%"><?php echo $data['rewards']->reward_desc; ?></td>
                </tr>
                <tr>
                    <td style="width:30%">Experience Needed</td>
                    <td style="width:70%"><?php echo $data['rewards']->experience_needed; ?></td>
                </tr>
               
            </table>
        </div>
        <div class="hover-elevate-up d-grid col-6 mx-auto">
            <a href="<?php echo URLROOT . "/rewards/update/" . $data['rewards']->reward_id;?>" class="btn custom-btn-color font-weight-bold">Update</a>
        </div>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>