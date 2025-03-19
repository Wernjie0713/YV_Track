<?php
class Reward{
    private $db;

    public function __construct(){
        $this-> db = new Database;
    }

    public function manageAllRewards(){
        $this->db->query('SELECT * FROM reward');

        $results = $this->db->resultSet();

        return $results;
    }

    public function manageAllStudents(){
        $this->db->query('SELECT * FROM student');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addReward($data)
    {
        if (isset($data['reward_badgeimg'])) {

            $this->db->query('INSERT INTO reward (reward_name, experience_needed, reward_badgeimg, reward_desc)
            VALUES (:reward_name, :experience_needed, :reward_badgeimg, :reward_desc)');
    
            $this->db->bind(':reward_name', $data['reward_name']);
            $this->db->bind(':experience_needed', $data['experience_needed']);
            $this->db->bind(':reward_badgeimg', $data['reward_badgeimg']);
            $this->db->bind(':reward_desc', $data['reward_desc']);
    
            }else{
    
            $this->db->query('INSERT INTO reward (reward_name, experience_needed, reward_badgeimg, reward_desc)
            VALUES (:reward_name, :experience_needed, :reward_desc)');
        
            $this->db->bind(':reward_name', $data['reward_name']);
            $this->db->bind(':experience_needed', $data['experience_needed']);
            $this->db->bind(':reward_desc', $data['reward_desc']);
                
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

    public function updateReward($data)
    {
        if (isset($data['reward_badgeimg'])) {

            $this->db->query('UPDATE reward SET reward_name=:reward_name, experience_needed=:experience_needed, reward_badgeimg=:reward_badgeimg, reward_desc=:reward_desc 
            WHERE reward_id=:reward_id');

            $this->db->bind(':reward_id', $data['reward_id']);
            $this->db->bind(':reward_name', $data['reward_name']);
            $this->db->bind(':experience_needed', $data['experience_needed']);
            $this->db->bind(':reward_badgeimg', $data['reward_badgeimg']);
            $this->db->bind(':reward_desc', $data['reward_desc']);
    
        }else{
    
            $this->db->query('UPDATE reward SET reward_name=:reward_name, experience_needed=:experience_needed, reward_desc=:reward_desc 
            WHERE reward_id=:reward_id');

            $this->db->bind(':reward_id', $data['reward_id']);
            $this->db->bind(':reward_name', $data['reward_name']);
            $this->db->bind(':experience_needed', $data['experience_needed']);
            $this->db->bind(':reward_desc', $data['reward_desc']);
                
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

    public function findRewardById($reward_id)
    {
        $this->db->query('SELECT * FROM reward WHERE reward_id = :reward_id');
        $this->db->bind(':reward_id', $reward_id);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    public function findStudentByEmail($stu_email)
    {
        $this->db->query('SELECT * FROM student WHERE stu_email = :stu_email');
        $this->db->bind(':stu_email', $stu_email);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    public function findClaimById($reward_id, $stu_email)
    {
        $this->db->query('SELECT * FROM claim WHERE reward_id = :reward_id AND stu_email=:stu_email');
        $this->db->bind(':reward_id', $reward_id);
        $this->db->bind(':stu_email', $stu_email);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    // public function findactmarkById($stu_id)
    // {
    //     $this->db->query('SELECT act_mark FROM past_activity WHERE stu_id = :stu_id');
    //     $this->db->bind(':stu_id', $stu_id);
    //     $this->db->execute();

    //     $row = $this->db->single();

    //     return $row;
    // }

    public function findactmark3ById($stu_id)
    {
        $this->db->query('SELECT * FROM past_activity WHERE stu_id = :stu_id AND act_mark=3');
        $this->db->bind(':stu_id', $stu_id);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    public function findactmark5ById($stu_id)
    {
        $this->db->query('SELECT * FROM past_activity WHERE stu_id = :stu_id AND act_mark=5');
        $this->db->bind(':stu_id', $stu_id);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    public function findactmark7ById($stu_id)
    {
        $this->db->query('SELECT * FROM past_activity WHERE stu_id = :stu_id AND act_mark=7');
        $this->db->bind(':stu_id', $stu_id);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    public function claimreward($data)
    {
        $this->db->query('INSERT INTO claim (stu_email, reward_id) VALUES (:stu_email, :reward_id)');

        $this->db->bind(':stu_email', $data['stu_email']);
        $this->db->bind(':reward_id', $data['reward_id']);
        
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


