<style>


#searchInput {
    padding: 8px;
    margin-top: 8px;
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

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
    .custom-image {
        width: 150px;
        height: 150px;
        background-size: cover;
        background-position: center;
        border-radius: 50%;
        margin-top: 20px;
        margin-left: 10px;
    }

    .custom-img {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
        margin-top: 20px;
        margin-left: 10px;
    }

    .custom-imag img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>
<html>
<head>
<title>Google Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="custom-btn-color card shadow-sm custom-card-color" >
    <div class="card-header">
        <h3 class="card-title"; style="color:#fff"><i class="material-icons">&#xe7fc;</i>&nbsp;Student List</h3>
        <input type="text" id="searchInput" placeholder="Search for students...">
        
        
    </div>
    <div class="card-body custom-bg-color">
        <div class="studentProfile">
            <table id="clientTable"; class="table">
                
                    <thead>
                
                        <tr>
                            <th></th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php $loggedInStudentEmail = $_SESSION['email']; // Fetch the logged-in user's email

                        // Filter out the currently logged-in student's profile
                        $filteredPages = array_filter($data['pages'], function ($page) use ($loggedInStudentEmail)
                        {
                            return $page->stu_email !== $loggedInStudentEmail;
                        });

                        foreach($filteredPages as $page): ?>
                        <tr class="profileRow">
                            <td>
                                <div class="card mb-3 custom-btn-color" style="max-width: 540px;">
                                    <div class="row g-0">
                                            <?php if(isset($page->stu_photo) && !empty($page->stu_photo)):?>
                                                <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$page->stu_photo; ?>'); width: 150px; height: 150px;overflow: hidden; border-radius: 50%; margin-top: 20px; margin-left: 10px; display: flex; justify-content: center; align-items: center;"> <!-- Removed image-input-outline class -->
                                                    <div class="image-input-wrapper w-150px h-150px rounded-circle" style="background-image: url('<?php echo URLROOT."/public/".$page->stu_photo; ?>');"></div>
                                                </div>
                                            <?php else:?>
                                                <div class="custom-img" style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%; margin-top: 20px; margin-left: 10px; display: flex; justify-content: center; align-items: center;">
                                                    <img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
                                                </div>
                                            <?php endif; ?>
                                        <div class="col-md-8 custom-btn-color">
                                            <div class="card-body">
                                                <p class="card-text";style="color:#7c1c2b "><b><?php echo $page->stu_name; ?></b></p>
                                                <p class="card-text ";style="color:#7c1c2b"><?php echo $page->stu_des; ?></p>
                                                <p class="card-text ";style="color:#7c1c2b"><?php echo $page->stu_email; ?></small></p>
                                                <a href="<?php echo URLROOT; ?>/resumes/adminstudentresume/<?php echo $page->stu_id; ?>" class="btn custom-card-color" style="color:#fff">View Resume</a>
                                                
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
    $(document).ready(function() {
    $('#clientTable').DataTable({
        "ordering": false // Disable sorting
    });
});

    
    </script>
        
        
    
        
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                const searchText = $(this).val().toLowerCase();
                $('.profileRow').each(function() {
                    const studentName = $(this).find('.card-title').text().toLowerCase();
                    const studentDesc = $(this).find('.card-text').text().toLowerCase();
                    const studentEmail = $(this).find('.text-muted').text().toLowerCase();
                    if (studentName.includes(searchText) || studentDesc.includes(searchText) || studentEmail.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

    </div>
    <div class="card-footer">
        
    </div>
</div>


</body>
</html>
