<?php
class Rewards extends Controller{
    public function __construct(){
        $this -> rewardModel = $this->model('Reward');
    }

    public function index()
    {
        $rewards = $this->rewardModel->manageAllRewards();
        $students = $this->rewardModel->manageAllStudents();

        $data = [
            'rewards' => $rewards,
            'students' => $students
        ];
        $this -> view('rewards/index', $data);
    }

    public function liststudent()
    {
        $rewards = $this->rewardModel->manageAllRewards();
        $stu_email = $_SESSION['email'];
        $students = $this->rewardModel->findStudentByEmail($stu_email);
        $act_mark3 = $this->rewardModel->findactmark3ById($students->stu_id);
        $act_mark5 = $this->rewardModel->findactmark5ById($students->stu_id);
        $act_mark7 = $this->rewardModel->findactmark7ById($students->stu_id);

        $data = [
            'rewards' => $rewards,
            'students' => $students,
            'act_mark3' => $act_mark3,
            'act_mark5' => $act_mark5,
            'act_mark7' => $act_mark7
        ];
        $this -> view('rewards/index', $data);
    }

    public function create()
    {
        $data = 
        [
            'reward_name' => '',
            'experience_needed' => '',
            'reward_badgeimg' => '',
            'reward_desc' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
                    header("Location: " . URLROOT . "/rewards/create");
                }

                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/rewards/create");
                } 
                $location = "images/rewards";

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/rewards/', 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/rewards/create");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/rewards/create");
              
            }

            $data = 
            [
                'reward_name' => trim($_POST['reward_name']),
                'experience_needed' => trim($_POST['experience_needed']),
                'reward_badgeimg' => $location,
                'reward_desc' => trim($_POST['reward_desc'])
            ];

            if ($data['reward_name'] && $data['experience_needed'] && $data['reward_badgeimg'] && $data['reward_desc']){
                if ($this->rewardModel->addReward($data)){
                    header("Location: " . URLROOT. "/rewards" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('rewards/index', $data);
            }
        }

        $this->view('rewards/index', $data);
    }

    public function update($reward_id)
    {
        $rewards = $this->rewardModel->findRewardById($reward_id);

        $data = 
        [
            'rewards' => $rewards,
            'reward_name' => '',
            'experience_needed' => '',
            'reward_badgeimg' => '',
            'reward_desc' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
                    header("Location: " . URLROOT . "/rewards/update");
                }

                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize){
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                            header("Location: " . URLROOT . "/rewards/update");
                } 
                $location = "images/rewards";

                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                            # create directory if not exists in upload/ directory
                            if (!is_dir($location)) {
                                //mkdir($location, 0755);
                                mkdir('images/rewards/', 0777, true);
                            }

                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                            $location .= "/" . $fileNameNew;

                            move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/rewards/update");
                }
            } else {

                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/rewards/update");
              
            }

            $data = 
            [
                'rewards' => $rewards,
                'reward_id' => $reward_id,
                'reward_name' => trim($_POST['reward_name']),
                'experience_needed' => trim($_POST['experience_needed']),
                'reward_badgeimg' => $location,
                'reward_desc' => trim($_POST['reward_desc'])
            ];

            if ($data['reward_name'] && $data['experience_needed'] && $data['reward_desc']){
                if ($this->rewardModel->updateReward($data)){
                    header("Location: " . URLROOT. "/rewards" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('rewards/index', $data);
            }
        }

        $this->view('rewards/index', $data);
    }

    public function desc_canclaim($reward_id)
    {
        $stu_email = $_SESSION['email'];
        $rewards = $this->rewardModel->findRewardById($reward_id);
        $claimrewards = $this->rewardModel->findClaimById($reward_id, $stu_email);

        $data = [
            'rewards' => $rewards,
            'claimrewards' => $claimrewards
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
                'stu_email' => $_SESSION['email'],
                'reward_id' => $_SESSION['reward_id']
            ];


            if ($data['stu_id'] && $data['reward_id']){
                if ($this->rewardModel->claimreward($data)){
                    header("Location: " . URLROOT. "/rewards/liststudent" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('rewards/liststudent', $data);
            }
        }
        $stu_email = $_SESSION['email'];
        $students = $this->rewardModel->findStudentByEmail($stu_email);

        $data_2 = [
            'students' => $students
        ];


        $this->view('rewards/index', $data, $data_2);
    }

    public function desc($reward_id)
    {
        $rewards = $this->rewardModel->findRewardById($reward_id);

        $data = [
            'rewards' => $rewards
        ];

        $this->view('rewards/index', $data);
    }


    public function claim()
    {
        $rewards = $this->rewardModel->findRewardById($reward_id);

        $data = [
            'rewards' => $rewards,
            'stu_email' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
                'stu_email' => $_SESSION['email'],
                'reward_id' => trim($_POST['reward_id'])
            ];


            if ($data['stu_email']){
                if ($this->rewardModel->claimreward($data)){
                    header("Location: " . URLROOT. "/rewards/liststudent" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('rewards/liststudent', $data);
            }
        }


        $this->view('rewards/index', $data);
    }




};
?>