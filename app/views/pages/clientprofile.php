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

<div class="card shadow-sm custom-card-color">
    
    <div class="card-header">
        
            <h3 class="card-title" style="color: #ffffff"><i class="fa fa-user" >&nbsp;&nbsp;</i>About Us</h3>
        
            <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/pages/edit_client_profile" class="btn custom-btn-color">Edit</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color">
    <table class="table">
            <tbody>
                
                <?php foreach($data['cProfile'] as $cProfile): ?>
                    
                    
                    <tr>
                        <td class="avatar-column"> <!-- Apply the avatar column class -->
                        <?php if(isset($_SESSION['pfp'])&& !empty($_SESSION['pfp'])):?>
                            <div class="symbol symbol-100px me-5 rounded-circle overflow-hidden">
                                    <div class="symbol symbol-150px me-5 rounded-circle overflow-hidden">
                                        <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['pfp']; ?>'); width: 150px; height: 150px;"> <!-- Removed image-input-outline class -->
                                            <div class="image-input-wrapper w-150px h-150px rounded-circle" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['pfp']; ?>');"></div>
                                        </div>
                                    </div>
                                    <!-- Your avatar image here -->
                                </div>
                            <?php else:?>
                                <div class="symbol symbol-150px me-5 rounded-circle overflow-hidden">
                                    <img src="<?php echo URLROOT . "/public/assets/media/youth/default_cpfp.png" ?>" >
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="content-column"> <!-- Apply the content column class -->
                            <h1 style="font-family:Arial; font-size: 36px; color:#183d64;" class="card-title"><?php echo " ".$cProfile->client_organization; ?></h1>
                            <h3 style="font-family:Arial; color:#183d64;" class="card-title">  <i class="fas fa-envelope" style="color: #7c1c2b;"></i>&nbsp;<?php echo $cProfile->client_email; ?></h3>
                            <h3 style="font-family:Arial; color:#183d64;" class="card-title">  <i class="fas fa-phone" style="color: #7c1c2b;"></i>&nbsp;<?php echo $cProfile->client_phone; ?></h3>
                            
                        </td>
                       
                        <td class="content-column"> <!-- Apply the content column class -->
                            <h3 style="font-family:Arial; color: #183d64;" class="card-title">Bio: </h3>
                            <br>
                            <h3 style="font-family:Arial; color:#183d64;" class="card-title"><?php echo $cProfile->client_des; ?></h3>
                        </td>
                        
                        
                    </tr>

                    <tr>
    <td>
        <table>
            <thead>
                <tr>
                    <th style="font-family: Arial; color:#183d64;" class="card-title"><br><b>Organized Activities :</b><br><br></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data['cact'] as $cact): ?>
                <?php if(isset($cact->act_name) && !empty($cact->act_name)): ?>
                    
                    <tr>
                        <td>
                            <h3  class="card-title"><li style="font-family: Arial; color:#183d64;white-space: nowrap;"><?php echo $cact->act_name; ?></li></h3>
                        </td>
                        
                    </tr>
                   
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="width:100%">
                            <h3 style="font-family: Arial; color:#183d64;white-space: nowrap;" class="card-title">No Activity Recorded.</h3>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </td>
</tr>


                    
                    <?php endforeach; ?>
                </tbody>
        </table>
                
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>


    </div>
    <div class="card-footer">
        
    </div>
</div>