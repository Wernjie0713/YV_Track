<?php
class Activities extends Controller{
    public function __construct(){
        $this->activityModel = $this->model('Activity');
        $this->pageModel = $this->model('Page');
    }

    public function index(){
        
        $user_role = $_SESSION['role'];

        if($user_role == 'Student')
        {
            $activities = $this->activityModel->manageAllActivities();
            $client = $this->pageModel->manageAllClient();
            $student = $this->activityModel->findStudentByEmail($_SESSION['email']);            
            
            $data = [
    
                'activities' => $activities,
                'client' => $client,
                'student' => $student
                
                //$data is in array form holding info in $activities which is 'SELECT * FROM activity'
            ];
    
            $this->view('activities/index',$data);
        }
        elseif($user_role == 'Client')
        {
            $user_id = $_SESSION['user_id'];
    
            $activities = $this->activityModel->findActivityByUserId($user_id);
    
            $data = [
    
                'activities' => $activities
                //$data is in array form holding info in $activities which is 'SELECT * FROM activity'
            ];
    
            $this->view('activities/index',$data);
        }
        elseif($user_role == 'Admin')
        {
            $user_id = $_SESSION['user_id'];
    
            $activities = $this->activityModel->findActivityByUserId($user_id);
    
            $data = [
    
                'activities' => $activities
                //$data is in array form holding info in $activities which is 'SELECT * FROM activity'
            ];
    
            $this->view('activities/index',$data);
        }
        
    }

    public function create()
    {
        
        $data = 
        [
            'act_name' => '',
            'act_des' => '',
            'act_start' => '',
            'act_end' => '',
            'act_link' => '',
            'act_photo' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"];
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)){
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/activities/create");
                }

