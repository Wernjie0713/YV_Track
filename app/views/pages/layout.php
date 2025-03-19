<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->


        <!--Content area here-->

        <?php
                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                        $url = "https://";
                    else
                        $url = "http://";
                    // Append the host(domain name, ip) to the URL.   
                    $url .= $_SERVER['HTTP_HOST'];

                    // Append the requested resource location to the URL   
                    $url .= $_SERVER['REQUEST_URI'];
                  
                    ?>

        <?php
                 
                 $h_url = URLROOT .  "/pages/index"; //home_url
                 $e_url = URLROOT . "/pages/edit_profile"; //edit_user_url
                 $ec_url = URLROOT . "/pages/edit_client_profile"; //edit_client_url
                 $p_url = URLROOT . "/pages/studentlist"; //student list url
                 $c_url = URLROOT . "/pages/clientlist"; //client list url
                 $sp_url = URLROOT . "/pages/studentprofile"; //student profile url
                 $cp_url = URLROOT . "/pages/clientprofile"; //student profile url
                 $spp_url = URLROOT . "/pages/profileview"; //student profile url
                 $cpp_url = URLROOT . "/pages/cprofileview"; //client profile url

                 if (isset($data['student']) && is_object($data['student'])) {
                    $spp_url = URLROOT . "/pages/profileview/".$data['student']->stu_email; 
                    }

                if (isset($data['client']) && is_object($data['client'])) {
                    $cpp_url = URLROOT . "/pages/cprofileview/".$data['client']->client_email; 
                    }
 


                if ($_SESSION['role'] == "Student")
                {

                    if ($url == $e_url) 
                    {
                        require 'edit_profile.php'; //student edit profile
                    }
                    else if($url == $c_url)
                    {
                        require 'clientlist.php';
                    }
                    else if($url == $sp_url)
                    {
                        require 'studentprofile.php'; //student profile (self view)
                    } 
                    else if($url == $cpp_url)
                    {
                       require 'cprofileview.php'; //view client profile
                    }
                }

                elseif ($_SESSION['role'] == "Client")
                {
                    if($url == $ec_url) 
                    {
                        require 'edit_client_profile.php';
                    }
                    elseif($url == $p_url)
                    {
                        require 'studentlist.php';
                    }
                    else if($url == $cp_url)
                    {
                         require 'clientprofile.php'; //client profile (self view)
                    }
                    else if($url == $spp_url)
                    {
                        require 'profileview.php';//view student profile
                    }

                }
                elseif ($_SESSION['role'] == "Admin")
                {
                    if($url == $p_url)
                    {
                        require 'studentlist.php';
                    }
                    else if($url == $spp_url)
                    {
                        require 'profileview.php';//view srudent profile
                    }
                }
                    ?>

                    
        <!--End of Content area here-->
        

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


