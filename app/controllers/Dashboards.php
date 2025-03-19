<?php
class Dashboards extends Controller {

    public function __construct()
    {
        $this->dashboardModel = $this->model('Dashboard');
        $this->pageModel = $this->model('Page');
    }


    public function index() {
        if($_SESSION['role'] == "Student")
        {            
            $studentinfo = $this->dashboardModel->getStudentByEmail();
            $joinedActivities = $this->dashboardModel->getJoinedActivities($studentinfo->stu_id);
            $upcomingActivities = $this->dashboardModel->UpcomingActivities();
            $claim=$this->dashboardModel->showAllRewards();
            $data = [
                'studentinfo' => $studentinfo,
                'joinedActivities' => $joinedActivities,
                'upcomingActivities' => $upcomingActivities,
                'claim'=>$claim
            ];
        }
        else if($_SESSION['role'] == "Client")
        {
            $clientinfo = $this->dashboardModel->getClientByEmail();
            $user_id = $_SESSION['user_id'];
            $activities = $this->dashboardModel->findActivityByUserId($user_id);
            $upcomingActivities = $this->dashboardModel->UpcomingActivities();
            $data = [
                'clientinfo' => $clientinfo,
                'activities' => $activities,
                'upcomingActivities' => $upcomingActivities
                
            ];
        }
        else if($_SESSION['role'] == "Admin")
        {
            $pages = $this->dashboardModel->manageAllStudent();
            $clientlist = $this->dashboardModel->manageAllClient();
            $user_id = $_SESSION['user_id'];
            $activities = $this->dashboardModel->findActivityByUserId($user_id);
            $upcomingActivities = $this->dashboardModel->UpcomingActivities();
            $data = [
                'pages' => $pages,
                'clientlist' => $clientlist,
                'activities' => $activities,
                'upcomingActivities' => $upcomingActivities
            ];
        }
        $this -> view('dashboards/index', $data);
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

        $this->view('dashboards/index',$data);
    }
   
       
}