                $username = $_SESSION['email'];
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/activities/create");
                } 
                $location = "images/activities/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/activities/' . $username, 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/activities/create");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/activities/create");
              
            }

            $act_start = $_POST['act_start'];
            $act_end = $_POST['act_end'];

            // Create DateTime objects with the datetime-local format
            $start_date_time = DateTime::createFromFormat('Y-m-d\TH:i', $act_start);
            $end_date_time = DateTime::createFromFormat('Y-m-d\TH:i', $act_end);

            if ($start_date_time === false || $end_date_time === false) {
                // Handle the case where the datetime strings are not in the expected format
                echo "Invalid datetime format";
            } else {
                // Create new DateTime objects using only the date components
                $start_date = new DateTime($start_date_time->format('Y-m-d'));
                $end_date = new DateTime($end_date_time->format('Y-m-d'));

                // Calculate the difference in days
                $duration = (int) $start_date->diff($end_date)->format('%a') + 1; // Convert to integer

                if ($duration <= 2) {
                    $act_mark = '3';
                } elseif ($duration > 2 && $duration <= 5) {
                    $act_mark = '5';
                } else {
                    $act_mark = '7';
                }
            }

            $data = 
            [
            'user_id' => $_SESSION['user_id'],
            'act_name' => trim($_POST['act_name']),
            'act_des' => trim($_POST['act_des']),
            'act_start' => trim($_POST['act_start']),
            'act_end' => trim($_POST['act_end']),
            'act_link' => trim($_POST['act_link']),
            'act_photo' => $location,
            'act_duration' => $duration,
            'act_mark' => $act_mark
            
            ];



            if ($data['act_name'] && $data['act_des'] && $data['act_start'] && $data['act_end']){
                if ($this->activityModel->addActivity($data)){
                    
                        header("Location: " . URLROOT. "/activities" );
                    
                    
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('activities/index', $data);
            }
        }

        $this->view('activities/index', $data);
    }

    public function update($act_id)
    {
        $activity = $this->activityModel->findActivityById($act_id);

       

        $data = 
        [
            'activity' => $activity,
            'act_name' => '',
            'act_des' => '',
            'act_start' => '',
            'act_end' => '',
            'act_link' => ''
        ];



        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"];
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)){
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/activities/create");
                }

                $username = $_SESSION['email'];
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/activities/create");
                } 
                $location = "images/activities/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/activities/' . $username, 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/activities/create");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/activities/create");
              
            }

            $act_start = $_POST['act_start'];
            $act_end = $_POST['act_end'];

            // Create DateTime objects with the datetime-local format
            $start_date_time = DateTime::createFromFormat('Y-m-d\TH:i', $act_start);
            $end_date_time = DateTime::createFromFormat('Y-m-d\TH:i', $act_end);

            if ($start_date_time === false || $end_date_time === false) {
                // Handle the case where the datetime strings are not in the expected format
                echo "Invalid datetime format";
            } else {
                // Create new DateTime objects using only the date components
                $start_date = new DateTime($start_date_time->format('Y-m-d'));
                $end_date = new DateTime($end_date_time->format('Y-m-d'));

                // Calculate the difference in days
                $duration = (int) $start_date->diff($end_date)->format('%a') + 1; // Convert to integer

                if ($duration <= 2) {
                    $act_mark = '3';
                } elseif ($duration > 2 && $duration <= 5) {
                    $act_mark = '5';
                } else {
                    $act_mark = '7';
                }
            }

            $data = 
            [
            'act_id' => $act_id,
            'activity' => $activity,
            'user_id' => $_SESSION['user_id'],
            'act_name' => trim($_POST['act_name']),
            'act_des' => trim($_POST['act_des']),
            'act_start' => trim($_POST['act_start']),
            'act_end' => trim($_POST['act_end']),
            'act_link' => trim($_POST['act_link']),
            'act_duration' => $duration,
            'act_mark' => $act_mark,
            'act_photo' => $location
            ];

           

            if ($data['act_name'] && $data['act_des'] && $data['act_start'] && $data['act_end'] ){
                if ($this->activityModel->updateActivity($data)){
                    header("Location: " . URLROOT. "/activities" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('activities/index', $data);
            }
        }

        $this->view('activities/index', $data);
    }

    public function delete($act_id)
    {
        $activity = $this->activityModel->findActivityById($act_id);

        

        $data = 
        [
            'activity' => $activity,
            'act_name' => '',
            'act_des' => '',
            'act_start' => '',
            'act_end' => '',
            'act_link' => ''
        ];

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }

        if($this->activityModel->deleteActivity($act_id)){
            header("Location: " . URLROOT . "/activities");
        }
        else
        {
            die('Something went wrong..');
        }
        
    }

    //act reg
    public function activity_registration($act_id){

        $activity = $this->activityModel->findActivityById($act_id);
        $student = $this->activityModel->findStudentByEmail($_SESSION['email']);
        $data = 
            [   'student' => $student,
                'activity' => $activity,
                'act_id' => '',
                'stu_id' => '',       
                'stu_name' => '',
                'stu_age' => '',
                'stu_phone' => '',
                'stu_gender' => '',
                'stu_email' => $_SESSION['email'],
                'stu_university' => '',
                'stu_course' => ''
            ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = 
            [
            'student' => $student,
            'activity' => $activity,
            'stu_id' => $student->stu_id,
            'act_id' => $act_id,        
            'stu_name' => trim($_POST['stu_name']),
            'stu_age' => trim($_POST['stu_age']),
            'stu_phone' => trim($_POST['stu_phone']),
            'stu_gender' => trim($_POST['stu_gender']),
            'stu_email' => $_SESSION['email'],
            'stu_university' => trim($_POST['stu_university']),
            'stu_course' => trim($_POST['stu_course'])
            ];
    
            if($this->activityModel->joined($data['stu_id'], $data['act_id'])){
                echo '<script>alert("You have successfully joined the activity.")</script>';            
                echo '<script>window.location.href = "' . URLROOT . "/activities/view_past" .'"</script>';    
            }    
            elseif($data['stu_name'] && $data['stu_age'] && $data['stu_phone'] && $data['stu_email'] && $data['stu_gender'] && $data['stu_university'] && $data['stu_course'] ){                        
                if ($this->activityModel->activityRegistration($data)) {
                    if($activity->act_link){
                        $count=$activity->no_participants+1;
                        $this->activityModel->UpdateNoParticipants($count, $activity->act_id);
                        echo '<script>alert("The button below will direct you to the activity link.")</script>';
                        echo '<script>window.location.href = "' . strval($activity->act_link) . '"</script>';  
                    }                    
                    else{
                        $count=$activity->no_participants+1;
                        $this->activityModel->UpdateNoParticipants($count, $activity->act_id);
                        echo '<script>alert("You have successfully joined the activity.")</script>';            
                        echo '<script>window.location.href = "' . URLROOT . "/activities/view_past" .'"</script>';    
                    }
                }else {die("Something went wrong :(");}
            }
            else
            {
                $this->view('activities/index', $data);
            }
        }
        
        $this->view('activities/index', $data);
    }
