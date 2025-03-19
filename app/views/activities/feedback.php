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
        <h3 class="card-title" style="color:#fff"><i class="material-icons">&#xe0b7;</i>&nbsp;Activity Feedback: &nbsp;<?php echo $data['activity']->act_name ?> </h3>
    </div>
    <div class="card-body custom-bg-color">

        <form action="<?php echo URLROOT; ?>/activities/feedback/<?php echo $data['activity']->act_id ?>" method="POST" enctype="multipart/form-data">
            <!--Student information-->
            <div>
                <h4 class="card-title" style="color: #7c1c2b;">Student Information</h3>
                <div class="mb-10">
                    <label for="1\q1" class="required form-label" style="color: #7c1c2b;">Name: </label>
                    <input type="text" name="stu_name" value="<?php echo $data['student']->stu_name ?>" class="form-control form-control-solid" required />
                </div>
            </div>
            <!--Normal questions-->
            <div>
                <h4 class="card-title" style="color: #7c1c2b;">What have you learned?</h4>
                <div class="mb-10">
                    <label for="1\q1" class="required form-label" style="color: #7c1c2b;">1. What is your role in this activity?</label>
                    <input type="text" name="q1" class="form-control form-control-solid" aria-label="With textarea" required />
                </div>
                <div class="mb-10">
                    <label for="q2" class="required form-label" style="color: #7c1c2b;">2. What knowledge/skills have you gained about the topics presented in this activity?</label>
                    <input type="text" name="q2" class="form-control form-control-solid" aria-label="With textarea" required />
                </div>
                <div class="mb-10">
                    <label for="q3" class="required form-label" style="color: #7c1c2b;">3. How will you apply what you have learned to your field of study?</label>
                    <input type="text" name="q3" class="form-control form-control-solid" aria-label="With textarea" required />
                </div>
            </div>
            <!--Nominal questions-->
            <div class="mb-10">
                <h4 class="card-title" style="color: #7c1c2b;">Feedback on The Contents and The Presentor</h3>
                <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                    <tr>
                        <th> </th>
                        <td style="color: #7c1c2b;">Strongly Disagree</td>
                        <td style="color: #7c1c2b;">Disagree</td>
                        <td style="color: #7c1c2b;">Neutral</td>
                        <td style="color: #7c1c2b;">Agree</td>
                        <td style="color: #7c1c2b;">Strongly Agree</td>
                    </tr>
                    <tr>
                        <td colspan=4><h5 class="card=title" style="color: #7c1c2b;">The Content</h5></td>
                    </tr>
                    <input type="hidden" name="q4" value="" required>
                    <tr>
                        <td style="color: #7c1c2b;">1. Was well organized</td>
                        <td><input type="radio" name="q4" value="1" required></td>
                        <td><input type="radio" name="q4" value="2" required></td>
                        <td><input type="radio" name="q4" value="3" required></td>
                        <td><input type="radio" name="q4" value="4" required></td>
                        <td><input type="radio" name="q4" value="5" required></td>
                    </tr>
                    <input type="hidden" name="q5" value="" required>
                    <tr>
                        <td style="color: #7c1c2b;">2. Was based on credible and up-to-date information</td>
                        <td><input type="radio" name="q5" value="1" required></td>
                        <td><input type="radio" name="q5" value="2" required></td>
                        <td><input type="radio" name="q5" value="3" required></td>
                        <td><input type="radio" name="q5" value="4" required></td>
                        <td><input type="radio" name="q5" value="5" required></td>
                    </tr>
                    <input type="hidden" name="q6" value="" required>
                    <tr>
                        <td style="color: #7c1c2b;">3. Was easy to understand</td>
                        <td><input type="radio" name="q6" value="1" required></td>
                        <td><input type="radio" name="q6" value="2" required></td>
                        <td><input type="radio" name="q6" value="3" required></td>
                        <td><input type="radio" name="q6" value="4" required></td>
                        <td><input type="radio" name="q6" value="5" required></td>
                    </tr>
                    <tr>
                        <td colspan=4><h5 class="card=title" style="color: #7c1c2b;">The Presentor(s):</h5></td>
                    </tr>
                    <input type="hidden" name="q7" value="" required>
                    <tr>
                        <td style="color: #7c1c2b;">1. Was well-prepared</td>
                        <td><input type="radio" name="q7" value="1" required></td>
                        <td><input type="radio" name="q7" value="2" required></td>
                        <td><input type="radio" name="q7" value="3" required></td>
                        <td><input type="radio" name="q7" value="4" required></td>
                        <td><input type="radio" name="q7" value="5" required></td>
                    </tr>
                    <input type="hidden" name="q8" value="" required>
                    <tr>
                        <td style="color: #7c1c2b;">2. Used appropriate teaching methods</td>
                        <td><input type="radio" name="q8" value="1" required></td>
                        <td><input type="radio" name="q8" value="2" required></td>
                        <td><input type="radio" name="q8" value="3" required></td>
                        <td><input type="radio" name="q8" value="4" required></td>
                        <td><input type="radio" name="q8" value="5" required></td>
                    </tr>
                    <input type="hidden" name="q9" value="" required>
                    <tr>
                        <td style="color: #7c1c2b;">3. Engaged the participants in learning</td>
                        <td><input type="radio" name="q9" value="1" required></td>
                        <td><input type="radio" name="q9" value="2" required></td>
                        <td><input type="radio" name="q9" value="3" required></td>
                        <td><input type="radio" name="q9" value="4" required></td>
                        <td><input type="radio" name="q9" value="5" required></td>
                    </tr>
                </table>
            </div>
            
            <!--Upload project-->
            <div class="mb-10">
                <h4 class="card-title" style="color: #7c1c2b;">Project upload</h4>
                <div class="mb-10">
                    <label for="projectFile" class="form-label" style="color: #7c1c2b;">Upload your project here (if any): </label>
                    <input type="file" name="projectFile" accept=".pdf, .xlsx, .docx, .jpg, .jpeg, .png, .mp4, .zip, .rar" class="form-control form-control-solid" />
                    <div class="form-text" style="color: #7c1c2b;">Allowed file types: pdf, xlsx, docx, jpg, jpeg, png, mp4, zip, rar</div>
                </div>  
            </div>
            <div class=" d-flex justify-content-end py-6 px-9">  
            <button type="submit" class="btn custom-card-color font-weight-bold">Submit</button>
            </div>
        </form>

    </div>
    <div class="card-footer"></div>
</div>

</body>
</html>