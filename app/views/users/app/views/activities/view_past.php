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
        <h3 class="card-title"style="color:#fff"><i class="material-icons">&#xe24f;</i>&nbsp;Past Activities</h3>
    </div>
<div class="card-body custom-bg-color">

<div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th style="color: #7c1c2b;"><b>No.</b></th>
                        <th style="color: #7c1c2b;"><b>Activity</b></th>
                        <th style="color: #7c1c2b;"><b>Description</b></th>
                        <th style="color: #7c1c2b;"><b>Date</b></th>
                        <th style="color: #7c1c2b;"><b>Reward Points</b></th>
                        <th style="color: #7c1c2b;"><b>Feedback</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php if(!empty($data['joinedActivities'])):?>
                    <?php foreach($data['joinedActivities'] as $activity): ?>
                    <tr>
                        <td style="color: #7c1c2b;"><?php echo $index++; ?></td>
                        <td style="color: #7c1c2b;"><?php echo $activity->act_name; ?></td>                        
                        <td style="color: #7c1c2b;"><?php echo $activity->act_des; ?></td>
                        <td style="color: #7c1c2b;"><?php echo date('d/m/y ', strtotime($activity->act_start)); ?> - <?php echo date('d/m/y ', strtotime($activity->act_end)); ?></td>
                        <td style="color: #7c1c2b;"><?php echo $activity->act_mark; ?></td>
                        <td>
                            <?php if ($this->activityModel->passed($activity->act_id, $activity->act_end) && $this->activityModel->filled($activity->act_id, $data['student']->stu_id)): ?>
                                <button type="button" class="btn custom-btn-color" style="display: block; width: 100%;">Submitted</button>
                            <?php elseif ($this->activityModel->passed($activity->act_id, $activity->act_end)): ?>
                                <a href="<?php echo URLROOT . "/activities/feedback/" . $activity->act_id ?>" class="btn btn-light-warning" style="display: block; width: 100%;">Feedback</a>
                            <?php else : ?>
                                <button type="button" class="btn custom-card-color" style="color: #fff; display: block; width: 100%;">Joined</button>
                            <?php endif; ?>
                        </td>
 
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?> 
                </tbody>
            </table>
        </div>
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
</body>
</html>