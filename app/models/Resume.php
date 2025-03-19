<?php
class Resume{
    private $db;

    public function __construct(){
        $this-> db = new Database;
    }

    public function manageAllStudent(){
        $this->db->query('SELECT * FROM student');

        $results = $this->db->resultSet();

        return $results;

    }

    public function findStudentById($stu_id)
    {
        $this->db->query('SELECT * FROM student WHERE stu_id = :stu_id');
        $this->db->bind(':stu_id', $stu_id);
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

    public function findResumeById($stu_id)
    {
        $this->db->query('SELECT * FROM resumes WHERE stu_id = :stu_id');
        $this->db->bind(':stu_id', $stu_id);
        $this->db->execute();

        $row = $this->db->single();

        return $row;
    }

    public function findPastactnameByID($stu_id)
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

    public function findPastactstartByID($stu_id)
    {
        $this->db->query("SELECT act_id FROM past_activity WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $act_ids = $this->db->resultSet();

        $act_starts = array(); // Initialize an array to store act_names

        foreach ($act_ids as $act) {
            $this->db->query("SELECT act_start FROM activity WHERE act_id = :act_id");
            $this->db->bind(':act_id', $act->act_id);
            $act_start = $this->db->resultSet();

            // Assuming $act_name is an array, you may want to extract the name from the result set
            // and store it in the array
            if (!empty($act_start)) {
                
                    $act_starts[] = $act_start[0]->act_start;
            }
        }

        return $act_starts;
    }

    public function findPastactendByID($stu_id)
    {
        $this->db->query("SELECT act_id FROM past_activity WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $act_ids = $this->db->resultSet();

        $act_ends = array(); // Initialize an array to store act_names

        foreach ($act_ids as $act) {
            $this->db->query("SELECT act_end FROM activity WHERE act_id = :act_id");
            $this->db->bind(':act_id', $act->act_id);
            $act_end = $this->db->resultSet();

            // Assuming $act_name is an array, you may want to extract the name from the result set
            // and store it in the array
            if (!empty($act_end)) {
                
                    $act_ends[] = $act_end[0]->act_end;
            }
        }

        return $act_ends;
    }

    public function findPastactAns1ByID($stu_id)
    {
        $this->db->query("SELECT ans1 FROM past_activity WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $ans1s = $this->db->resultSet();

        $allans1 = array(); // Initialize an array to store ans1 values

        foreach ($ans1s as $ans1) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $allans1[] = $ans1->ans1;
        }

        return $allans1;
    }

    public function findPastactAns2ByID($stu_id)
    {
        $this->db->query("SELECT ans2 FROM past_activity WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $ans2s = $this->db->resultSet();

        $allans2 = array(); // Initialize an array to store ans1 values

        foreach ($ans2s as $ans2) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $allans2[] = $ans2->ans2;
        }

        return $allans2;
    }

    public function findPastactAns3ByID($stu_id)
    {
        $this->db->query("SELECT ans3 FROM past_activity WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $ans3s = $this->db->resultSet();

        $allans3 = array(); // Initialize an array to store ans1 values

        foreach ($ans3s as $ans3) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $allans3[] = $ans3->ans3;
        }

        return $allans3;
    }

    public function findCombinedDataByID($stu_id)
    {
        // Call the first function to get activity names
        $act_names = $this->findPastactnameByID($stu_id);

        // Call the second function to get ans1 values
        $allans1 = $this->findPastactAns1ByID($stu_id);
        $allans2 = $this->findPastactAns2ByID($stu_id);
        $allans3 = $this->findPastactAns3ByID($stu_id);
        $act_starts = $this->findPastactstartByID($stu_id);
        $act_ends = $this->findPastactendByID($stu_id);

        // Combine the results into a single array
        $combinedArray = array();

        // Loop through both arrays and combine elements
        for ($i = 0; $i < min(count($act_names), count($allans1)); $i++) {
            $combinedArray[] = array(
                'act_name' => $act_names[$i],
                'ans1' => $allans1[$i],
                'ans2' => $allans2[$i],
                'ans3' => $allans3[$i],
                'act_start' => $act_starts[$i],
                'act_end' => $act_ends[$i]
            );
        }

        return $combinedArray;
    }

    public function findAddActNameByID($stu_id)
    {
        $this->db->query("SELECT add_actname FROM resumes WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $add_actnames = $this->db->resultSet();

        $alladdactname = array(); // Initialize an array to store ans1 values

        foreach ($add_actnames as $add_actname) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $alladdactname[] = $add_actname->add_actname;
        }

        return $alladdactname;
    }

    public function findAddActStartDateByID($stu_id)
    {
        $this->db->query("SELECT add_actstartdate FROM resumes WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $add_actstartdates = $this->db->resultSet();

        $alladdactstartdate = array(); // Initialize an array to store ans1 values

        foreach ($add_actstartdates as $add_actstartdate) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $alladdactstartdate[] = $add_actstartdate->add_actstartdate;
        }

        return $alladdactstartdate;
    }

    public function findAddActEndDateByID($stu_id)
    {
        $this->db->query("SELECT add_actenddate FROM resumes WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $add_actenddates = $this->db->resultSet();

        $alladdactenddate = array(); // Initialize an array to store ans1 values

        foreach ($add_actenddates as $add_actenddate) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $alladdactenddate[] = $add_actenddate->add_actenddate;
        }

        return $alladdactenddate;
    }

    public function findAddActAnsByID($stu_id)
    {
        $this->db->query("SELECT add_actans FROM resumes WHERE stu_id = :stu_id");
        $this->db->bind(':stu_id', $stu_id);
        $add_actanss = $this->db->resultSet();

        $alladdactans = array(); // Initialize an array to store ans1 values

        foreach ($add_actanss as $add_actans) {
            // Assuming $ans1 is an object, you may directly push it to the array
            $alladdactans[] = $add_actans->add_actans;
        }

        return $alladdactans;
    }

    public function findCombineAddDataByID($stu_id)
    {
        // Call the first function to get activity names
        $alladdactname = $this->findAddActNameByID($stu_id);

        // Call the second function to get ans1 values
        $allactstartdate = $this->findAddActStartDateByID($stu_id);
        $allactenddate = $this->findAddActEndDateByID($stu_id);
        $allactans = $this->findAddActAnsByID($stu_id);
        // Combine the results into a single array
        $combinedArray = array();

        // Loop through both arrays and combine elements
        for ($i = 0; $i < min(count($alladdactname), count($allactstartdate)); $i++) {
            $combinedArray[] = array(
                'add_actname' => $alladdactname[$i],
                'add_actstartdate' => $allactstartdate[$i],
                'add_actenddate' => $allactenddate[$i],
                'add_actans' => $allactans[$i]
            );
        }

        return $combinedArray;
    }

    public function createResume($data)
    {
        $this->db->query('INSERT INTO resumes (stu_id, add_actname, add_actstartdate, add_actenddate, add_actans) 
        VALUES (:stu_id, :add_actname, :add_actstartdate, :add_actenddate, :add_actans)');

        $this->db->bind(':stu_id', $data['stu_id']);
        $this->db->bind(':add_actname', $data['add_actname']);
        $this->db->bind(':add_actstartdate', $data['add_actstartdate']);
        $this->db->bind(':add_actenddate', $data['add_actenddate']);
        $this->db->bind(':add_actans', $data['add_actans']);

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


