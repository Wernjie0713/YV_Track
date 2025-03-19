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
        <h3 class="card-title" style="color:#fff"><i class="material-icons">&#xe7fc;</i>&nbsp;View Participants</h3>
    </div>
<div class="card-body custom-bg-color">

<div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th style="color: #183d64;"><b>No.</b></th>
                        <th style="color: #183d64;"><b>Student Name</b></th>
                        <th style="color: #183d64;"><b>Age</b></th>
                        <th style="color: #183d64;"><b>Contact Number</b></th>
                        <th style="color: #183d64;"><b>Email</b></th>
                        <th style="color: #183d64;"><b>Gender</b></th>
                        <th style="color: #183d64;"><b>University</b></th>
                        <th style="color: #183d64;"><b>Course</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach($data['participants'] as $participants): ?>
                    <tr>
                        <td style="color: #183d64;"><?php echo $index++; ?></td>
                        <td style="color: #183d64;"><?php echo $participants->stu_name; ?></td>  
                        <td style="color: #183d64;"><?php echo $participants->stu_age; ?></td>  
                        <td style="color: #183d64;"><?php echo $participants->stu_phone; ?></td> 
                        <td style="color: #183d64;"><?php echo $participants->stu_email; ?></td>  
                        <td style="color: #183d64;"><?php echo $participants->stu_gender; ?></td> 
                        <td style="color: #183d64;"><?php echo $participants->stu_university; ?></td> 
                        <td style="color: #183d64;"><?php echo $participants->stu_course; ?></td>                  
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
        </script>


    </div>
    <div class="card-footer">
     
    </div>
</div> 

</body>
</html>
