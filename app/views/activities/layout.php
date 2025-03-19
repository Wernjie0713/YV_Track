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

                    $c_url = URLROOT . "/activities"; 
                    $t_url = URLROOT . "/activities/create"; 
                    $v_url = URLROOT . "/activities/view_act";
                    $u_url = '';
                    $r_url = ''; 
                    $vp_url = URLROOT . "/activities/view_past"; //s
                    $f_url = ''; 
                    $vf_url = ''; 
                    $p_url = '';
                

                

                    if (isset($data['activity']) && is_object($data['activity'])) {
                    $u_url = URLROOT . "/activities/update/".$data['activity']->act_id; 
                    }

                    if (isset($data['activity']) && is_object($data['activity'])) {
                        $r_url = URLROOT . "/activities/activity_registration/".$data['activity']->act_id; 
                    }  
                    if (isset($data['activity']) && is_object($data['activity'])) {
                        $f_url = URLROOT . "/activities/feedback/".$data['activity']->act_id; 
                    } 
                    if (isset($data['activity']) && is_object($data['activity'])) {
                        $vf_url = URLROOT . "/activities/viewfeedback/".$data['activity']->act_id; 
                    }
                    if (isset($data['activity']) && is_object($data['activity'])) {
                        $p_url = URLROOT . "/activities/viewparticipant/".$data['activity']->act_id; 
                    }

                   
                    
                    if ($_SESSION['role'] == "Client"){
                        if ($url == $c_url) 
                        {
                            require 'manage.php';
                        }
                        elseif($url == $t_url)
                        {
                            require 'create.php';
                        }
                        elseif($url == $u_url)
                        {
                            require 'update.php';
                        }
                        elseif($url == $vf_url)
                        {
                            require 'viewfeedback.php';
                        }
                        elseif($url == $p_url){
                            require 'viewparticipant.php';
                        }
                        
    
                    }
                    if ($_SESSION['role'] == "Admin"){
                        if ($url == $c_url) 
                        {
                            require 'manage.php';
                        }
                        elseif($url == $t_url)
                        {
                            require 'create.php';
                        }
                        elseif($url == $u_url)
                        {
                            require 'update.php';
                        }
                        elseif($url == $vf_url)
                        {
                            require 'viewfeedback.php';
                        }
                        elseif($url == $p_url){
                            require 'viewparticipant.php';
                        }
                        
    
                    }
                    if ($_SESSION['role'] == "Student")
                    {
                        if($url == $v_url)
                        {
                            require 'view_act.php';
                        }
                        elseif($url == $r_url)
                        {
                            require 'activity_registration.php';
                        }
                        elseif($url == $vp_url)
                        {
                            require 'view_past.php';
                        }
                        elseif($url == $f_url)
                        {
                            require 'feedback.php';
                        }
                        

                    }
                    
                    
                   
                    ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->

</div>
<!--end::Content-->


