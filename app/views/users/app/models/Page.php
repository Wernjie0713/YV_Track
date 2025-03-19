<?php

class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

  
    public function studentProfile()
    {

        $this->db->query("SELECT * FROM student WHERE stu_email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function clientProfile()
    {

        $this->db->query("SELECT * FROM client WHERE client_email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
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

    // public function universitySelection()
    // {

    //     $this->db->query("SELECT * FROM uni_details");

    //     $result = $this->db->resultSet();

    //     return $result;
    // }

    // public function universitySelectionDetails()
    // {

    //     if ($_SESSION['user_role'] == "student") {

    //     $user_code = $_SESSION['user_code'];

    //     $this->db->query("SELECT * FROM uni_details
    //     INNER JOIN st_profile ON uni_details.uni_code=st_profile.univ_code  WHERE st_code = :st_code");

    //     $this->db->bind(':st_code', $user_code);

    //     }elseif($_SESSION['user_role'] == "supervisor"){

    //     $user_code = $_SESSION['user_code'];

    //     $this->db->query("SELECT * FROM uni_details
    //     INNER JOIN sv_profile ON uni_details.uni_code=sv_profile.univ_code  WHERE sv_code = :sv_code");

    //     $this->db->bind(':sv_code', $user_code);

    //     }

    //     $result = $this->db->resultSet();

    //     return $result;
    // }


    public function updateStudentProfile($data)
    {

 
        if (isset($data['stu_photo'])) {

        $this->db->query("UPDATE student 
        SET stu_email = :email, stu_name = :stu_name, stu_age = :stu_age, stu_phone = :stu_phone, stu_gender = :stu_gender,
        stu_university  = :stu_university, stu_course = :stu_course, stu_address  = :stu_address, stu_photo  = :stu_photo, stu_des = :stu_des, stu_skill = :stu_skill, stu_lan = :stu_lan WHERE stu_email   = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':stu_name', $data['stu_name']);
        $this->db->bind(':stu_age', $data['stu_age']);
        $this->db->bind(':stu_phone', $data['stu_phone']);
        $this->db->bind(':stu_gender', $data['stu_gender']);
        $this->db->bind(':stu_address', $data['stu_address']);
        $this->db->bind(':stu_university', $data['stu_university']);
        $this->db->bind(':stu_course', $data['stu_course']);
        $this->db->bind(':stu_des', $data['stu_des']);
        $this->db->bind(':stu_skill', $data['stu_skill']);
        $this->db->bind(':stu_lan', $data['stu_lan']);
        $this->db->bind(':stu_photo', $data['stu_photo']);
        $_SESSION['pfp'] = $data['stu_photo'];

        }else{

            $this->db->query("UPDATE student 
            SET stu_email = :email, stu_name = :stu_name, stu_age = :stu_age, stu_phone = :stu_phone, stu_gender = :stu_gender,
            stu_university  = :stu_university, stu_course = :stu_course, stu_address  = :stu_address,  stu_des = :stu_des, stu_skill = :stu_skill, stu_lan = :stu_lan WHERE stu_email   = :email;");
    
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':stu_name', $data['stu_name']);
            $this->db->bind(':stu_age', $data['stu_age']);
            $this->db->bind(':stu_phone', $data['stu_phone']);
            $this->db->bind(':stu_gender', $data['stu_gender']);
            $this->db->bind(':stu_address', $data['stu_address']);
            $this->db->bind(':stu_university', $data['stu_university']);
            $this->db->bind(':stu_course', $data['stu_course']);
            $this->db->bind(':stu_des', $data['stu_des']);
            $this->db->bind(':stu_skill', $data['stu_skill']);
            $this->db->bind(':stu_lan', $data['stu_lan']);
            
        }
        
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateClientProfile($data)
    {

 
        if (isset($data['client_photo'])) {

        $this->db->query("UPDATE client 
        SET client_email = :email, client_organization = :client_organization, client_phone = :client_phone, client_des = :client_des, client_photo = :client_photo WHERE client_email   = :email;");

        $this->db->bind(':email', $_SESSION['email']);
        $this->db->bind(':client_organization', $data['client_organization']);
        $this->db->bind(':client_phone', $data['client_phone']);
        $this->db->bind(':client_des', $data['client_des']);
        $this->db->bind(':client_photo', $data['client_photo']);

        $_SESSION['pfp'] = $data['client_photo'];

        }else{

            $this->db->query("UPDATE client 
            SET client_email = :email, client_organization = :client_organization, client_phone = :client_phone, client_des = :client_des WHERE client_email   = :email;");
    
            $this->db->bind(':email', $_SESSION['email']);
            $this->db->bind(':client_organization', $data['client_organization']);
            $this->db->bind(':client_phone', $data['client_phone']);
            $this->db->bind(':client_des', $data['client_des']);
            
        }
        
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findClientAct()
    {
        $this->db->query("SELECT * FROM activity WHERE user_id = :user_id");

        $this->db->bind(':user_id', $_SESSION['user_id']);

        $row = $this->db->resultSet();

        return $row;
    }

    
    
    public function findStudentByEmail($stu_email) {
        $this->db->query("SELECT * FROM student WHERE stu_email = :email");
        $this->db->bind(':email', $stu_email);
        $result = $this->db->single();
        return $result;
    }
    
    

    public function findClientByEmail($client_email)
    {
        $this->db->query("SELECT * FROM client WHERE client_email = :email");

        $this->db->bind(':email', $client_email);

        $row = $this->db->single();

        return $row;

    }

    public function findPastactByID($stu_id)
    {
        $this->db->query("SELECT act_id FROM past_activity WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $act_ids = $this->db->resultSet();

        $act_names = array(); // Initialize an array to store act_names

        foreach ($act_ids as $act) {
            $this->db->query("SELECT act_name FROM activity WHERE act_id = :act_id");
            $this->db->bind(':act_id', $act->act_id);
            $act_name = $this->db->resultSet();

            // Assuming $act_name is an array, you may want to extract the name from the result set
            // and store it in the array
            if (!empty($act_name)) {
                
                
                    $act_names[] = $act_name[0]->act_name;
                
            }
    }

    return $act_names;
}




    public function findRewardByEmail($stu_email)
    {
        
        $this->db->query("SELECT reward_id FROM claim WHERE stu_email = :stu_email");
        $this->db->bind(":stu_email",$stu_email);

        $reward_id = $this->db->resultSet();

        $rewards = array();
        

        foreach ($reward_id as $reward) {

            $this->db->query("SELECT reward_badgeimg FROM reward WHERE reward_id = :reward_id");
            $this->db->bind(':reward_id', $reward->reward_id);
            $rewardimg = $this->db->resultSet();

            if (!empty($rewardimg)) {
                $rewards[] = $rewardimg[0]->reward_badgeimg;
            }
        }
    
       
    
        return $rewards;
    

    }
   
    public function findUserIDByEmail($client_email)
    {
        $this->db->query("SELECT user_id FROM user WHERE email = :client_email");
        $this->db->bind(':client_email',$client_email);

        $row = $this->db->single();
        
        return $row;
    }

    public function findActByUserID($user_id)
    {
        $act_names = array();
        $this->db->query("SELECT act_name FROM activity WHERE user_id = :user_id");
        $this->db->bind(':user_id',$user_id);
        $act_name = $this->db->resultSet();
        
        foreach ($act_name as $act) {
            if (!empty($act)) {
                $act_names[] = $act->act_name;
            }
        }
    
       
    
        return $act_names;
    
        

    }
}
 


