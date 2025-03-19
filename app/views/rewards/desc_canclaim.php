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
            <a href="<?php echo URLROOT;?>/rewards/liststudent" class="btn custom-card-color" style="color:#fff">Back</a>
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
        <form action="<?php echo URLROOT; ?>/rewards/claim" method="POST">
            <input type="hidden" name="stu_id" value="<?php echo $data_2['students']->stu_email ?>">
            <input type="hidden" name="reward_id" value="<?php echo $data['rewards']->reward_id ?>">
            <?php if(isset($data['claimrewards']) && is_object($data['claimrewards'])): ?>
                <p style="text-align:center;font-size:30px;color:red"><b>You had claimed this reward!</b></p>
            <?php else: ?>
                <div class="hover-elevate-up d-grid col-6 mx-auto">
                    <button type="submit" class="btn custom-btn-color font-weight-bold">Claim</button>
                </div>
            <?php endif; ?>
        </form>
        
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>