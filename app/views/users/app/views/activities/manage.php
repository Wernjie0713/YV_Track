<!DOCTYPE html>
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
<title>Google Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="card shadow-sm custom-card-color">
    <div class="card-header">
        <h3 class="card-title" style="color: #fff;"><i class="material-icons">&#xe24f;</i>&nbsp;Manage Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/activities/create" class="btn custom-btn-color" >Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body custom-bg-color">
       
    <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted" >
                        <th style="color: #183d64;"><b>Name</b></th>
                        <th style="color: #183d64;"><b>Description</b></th>
                        <th style="color: #183d64;"><b>Start Date</b></th>
                        <th style="color: #183d64;"><b>End Date</b></th>
                        <th style="color: #183d64;"><b>Duration</b></th>
                        <th style="color: #183d64;"><b>Given Marks</b></th>
                        <th style="color: #183d64;"><b>Action</b></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['activities'] as $activity):  ?>
                    
                    <tr>
                        <td style="color: #183d64;"><?php echo $activity->act_name; ?></td>
                        <td style="color: #183d64;"><?php echo $activity->act_des; ?></td>
                        <td style="color: #183d64;"><?php echo $activity->act_start; ?></td>
                        <td style="color: #183d64;"><?php echo $activity->act_end; ?></td>
                        <td style="color: #183d64;"><?php echo $activity->act_duration; ?></td>
                        <td style="color: #183d64;"><?php echo $activity->act_mark; ?></td>
                        <td colspan = "2" > 
                            
                        <div class="btn-group">
                                <button type="button" class="btn custom-btn-color dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo URLROOT . "/activities/viewparticipant/" . $activity->act_id; ?>">View Participants</a>

                                    <?php if ($this->activityModel->canEdit($activity->act_start)): ?>
                                        <a class="dropdown-item" href="<?php echo URLROOT . "/activities/update/" . $activity->act_id; ?>">Update</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#kt<?php echo $activity->act_id; ?>">Delete</a>
                                    <?php endif; ?>

                                    <?php if ($this->activityModel->passed($activity->act_id, $activity->act_end)): ?>
                                        <a class="dropdown-item" href="<?php echo URLROOT . "/activities/viewfeedback/" . $activity->act_id; ?>">Feedback</a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            

                            <div class="modal fade " style="color: #183d64" tabindex="-1" id="kt<?php echo $activity->act_id?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Modal title</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">
                                            Are you sure want to delete this transaction?
                                        </div>

                                        <div class="modal-footer">
                                            <form action="<?php echo URLROOT . "/activities/delete/" . $activity->act_id; ?>"
                                                method="POST">
                                                <input type="hidden" id="expenses" name="expenses" value="expenses">
                                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn btn-primary font-weight-bold">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });

        function toggleDropdown() 
        {
            var dropdown = document.getElementById("actionDropdown");
            dropdown.classList.toggle("show");
        }

        function handleUpdate() 
        {
            // Add logic for the "Update" action
            alert("Update clicked!");
        }

        function handleManage() 
        {
            // Add logic for the "Manage" action
            alert("Feedback clicked!");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) 
        {
            if (!event.target.matches('.action-button')) {
                var dropdowns = document.getElementsByClassName("action-dropdown");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        

        </script>


    </div>
    <div class="card-footer">
      
    </div>
</div>

</body>
</html>