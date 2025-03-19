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
                 
                 $h_url = URLROOT .  "/dashboards/index"; //home_url
                 if (isset($data['client']) && is_object($data['client'])) {
                    $cpp_url = URLROOT . "/dashboards/cprofileview/".$data['client']->client_email; 
                    }
 
                    
                //Decide which dashboard to be used based on the role
                if ($url == $h_url) {   
                    if($_SESSION['role'] == "Student")
                        require 'dashboard_student.php';
                    else if($_SESSION['role'] == "Client")
                        require 'dashboard_client.php';
                    else if($_SESSION['role'] == "Admin")
                        require 'dashboard_admin.php';
                }
                if ($url == $cpp_url)
                {
                    require 'cprofileview.php';
                }

                
                    ?>

                    
        <!--End of Content area here-->
        

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


