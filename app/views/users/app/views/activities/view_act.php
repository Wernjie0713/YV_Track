<style>
    
    .custom-bg-color {
        background-color: #fcbd32; /* Replace 'yourCustomColor' with your preferred color code */
        /* You can also add other styles like text color, padding, border-radius, etc. */
        color: #fff; /* Example text color */
        /* Add any other styles to customize your card */
        
    }

    .custom-btn-color{
        background-color: #183d64; /* Set your preferred button background color */
        color: #fff; 
    }

    .custom-card-color{
        background-color: #7c1c2b; /* Set your preferred button background color */
        color: #fff;
        border-radius: 5px;
       
    }
</style>
<html>
<head>
<title>Google Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="card shadow-sm custom-btn-color">
    
    <div class="card-header">
        
            <h3 class="card-title" style="color:#fff"><i class="material-icons">&#xe24f;</i>&nbsp;Activity List</h3>
        
    </div>
    <div class="card-body custom-bg-color">
    <table class="table" id="kt_datatable_posts">
    <thead>
                
                <tr>
                    <th></th>
                   
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($data['activities'] as $activity): ?>
                    <?php if ($this->activityModel->canRegister($activity->act_start)):?>
                    <tr>
                        <td>
                            <div class="col-sm-6">
                                <div class="card h-100">
                                    
                                        <div class="card">
                                            <div class= "custom-bg-color">
                                                <div class="card-body custom-card-color" >
                                                    <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$activity->act_photo; ?>'); width: 150px; height: 150px;"> <!-- Removed image-input-outline class -->
                                                        <div class="image-input-wrapper w-150px h-150px" style="background-image: url('<?php echo URLROOT."/public/".$activity ->act_photo; ?>');"></div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <h1 style="color: #fff"; class="card-title"><?php echo $activity->act_name; ?></h1>
                                                    <br>
                                                    <h6 style="color: #fff"; class="card-title">Date: <br><?php echo $activity->act_start; ?> - <?php echo $activity->act_end; ?></h6>
                                                    <br>
                                                    
                                                    <h6 class="card-title" style="color: #fff"; >Description: <br><?php echo $activity->act_des; ?></h6>
                                                    <br>
                                                    <?php if ($this->activityModel->joined($data['student']->stu_id, $activity->act_id)): ?>
                                                        <button type="button" class="btn custom-btn-color">Joined</button>
                                                    <?php else :?>
                                                        <a href="<?php echo URLROOT . "/activities/activity_registration/" . $activity->act_id ?>"class="btn custom-bg-color">Register</a>
                                                    <?php endif ?>
                                                    <?php 
                                                        $user_id_obj = $this->activityModel->getUserIdFromActivityId($activity->act_id);
                                                        $user_id = $user_id_obj->user_id; // Assuming user_id is the property name holding the ID
                                                        $user_role = $this->activityModel->findRoleByUserID($user_id); ?>

                                                        <?php if($user_role == "Client"):?>
                                                            <?php $client_email = $this->activityModel->findEmailByUserID($user_id); // Fetch client email using user_id?>
                                                            <a href=" <?php echo URLROOT . "/pages/cprofileview/" . strval($client_email) ;  ?>" class="btn custom-bg-color">View Client Profile</a>
                                                        <?php elseif($user_role == "Admin"):?>
                                                            <a href="https://www.youthventures.asia/" class="btn custom-bg-color">View Client Profile</a>
                                                        <?php endif ?>
                                                    
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
        </table>
                
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script>
    $(document).ready(function() {
    $('#kt_datatable_posts').DataTable({
        "ordering": false // Disable sorting
    });
});

    
    </script>

     


    </div>
    <div class="card-footer">
        
    </div>
</div>
</body>
</html>