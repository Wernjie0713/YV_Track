<?php

class Activity{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function manageAllActivities(){
        $this->db->query('SELECT * FROM activity');

        $results = $this->db->resultSet();

        return $results;

    }

    

    public function findActivityByUserId($user_id){
        $this->db->query('SELECT * FROM activity WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        $results = $this->db->resultSet();

         return $results;

    }

 public function addActivity($data)
    {
        
        $this->db->query('INSERT INTO activity (act_name, act_des,act_start,act_end,act_link,act_duration,act_mark,user_id,act_photo) VALUES (:act_name, :act_des, :act_start, :act_end, :act_link, :act_duration, :act_mark,  :user_id, :act_photo)');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':act_name', $data['act_name']);
        $this->db->bind(':act_des', $data['act_des']);
        $this->db->bind(':act_start', $data['act_start']);
        $this->db->bind(':act_end', $data['act_end']);
        $this->db->bind(':act_link', $data['act_link']);
        $this->db->bind(':act_duration', $data['act_duration']);
        $this->db->bind(':act_mark', $data['act_mark']);
        $this->db->bind(':act_photo', $data['act_photo']);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function findActivityById($act_id)
    {
        $this->db->query('SELECT * FROM activity WHERE act_id = :act_id');
        $this->db->bind(':act_id', $act_id);

        $row = $this->db->single();

        return $row;
    }

    

    public function updateActivity($data)
    {

        if (isset($data['act_photo']))
        {
            $this->db->query('UPDATE activity SET act_name = :act_name, act_des = :act_des, act_start = :act_start, act_end = :act_end, act_link = :act_link, act_duration = :act_duration, act_mark = :act_mark, act_photo = :act_photo
            WHERE act_id = :act_id');

            $this->db->bind(':act_id', $data['act_id']);
            $this->db->bind(':act_name', $data['act_name']);
            $this->db->bind(':act_des', $data['act_des']);
            $this->db->bind(':act_start', $data['act_start']);
            $this->db->bind(':act_end', $data['act_end']);
            $this->db->bind(':act_link', $data['act_link']);
            $this->db->bind(':act_duration', $data['act_duration']);
            $this->db->bind(':act_mark', $data['act_mark']);
            $this->db->bind(':act_photo', $data['act_photo']);
        }
        else
        {
            $this->db->query('UPDATE activity SET act_name = :act_name, act_des = :act_des, act_start = :act_start, act_end = :act_end, act_link = :act_link, act_duration = :act_duration, act_mark = :act_mark
            WHERE act_id = :act_id');
    
            $this->db->bind(':act_id', $data['act_id']);
            $this->db->bind(':act_name', $data['act_name']);
            $this->db->bind(':act_des', $data['act_des']);
            $this->db->bind(':act_start', $data['act_start']);
            $this->db->bind(':act_end', $data['act_end']);
            $this->db->bind(':act_link', $data['act_link']);
            $this->db->bind(':act_duration', $data['act_duration']);
            $this->db->bind(':act_mark', $data['act_mark']);
        }
        


        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteActivity($act_id){
        $this->db->query('DELETE FROM activity WHERE act_id = :act_id');
    
        $this->db->bind(':act_id', $act_id);
    
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //activity_registration://
    public function findStudentByEmail($email)
    {
        $this->db->query('SELECT * FROM student WHERE stu_email = :stu_email');
        $this->db->bind(':stu_email', $email);

        $row = $this->db->single();

        return $row;
    }
    public function activityRegistration($data){
    // Insert the participant into the activity_record table
        $this->db->query('INSERT INTO activity_record (stu_id, act_id, stu_name, stu_age, stu_phone, stu_email, stu_gender, stu_university, stu_course) 
        VALUES (:stu_id, :act_id, :stu_name, :stu_age, :stu_phone, :stu_email, :stu_gender, :stu_university, :stu_course);' );
        
        $this->db->bind(':stu_id', $data['stu_id']);
        $this->db->bind(':act_id', $data['act_id']);        
        $this->db->bind(':stu_name', $data['stu_name']);
        $this->db->bind(':stu_age', $data['stu_age']);
        $this->db->bind(':stu_phone', $data['stu_phone']);
        $this->db->bind(':stu_email', $data['stu_email'] );
        $this->db->bind(':stu_gender', $data['stu_gender']);
        $this->db->bind(':stu_university', $data['stu_university']);
        $this->db->bind(':stu_course', $data['stu_course']);
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
}

//past activities
public function passed ($act_id, $act_end) {
    $currentDate = date('Y-m-d');
    return $currentDate > $act_end;
}

public function getJoinedActivities($stu_id){
    // Fetch the activities that the student has joined
    $this->db->query('SELECT * FROM activity_record WHERE stu_id = :stu_id');
    $this->db->bind(':stu_id', $stu_id);
    $rows = $this->db->resultSet();

    if (!$rows) {
        echo"No activities joined.";
        return false;
    }

    $joinedActivities = [];

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

    return $joinedActivities;
} 

//feedback
public function addFeedback($data)
 {
     $this->db->query('INSERT INTO feedback (stu_id, stu_name, act_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, projectFile) 
                       VALUES (:stu_id, :stu_name, :act_id, :q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :projectFile);

                       INSERT INTO past_activity(act_id, act_mark, stu_id, ans1, ans2, ans3)
                       VALUES (:act_id, :act_mark, :stu_id, :q1, :q2, :q3);

                       UPDATE student SET stu_exp = stu_exp+:act_mark WHERE stu_id = :stu_id
                
                    ');
 


     $this->db->bind(':stu_id', $data['stu_id']);
     $this->db->bind(':stu_name', $data['stu_name']);
     $this->db->bind(':act_id', $data['act_id']);
     $this->db->bind(':act_mark', $data['act_mark']);
     $this->db->bind(':q1', $data['q1']);
     $this->db->bind(':q2', $data['q2']);
     $this->db->bind(':q3', $data['q3']);
     $this->db->bind(':q4', $data['q4']);
     $this->db->bind(':q5', $data['q5']);
     $this->db->bind(':q6', $data['q6']);
     $this->db->bind(':q7', $data['q7']);
     $this->db->bind(':q8', $data['q8']);
     $this->db->bind(':q9', $data['q9']);
     $this->db->bind(':projectFile', $data['projectFile']);
 
     if ($this->db->execute()) {
         return true;
     } else {
         return false;
     }
 }

public function getFeedback ($act_id){
    $this->db->query('SELECT * FROM feedback WHERE act_id=:act_id;');
    $this->db->bind(':act_id', $act_id);
    $results = $this->db->resultSet();
    return $results;
}

public function getUserIdFromActivityId($act_id)
{
    $this->db->query("SELECT user_id FROM activity WHERE act_id = :act_id");
    $this->db->bind(':act_id',$act_id);

    $result = $this->db->single();

    return $result;
}

public function findEmailByUserID($user_id)
{
    $this->db->query("SELECT email FROM user WHERE user_id = :user_id");
    echo $this->db->query("SELECT email FROM user WHERE user_id = :user_id");
    $this->db->bind(':user_id', $user_id);
    $row = $this->db->single();


    return $row->email;
}

public function findRoleByUserID($user_id)
{
    $this->db->query("SELECT role FROM user WHERE user_id = :user_id");
    echo $this->db->query("SELECT role FROM user WHERE user_id = :user_id");
    $this->db->bind(':user_id', $user_id);
    $row = $this->db->single();


    return $row->role;
}

//calculate if client can still edit the details of activity
public function canEdit ($act_start){ 
    $currentDate = new DateTime('today');  
    $start_date = new DateTime ($act_start);
    $difference = (int) $currentDate->diff($start_date)->days;
    if ($difference > 7 && $currentDate<$start_date){
        return true;
    }
    else{return false;}
}

//viewparticipants
public function getParticipant($act_id){
    $this->db->query("SELECT * FROM activity_record WHERE act_id = :act_id");
    $this->db->bind(':act_id', $act_id);
    $rows=$this->db->resultSet();
    return $rows;
}

//determine if student can still join the activity
public function canRegister ($act_start) {
    $currentDate = date('Y-m-d');
    return $currentDate < $act_start;
}

//determine if the student already joined the activity
public function joined ($stu_id, $act_id){
    $this->db->query('SELECT * from activity_record WHERE stu_id =:stu_id AND act_id=:act_id;');
    $this->db->bind(':stu_id', $stu_id);
    $this->db->bind(':act_id', $act_id);
    
    $this->db->execute();

    // Check if there are any rows returned
    return $this->db->rowCount() > 0;
}

//determine if the student already filled up the feedback form
public function filled($act_id, $stu_id){
    $this->db->query('SELECT * from feedback WHERE stu_id =:stu_id AND act_id=:act_id;');
    $this->db->bind(':stu_id', $stu_id);
    $this->db->bind(':act_id', $act_id);
    
    $this->db->execute();

    // Check if there are any rows returned
    return $this->db->rowCount() > 0;
}

public function UpdateNoParticipants($count, $activity_id)
    {
        $this->db->query('UPDATE activity SET no_participants = :count WHERE act_id=:activity_id');
        $this->db->bind(':count', $count);
        $this->db->bind(':activity_id', $activity_id);
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>