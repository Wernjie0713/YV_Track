<?php
class Pages extends Controller {

    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }


    public function index() {
        $pages = $this->pageModel->manageAllStudent();
        $clientlist = $this->pageModel->manageAllClient();

        $data = [
            'pages' => $pages,
            'clientlist' => $clientlist
        ];
        $this -> view('pages/index', $data);

    
    }

    public function edit_profile()
    {

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if file was uploaded without errors
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
                    header("Location: " . URLROOT . "/pages/edit_profile");
                }

                $username = $_SESSION['email'];
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/pages/edit_profile");
                } 
                $location = "images/users/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/users/' . $username, 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_profile");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_profile");
              
            }

            // $_POST['update_student'] hidden value from form
           if ($_POST['update_student']) {

                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                    $data = [


                        'stu_email' => trim($_POST['stu_email']),
                        'stu_name' => trim($_POST['stu_name']),
                        'stu_age' => trim($_POST['stu_age']),
                        'stu_phone' => trim($_POST['stu_phone']),
                        'stu_gender' => trim($_POST['stu_gender']),
                        'stu_address' => trim($_POST['stu_address']),
                        'stu_university' => trim($_POST['stu_university']),
                        'stu_course' => trim($_POST['stu_course']),
                        'stu_des' => trim($_POST['stu_des']),
                        'stu_skill' => trim($_POST['stu_skill']),
                        'stu_lan' => trim($_POST['stu_lan']),
                        'stu_photo' => $location
    
                    ];

                }else{

                    $data = [

                        'stu_email' => trim($_POST['stu_email']),
                        'stu_name' => trim($_POST['stu_name']),
                        'stu_age' => trim($_POST['stu_age']),
                        'stu_phone' => trim($_POST['stu_phone']),
                        'stu_gender' => trim($_POST['stu_gender']),
                        'stu_address' => trim($_POST['stu_address']),
                        'stu_university' => trim($_POST['stu_university']),
                        'stu_course' => trim($_POST['stu_course']),
                        'stu_des' => trim($_POST['stu_des']),
                        'stu_skill' => trim($_POST['stu_skill']),
                        'stu_lan' => trim($_POST['stu_lan'])
               
                    ];
                }

            }

            //var_dump($data);

          if ($_POST['update_student']) {
                if ($this->pageModel->updateStudentProfile($data)) {
                    header("Location: " . URLROOT . "/pages/edit_profile");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('pages/index');
            }
        } // end of if statement 

        $studentProfile = $this->pageModel->studentProfile();

        $data = [
            'studentProfile' => $studentProfile
        ];

        $this->view('pages/index', $data);
    }

    public function edit_client_profile()
    {

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if file was uploaded without errors
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
                    header("Location: " . URLROOT . "/pages/edit_client_profile");
                }

                $username = $_SESSION['email'];
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/pages/edit_client_profile");
                } 
                $location = "images/users/" . $username;

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/users/' . $username, 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_client_profile");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_client_profile");
              
            }

            // $_POST['update_student'] hidden value from form
           if ($_POST['update_client']) {

                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                    $data = [


                        'client_email' => trim($_POST['client_email']),
                        'client_organization' => trim($_POST['client_organization']),
                        'client_phone' => trim($_POST['client_phone']),
                        'client_des' => trim($_POST['client_des']),
                        'client_photo' => $location
    
                    ];

                }else{

                    $data = [

                        'client_email' => trim($_POST['client_email']),
                        'client_organization' => trim($_POST['client_organization']),
                        'client_phone' => trim($_POST['client_phone']),
                        'client_des' => trim($_POST['client_des'])
               
                    ];
                }

            }

            //var_dump($data);

          if ($_POST['update_client']) {
                if ($this->pageModel->updateClientProfile($data)) {
                    header("Location: " . URLROOT . "/pages/edit_client_profile");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('pages/index');
            }
        } // end of if statement 

        $clientProfile = $this->pageModel->clientProfile();

        $data = [
            'clientProfile' => $clientProfile
        ];

        $this->view('pages/index', $data);
    }
    
    public function studentprofile()
    {
        $stuProfile = $this->pageModel->studentProfile();

        $data = [
            'stuProfile' => $stuProfile
        ];

        $this->view('pages/index', $data);
    }

    public function clientprofile()
    {
        $cProfile = $this->pageModel->clientProfile();
        $cact = $this->pageModel->findClientAct();
        $data = [
            'cProfile' => $cProfile,
            'cact' => $cact
        ];

        $this->view('pages/index', $data);
    }

    public function profileview ($stu_email) {
        
    
        // Fetch the student's information based on the email
        $student = $this->pageModel->findStudentByEmail($stu_email);
       
        $stuact = $this->pageModel->findPastactByID($student->stu_id);

        $stureward = $this->pageModel->findRewardByEmail($stu_email);
       
        $data = [
            'student' => $student,
            'stuact' => $stuact,
            'stureward' => $stureward
        ];
        $this->view('pages/index', $data);
    }

    
    public function cprofileview($client_email)
    {

        $client = $this->pageModel->findClientByEmail($client_email);
        $user = $this->pageModel->findUserIDByEmail($client_email);
        $c_act = $this->pageModel->findActByUserID($user->user_id);

        $data = [
            'client' => $client,
            'c_act' => $c_act
        ];

        $this->view('pages/index',$data);
    }
        
}

