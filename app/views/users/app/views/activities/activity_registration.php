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
<div class="card shadow-sm custom-btn-color">
    <div class="card-header">
        <h3 class="card-title" style="color:#fff"><i style='font-size:24px' class='far'>&#xf25d;</i>&nbsp;Activity Registration</h3>
    </div>

    <div class="card-body custom-bg-color">
        <form action="<?php echo URLROOT; ?>/activities/activity_registration/<?php echo $data['activity']->act_id ?>" method="POST">
            <div class="mb-10">
                <label for="name" class="required form-label" style="color: #7c1c2b;">Name:</label>
                <input type="text" id="stu_name" name="stu_name" value="<?php echo $data['student']->stu_name ?>" class="form-control form-control-solid" required>
            </div>

            <div class="mb-10">
                <label for="age" class="required form-label"style="color: #7c1c2b;">Age:</label>
                <input type="number" id="stu_age" name="stu_age" value="<?php echo $data['student']->stu_age ?>" class="form-control form-control-solid" required>
            </div>
            
            <div class="mb-10">
                <label for="phonenum" class="required form-label"style="color: #7c1c2b;">Phone Number:</label>
                <input type="text" id="stu_phone" name="stu_phone" value="<?php echo $data['student']->stu_phone ?>" class="form-control form-control-solid" required>
            </div>

            <div class="mb-10">
                <label for="email" class="required form-label"style="color: #7c1c2b;">E-mail:</label>
                <input type="text" id="stu_email" name="stu_email" value="<?php echo $data['student']->stu_email ?>" class="form-control form-control-solid" required>
            </div>

            
            <div class="mb-10">
                <label for="gender" class="required form-label"style="color: #7c1c2b;">Gender:</label> 
                <label for="male"style="color: #7c1c2b;">Male</label>
                <input type="radio" id="male" name="stu_gender" value="Male" <?php echo ($data['student']->stu_gender === 'Male') ? 'checked' : ''; ?>>
                <label for="female"style="color: #7c1c2b;">Female</label>
                <input type="radio" id="female" name="stu_gender" value="Female" <?php echo ($data['student']->stu_gender === 'Female') ? 'checked' : ''; ?>>

            </div>

                
            <div class="mb-10">
                <label for="university" class="required form-label"style="color: #7c1c2b;">University:</label>
                <input type="text" id="stu_university" name="stu_university" value="<?php echo $data['student']->stu_university ?>" class="form-control form-control-solid" required>
            </div>

                
            <div class="mb-10">
                <label for="course" class="required form-label"style="color: #7c1c2b;">Course:</label>
                <input type="text" id="stu_course" name="stu_course" value="<?php echo $data['student']->stu_course ?>" class="form-control form-control-solid" required>
            </div>
            <div class=" d-flex justify-content-end py-6 px-9">  
            <button type="submit" class="btn custom-card-color font-weight-bold">Register</button>
            </div>
        </form>

    </div>
    <div class="card-footer"></div>
</div>

</body>
</html>