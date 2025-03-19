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

                    $c_url = URLROOT . "/rewards/liststudent";
                    $d_url = URLROOT . "/rewards";
                    $t_url = URLROOT . "/rewards/create";
                    $f_url = URLROOT . "/rewards/claim";

                    if (isset($data['rewards']) && is_object($data['rewards'])) {
                        $u_url = URLROOT . "/rewards/desc_canclaim/". $data['rewards']->reward_id;
                        $u2_url = URLROOT . "/rewards/desc/". $data['rewards']->reward_id;
                        $u3_url = URLROOT . "/rewards/update/". $data['rewards']->reward_id; 
                    }

                    //error_reporting(0);
                    if ($_SESSION['role'] == "Student")
                    {
                        if ($url == $c_url)
                        {
                            require 'liststudent.php';
                        }
                        elseif($url == $u_url)
                        {
                            require 'desc_canclaim.php';
                        }
                        elseif($url == $u2_url)
                        {
                            require 'desc.php';
                        }
                    }
                    elseif ($_SESSION['role'] == "Admin")
                    {
                        if ($url == $d_url)
                        {
                            require 'list.php';
                        }
                        elseif($url == $t_url)
                        {
                            require 'create.php';
                        }
                        elseif($url == $u2_url)
                        {
                            require 'descadmin.php';
                        }
                        elseif($url == $u3_url)
                        {
                            require 'update.php';
                        }
                    }

                    ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->

</div>
<!--end::Content-->


