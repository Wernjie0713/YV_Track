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

<div class="card shadow-sm custom-btn-color">
    
    <div class="card-header ">
        
            <h3 class="card-title" style="color: #ffffff"><i class="fa fa-user" >&nbsp;&nbsp;</i>About Me</h3>
        
    </div>
    <div class="card-body custom-bg-color">
    <table class="table">
            <tbody>
                
                <?php $data['student'] ?>
                    <tr>
                        
                        <td class="avatar-column"> <!-- Apply the content column class -->
                            <?php if(isset($data['student']->stu_photo) && !empty($data['student']->stu_photo)):?>
                                <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$data['student']->stu_photo; ?>'); width: 150px; height: 150px;"> <!-- Removed image-input-outline class -->
                                    <div class="image-input-wrapper w-150px h-150px rounded-circle" style="background-image: url('<?php echo URLROOT."/public/".$data['student']->stu_photo; ?>');"></div>
                                </div>
                                <?php else:?>
                                <div class="symbol symbol-150px me-5 rounded-circle overflow-hidden">
                                    <img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="content-column">
                            <h1 style="font-family:Arial; color: #7c1c2b;;font-size: 36px;" class="card-title"><?php echo $data['student']->stu_name; ?></h1>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Age: <?php echo $data['student']->stu_age; ?></h3>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Gender: <?php echo $data['student']->stu_gender; ?></h3>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">University: <?php echo $data['student']->stu_university; ?></h3>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Course: <?php echo $data['student']->stu_course; ?></h3>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Email: <?php echo $data['student']->stu_email; ?></h3>
                            
                        </td>
                        <td class="content-column"> <!-- Apply the content column class -->
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Skill: <?php echo $data['student']->stu_skill; ?></h3>
                            
                            <br>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Language: <?php echo $data['student']->stu_lan; ?></h3>
                            
                            <br>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title">Little things about me: </h3>
                            <br>
                            <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title"><?php echo $data['student']->stu_des; ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <?php if(isset($data['stuact']) && !empty($data['stuact'])): ?>
                                
                                <h3 style="font-family: Arial; color: #7c1c2b;" class="card-title">Activities: </h3>
                                <?php foreach($data['stuact'] as $stuact):?>
                                
                                    <br>
                                    <h3 style="font-family:Arial; color: #7c1c2b;" class="card-title"><li style="font-family: Arial; color:#183d64;white-space: nowrap;"><?php echo $stuact; ?></li></h3>
                                    
                                <?php endforeach; ?> 
                            <?php else: ?>
                            
                                    <h3 style="font-family: Arial;color: #7c1c2b;;" class="card-title">No Activity Recorded.</h3>
                            
                            <?php endif; ?>
                                
                                
                            
                          
                        </td>
                        <td>
                            <?php if(isset($data['stureward']) && !empty($data['stureward'])): ?>
                                <h3 style="font-family: Arial; color: #7c1c2b;" class="card-title">Rewards: </h3>
                                <br>
                                <?php foreach($data['stureward'] as $stureward):?>
                                    
                                    <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$stureward; ?>'); width: 150px; height: 150px;"> <!-- Removed image-input-outline class -->
                                    <div class="image-input-wrapper w-150px h-150px rounded-circle" style="background-image: url('<?php echo URLROOT."/public/".$stureward; ?>');"></div>
                                </div>
                            <?php endforeach; ?> 
                           
                            <?php else: ?>
                                
                                    <h3 style="font-family: Arial; color: #7c1c2b;" class="card-title">Join Activity To Get Reward >_<</h3>
                            
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