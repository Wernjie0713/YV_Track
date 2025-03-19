<?php

class Dashboard
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function manageAllStudent(){
        $this->db->query('SELECT * FROM student');

        $results = $this->db->resultSet();

        return $results;

    }

    public function manageAllClient(){
        $this->db->query('SELECT * FROM client');

        $results = $this->db->resultSet();

        return $results;

    }

    public function getStudentByEmail() {
        $this->db->query("SELECT * FROM student WHERE stu_email = :email");
        $this->db->bind(':email', $_SESSION['email']);
        
        $result = $this->db->single();
        return $result;
    }

    public function getClientByEmail() {
        $this->db->query("SELECT * FROM client WHERE client_email = :email");
        $this->db->bind(':email', $_SESSION['email']);
        
        $result = $this->db->single();
        return $result;
    }
    //Activity
    public function getJoinedActivities($stu_id){
        // Fetch the activities that the student has joined
        $this->db->query('SELECT * FROM activity_record WHERE stu_id = :stu_id ORDER BY record_id DESC');
        $this->db->bind(':stu_id', $stu_id);
        $rows = $this->db->resultSet();
        
        $joinedActivities = [];
        if ($rows) {
            foreach ($rows as $row) {
                // Fetch activity details for each ac_id
                $this->db->query('SELECT * FROM activity WHERE act_id = :act_id');
                $this->db->bind(':act_id', $row->act_id);
                $activityDetails = $this->db->single();
        
                if ($activityDetails) {
                    // Add activity details to the result array
                    $joinedActivities[] = $activityDetails;
                }
            }
        }
    
        return $joinedActivities;
    }

    public function UpcomingActivities(){
        // Fetch the upcoming activities
        if($_SESSION['role']=="Student")
        {
            $this->db->query('SELECT * FROM activity_record INNER JOIN activity ON activity_record.act_id=activity.act_id
            WHERE activity_record.stu_email = :email AND activity.act_start >= date(NOW()) ORDER BY activity.act_start ASC');
            $this->db->bind(':email', $_SESSION['email']);
        }
        else if($_SESSION['role']=="Client"||$_SESSION['role']=="Admin")
        {
            $this->db->query('SELECT * FROM activity WHERE user_id = :user_id AND act_start >= date(NOW())');
            $this->db->bind(':user_id', $_SESSION['user_id']); 
        }
        
        $result = $this->db->resultSet();
        return $result;
    }


    public function findActivityByUserId($user_id){
        $this->db->query('SELECT * FROM activity WHERE user_id = :user_id ORDER BY no_participants DESC');
        $this->db->bind(':user_id', $user_id);

        $results = $this->db->resultSet();

        return $results;
    }
    //Reward
    public function showAllRewards(){
        $this->db->query('SELECT reward.reward_name, reward.reward_badgeimg FROM claim INNER JOIN reward ON claim.reward_id=reward.reward_id WHERE claim.stu_email=:email');
        $this->db->bind(':email', $_SESSION['email']);
        $results = $this->db->resultSet();

        return $results;
    }
}