//past activities
public function view_past(){
    if (!isLoggedIn() || $_SESSION['role'] !== "Student") {
        header("Location: " . URLROOT . "/activities");
        exit();
    }

   // Fetch activities that the current student has joined
    $student = $this->activityModel->findStudentByEmail($_SESSION['email']);
    $joinedActivities = $this->activityModel->getJoinedActivities($student->stu_id);

    $data = [
        'student' => $student,
        'joinedActivities' => $joinedActivities
    ];

    $this->view('activities/index', $data);
}

//feedback
public function feedback($act_id)
{
    if (!isLoggedIn() || $_SESSION['role'] !== "Student") {
        header("Location: " . URLROOT . "/activities");
        exit();
    }

    $activity = $this->activityModel->findActivityById($act_id);
    $student = $this->activityModel->findStudentByEmail($_SESSION['email']);

    $data = [
        'act_id' => isset($activity->act_id) ? $activity->act_id : '',
        'stu_id' => '',
        'stu_name' => '',
        'stu_university' => '',
        'q1' => '',
        'q2' => '',
        'q3' => '',
        'q4' => '',
        'q5' => '',
        'q6' => '',
        'q7' => '',
        'q8' => '',
        'q9' => '',
        'projectFile' => '',
        'activity' => $activity,
        'student' => $student
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'act_id' => $act_id,
            'act_mark' => $activity->act_mark,
            'stu_id' => $student->stu_id,
            'stu_name' => trim($_POST['stu_name']),
            'q1' => trim($_POST['q1']),
            'q2' => trim($_POST['q2']),
            'q3' => trim($_POST['q3']),
            'q4' => trim($_POST['q4']),
            'q5' => trim($_POST['q5']),
            'q6' => trim($_POST['q6']),
            'q7' => trim($_POST['q7']),
            'q8' => trim($_POST['q8']),
            'q9' => trim($_POST['q9']),
            'projectFile' => trim($_POST['projectFile']),
            'activity' => $activity,
            'student' => $student
        ];

        if (!empty($_FILES['projectFile']['name'])){            
            $file_name=$_FILES['projectFile']['name'];
            $file_temp=$_FILES['projectFile']['tmp_name'];
            $file_destination='files/feedback/'.$file_name;

            if(move_uploaded_file($file_temp, $file_destination)){
                $data['projectFile']=$file_destination;
            }
            else{
                echo "File upload failed!";
            }
        }

        if ($this->activityModel->addFeedback($data)) {
            header("Location: " . URLROOT . "/activities/view_past");
            exit();
        } else {
            die("Something went wrong :(");
        }
    }

    $this->view('activities/index', $data);
}

//viewfeedback
public function viewfeedback($act_id){
    $feedback=$this->activityModel->getFeedback($act_id);
    $activity = $this->activityModel->findActivityById($act_id);
    $data = [
        'feedback' => $feedback,
        'act_id' => $activity->act_id,
        'activity' => $activity
    ];

    $this->view('activities/index', $data);
}

//participant
public function viewparticipant ($act_id){
    $activity = $this->activityModel->findActivityById($act_id);
    $participants=$this->activityModel->getParticipant($act_id);
    
    $data = [
        'activity'=>$activity,
        'participants'=>$participants,
        'act_id'=>$act_id
    ];

    $this->view('activities/index', $data);
}    

    
}

?>