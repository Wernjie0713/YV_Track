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

<div class="card shadow-sm custom-btn-color">
    
    <div class="card-header ">
        
            <h3 class="card-title" style="color: #ffffff"><i class="fa fa-user" >&nbsp;&nbsp;</i>About Me</h3>
            <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/pages/edit_profile" class="btn custom-card-color"  style="color: #ffffff">Edit</a>
            <?php endif; ?>
        </div>
        
    </div>
    <div class="card-body custom-bg-color">
    <table class="table">
            <tbody>
                
                <?php foreach($data['stuProfile'] as $stuProfile): ?>
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
                                    <img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
                                </div>
                            <?php endif; ?>
                            
                            
                        </td>
                        <td class="content-column"> <!-- Apply the content column class -->
                            <h1 style="font-family:Arial; font-size: 36px; color:#7c1c2b" class="card-title"><?php echo " ".$stuProfile->stu_name; ?></h1>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title">Age: <?php echo " ".$stuProfile->stu_age; ?></h3>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title">Gender: <?php echo $stuProfile->stu_gender; ?></h3>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title">University: <?php echo $stuProfile->stu_university; ?></h3>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title">Course: <?php echo $stuProfile->stu_course; ?></h3>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title">Email: <?php echo $stuProfile->stu_email; ?></h3>
                            
                        </td>
                        <td class="content-column"> <!-- Apply the content column class -->
                            <h3 style="font-family:Arial; color:#7c1c2b" class="card-title">Skill: </h3>
                            <br>
                            <h3 style="font-family:Arial; color:#7c1c2b" class="card-title"><?php echo $stuProfile->stu_skill; ?></h3>
                            <br>
                            <h3 style="font-family:Arial; color:#7c1c2b" class="card-title">Language: </h3>
                            <br>
                            <h3 style="font-family:Arial; color:#7c1c2b" class="card-title"> <?php echo $stuProfile->stu_lan; ?></h3>
                            <br>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title">Bio: </h3>
                            <br>
                            <h3 style="font-family:Arial;  color:#7c1c2b" class="card-title"><?php echo $stuProfile->stu_des; ?></h3>
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
    <div class="card-footer ">
    
</div>

