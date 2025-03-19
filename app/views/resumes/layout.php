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

                    $c_url = URLROOT . "/resumes";
                    $d_url = URLROOT . "/resumes/resumelist";

                    $u_url='';
                    
                    if (isset($data['students']) && is_object($data['students'])) {
                        $u_url = URLROOT . "/resumes/update/". $data['students']->stu_id;
                        $u2_url = URLROOT . "/resumes/adminstudentresume/". $data['students']->stu_id;
                        $u3_url = URLROOT . "/resumes/adminupdate/". $data['students']->stu_id;
                    }

                    //error_reporting(0);
                    if ($url == $c_url)
                    {
                        require 'resume.php';
                    }
                    elseif($url == $u_url)
                    {
                        require 'update.php';
                    }
                    elseif($url == $d_url)
                    {
                        require 'resumelist.php';
                    }
                    elseif($url == $u2_url)
                    {
                        require 'adminstudentresume.php';
                    }
                    elseif($url == $u3_url)
                    {
                        require 'adminupdate.php';
                    }

                    ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->

</div>
<!--end::Content-->


