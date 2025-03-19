<?php
class Resumes extends Controller{
    public function __construct(){
        $this -> resumeModel = $this->model('Resume');
    }

    public function index()
    {
        $stu_email = $_SESSION['email'];
        // Fetch the student's information based on the email
        $students = $this->resumeModel->findStudentByEmail($stu_email);
        $combines = $this->resumeModel->findCombinedDataByID($students->stu_id);
        $combines2 = $this->resumeModel->findCombineAddDataByID($students->stu_id);
       
        $data = [
            'students' => $students,
            'combines' => $combines,
            'combines2'=> $combines2
        ];
        $this->view('resumes/index', $data);
    }

    public function resumelist()
    {
        $pages = $this->resumeModel->manageAllStudent();
       
        $data = [
            'pages'=>$pages
        ];
        $this->view('resumes/index', $data);
    }

    public function adminstudentresume($stu_id)
    {
        // Fetch the student's information based on the email
        $students = $this->resumeModel->findStudentById($stu_id);
        $combines = $this->resumeModel->findCombinedDataByID($stu_id);
        $combines2 = $this->resumeModel->findCombineAddDataByID($stu_id);
       
        $data = [
            'students' => $students,
            'combines' => $combines,
            'combines2'=> $combines2
        ];
        $this->view('resumes/index', $data);
    }

    public function update($stu_id)
    {
        $stu_email = $_SESSION['email'];

        $resumes = $this->resumeModel->findResumeById($stu_id);
        $students = $this->resumeModel->findStudentByEmail($stu_email);
        $combines = $this->resumeModel->findCombinedDataByID($students->stu_id);
        $combines2 = $this->resumeModel->findCombineAddDataByID($students->stu_id);

        $data = 
        [
            'resumes' => $resumes,
            'students' => $students,
            'combines' => $combines,
            'combines2'=> $combines2,
            'add_actname' => '',
            'add_actstartdate' => '',
            'add_actenddate' => '',
            'add_actans' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = 
            [
                'resumes' => $resumes,
                'stu_id' => $students->stu_id,
                'add_actname' => trim($_POST['add_actname']),
                'add_actstartdate' => trim($_POST['add_actstartdate']),
                'add_actenddate' => trim($_POST['add_actenddate']),
                'add_actans' => trim($_POST['add_actans'])
            ];

            if ($data['stu_id'] && $data['add_actname'] && $data['add_actstartdate'] && $data['add_actenddate'] && $data['add_actans']){
                if ($this->resumeModel->createResume($data)){
                    header("Location: " . URLROOT. "/resumes" );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('resumes/index', $data);
            }
        }

        $this->view('resumes/index', $data);
    }

    public function adminupdate($stu_id)
    {

        $resumes = $this->resumeModel->findResumeById($stu_id);
        $students = $this->resumeModel->findStudentById($stu_id);
        $combines = $this->resumeModel->findCombinedDataByID($stu_id);
        $combines2 = $this->resumeModel->findCombineAddDataByID($stu_id);

        $data = 
        [
            'resumes' => $resumes,
            'students' => $students,
            'combines' => $combines,
            'combines2'=> $combines2,
            'add_actname' => '',
            'add_actstartdate' => '',
            'add_actenddate' => '',
            'add_actans' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = 
            [
                'resumes' => $resumes,
                'stu_id' => $students->stu_id,
                'add_actname' => trim($_POST['add_actname']),
                'add_actstartdate' => trim($_POST['add_actstartdate']),
                'add_actenddate' => trim($_POST['add_actenddate']),
                'add_actans' => trim($_POST['add_actans'])
            ];

            if ($data['stu_id'] && $data['add_actname'] && $data['add_actstartdate'] && $data['add_actenddate'] && $data['add_actans']){
                if ($this->resumeModel->createResume($data)){
                    header("Location: " . URLROOT. "/resumes/adminstudentresume/" . $data['stu_id'] );
                }
                else
                {
                    die("Something went wrong :(");
                }
            }
            else
            {
                $this->view('resumes/index', $data);
            }
        }

        $this->view('resumes/index', $data);
    }

};
?>