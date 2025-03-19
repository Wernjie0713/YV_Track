<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");

        $result = $this->db->resultSet();

        return $result;
    }

    public function register($data) {

        date_default_timezone_set("Asia/Taipei");
        $registration_date = date('Y-m-d H:i:s');

        if ($data['role'] == "Student"){
            $this->db->query('INSERT INTO user (username, email, password, role, registration_date) VALUES(:username, :email, :password, :role, :registration_date); 

            INSERT INTO student (stu_email, stu_name, stu_age, stu_phone, stu_gender, stu_address, stu_university, stu_course, stu_photo, stu_des, stu_act, stu_exp, stu_skill, stu_lan) 
            VALUES(:stu_email, :stu_name, :stu_age, :stu_phone, :stu_gender, :stu_address , :stu_university, :stu_course, :stu_photo, :stu_des, :stu_act, :stu_exp, :stu_skill, :stu_lan );');
   
   
           $stu_name = "";
           $stu_age = "";
           $stu_phone = "";
           $stu_gender = "";
           $stu_address = "";
           $stu_university = "";
           $stu_course = "";
           $stu_photo = "";
           $stu_des = "";
           $stu_act = "";
           $stu_exp = "";
           $stu_skill = "";
           $stu_lan = "";
   
           $this->db->bind(':stu_email', $data['email']);
           $this->db->bind(':stu_name', $stu_name);
           $this->db->bind(':stu_age', $stu_age);
           $this->db->bind(':stu_phone', $stu_phone);
           $this->db->bind(':stu_gender', $stu_gender);
           $this->db->bind(':stu_address', $stu_address);
           $this->db->bind(':stu_university', $stu_university);
           $this->db->bind(':stu_course', $stu_course);
           $this->db->bind(':stu_photo', $stu_photo);
           $this->db->bind(':stu_des', $stu_des);
           $this->db->bind(':stu_act', $stu_act);
           $this->db->bind(':stu_exp', $stu_exp);
           $this->db->bind(':stu_skill', $stu_skill);
           $this->db->bind(':stu_lan', $stu_lan);

           //Bind values
           $this->db->bind(':username', $data['username']);
           $this->db->bind(':email', $data['email']);
           $this->db->bind(':password', $data['password']);
           $this->db->bind(':role', $data['role']);
           $this->db->bind(':registration_date', $registration_date);
        } 
        elseif ($data['role'] == "Client"){
            $this->db->query('INSERT INTO user (username, email, password, role, registration_date) VALUES(:username, :email, :password, :role, :registration_date); 

            INSERT INTO client (client_email, client_organization, client_phone, client_photo, client_des) 
            VALUES(:client_email, :client_organization, :client_phone, :client_photo,  :client_des );');
   
   
           $client_organization = "";
           $client_phone = "";
           $client_photo = "";
           $client_des = "";
           
   
           $this->db->bind(':client_email', $data['email']);
           $this->db->bind(':client_organization', $client_organization);
           $this->db->bind(':client_phone', $client_phone);
           $this->db->bind(':client_photo', $client_photo);
           $this->db->bind(':client_des', $client_des);

           //Bind values
           $this->db->bind(':username', $data['username']);
           $this->db->bind(':email', $data['email']);
           $this->db->bind(':password', $data['password']);
           $this->db->bind(':role', $data['role']);
           $this->db->bind(':registration_date', $registration_date);
        } 
       
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($row) {
           $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row; // User authenticated successfully
            }
        }
    
        return false; // User not found or authentication failed
    }


    public function updatePassword($data)
    {

        $this->db->query("UPDATE user SET password = :password 
            WHERE email = :email;");

        //Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createResetEmail($data)
    {

        //admin users
        $this->db->query("INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) 
         VALUES(:pwdResetEmail, :pwdResetSelector, :pwdResetToken, :pwdResetExpires);");

        $this->db->bind(':pwdResetEmail', $data['email']);
        $this->db->bind(':pwdResetSelector', $data['pwdResetSelector']);
        $this->db->bind(':pwdResetToken', $data['pwdResetToken']);
        $this->db->bind(':pwdResetExpires', $data['pwdResetExpires']);

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteResetEmail($email)
    {

        $this->db->query("DELETE FROM pwdreset WHERE pwdResetEmail = :pwdResetEmail");
        $p = 1;
        $this->db->bind(':pwdResetEmail', $email);
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        $this->db->execute();

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the controller.
    public function checkEmailByToken($email)
    {
        //prepared statement
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //email param will be binded with the email variable.

        $this->db->bind(':email', $email);

        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the controller.
    public function findEmailByToken($selector)
    {

        //prepared statement
        $this->db->query('SELECT * FROM pwdreset 
        WHERE pwdResetSelector = :pwdResetSelector AND pwdResetExpires >= :pwdResetExpires');

        //email param will be binded with the email variable.
        
        $currentDate = date("U");

        $this->db->bind(':pwdResetSelector', $selector);
   
        $this->db->bind(':pwdResetExpires', $currentDate);

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {

            return false;
        }
    }

   public function setPfp()
   {
    

    $email = $_SESSION['email'];


    if ($_SESSION['role'] == "Student")
        {
            $this->db->query('SELECT * FROM student WHERE stu_email = :email');
        }
    
        elseif ($_SESSION['role'] == "Client")
        {
            $this->db->query('SELECT * FROM client WHERE client_email = :email');
        }
    

    $this->db->bind(":email", $email);
    $row = $this->db->single();

    if($row)
    {
        
        if ($_SESSION['role'] == "Student")
        {
            $_SESSION['pfp'] = $row->stu_photo;
        }

        if ($_SESSION['role'] == "Client")
        {
            $_SESSION['pfp'] = $row->client_photo;
        }
    
    }

    
   }


    
   
}

