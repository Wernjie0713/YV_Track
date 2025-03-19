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
        
        <h3 class="card-title" style="color: #ffffff"><i class="fa fa-user" style="color: #183d64;">&nbsp;&nbsp;</i>About Us</h3>
        
    </div>
    <div class="card-body custom-bg-color">
    <table class="table">
            <tbody>
                
                <?php $data['client'] ?>
                    <tr>
                        
                        <td class="avatar-column"> <!-- Apply the content column class -->
                            <?php if(isset($data['client']->client_photo) && !empty($data['client']->client_photo)):?>
                                <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$data['client']->client_photo; ?>'); width: 150px; height: 150px;"> <!-- Removed image-input-outline class -->
                                    <div class="image-input-wrapper w-150px h-150px rounded-circle" style="background-image: url('<?php echo URLROOT."/public/".$data['client']->client_photo; ?>');"></div>
                                </div>
                                <?php else:?>
                                <div class="symbol symbol-150px me-5 rounded-circle overflow-hidden">
                                    <img src="<?php echo URLROOT . "/public/assets/media/youth/default_cpfp.png" ?>" >
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="content-column">
                            <h1 style="font-family:Arial; color: #183d64;font-size: 36px;" class="card-title"><?php echo $data['client']->client_organization; ?></h1>
                            <h3 style="font-family:Arial; color: #183d64;" class="card-title"><i class="fas fa-envelope" style="color: #183d64;"></i>&nbsp;: <?php echo $data['client']->client_email; ?></h3>
                            <h3 style="font-family:Arial; color: #183d64;" class="card-title"><i class="fas fa-phone" style="color: #183d64;"></i>&nbsp;: <?php echo $data['client']->client_phone; ?></h3>
                            
                        </td>
                        <td class="content-column"> <!-- Apply the content column class -->
                            <h3 style="font-family: Arial; color: #183d64;" class="card-title">Bio: </h3>
                            <br>
                            <h3 style="font-family:Arial; color: #183d64;" class="card-title"><?php echo $data['client']->client_des; ?></h3>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                                <?php if(isset($data['c_act']) && !empty($data['c_act'])): ?>
                                    
                                    <h3 style="font-family: Arial; color: #183d64;" class="card-title">Activities: </h3>
                                    <?php foreach($data['c_act'] as $c_act):?>
                                    
                                        <br>
                                        <h3 style="font-family:Arial; color: #183d64;" class="card-title"><li style="font-family: Arial; color:#183d64;white-space: nowrap;"><?php echo $c_act; ?></li></h3>
                                        
                                    <?php endforeach; ?> 
                                <?php else: ?>
                                
                                        <h3 style="font-family: Arial;color: #7c1c2b;;" class="card-title">No Activity Recorded.</h3>
                                
                                <?php endif; ?>
                                    
                                    
                                
                            
                            </td>
                    </tr>
                    
                   
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