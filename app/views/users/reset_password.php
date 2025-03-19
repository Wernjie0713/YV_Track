<!DOCTYPE html>
<style>
     body {
        margin: 0;
        padding: 0;
        background-image: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), url(<?php echo URLROOT ?>/public/assets/media/misc/YV_back.jpeg);
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .btn
    {
        color:#7c1c2b;
    }
</style>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>Youth Venture - Reset Password</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/assets/media/youth/logo.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?php echo URLROOT ?>/public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->
    <body id="kt_body" class="app-blank" >
    <!--begin::Theme mode setup on page load-->
    <script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
   
   
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20"style="background-image: linear-gradient(rgba(255,255,255, 1), rgba(255,255,255, 1)), url(<?php echo URLROOT ?>/public/assets/media/youth/c2.png); background-size: cover; background-position: center;" >
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <!--begin::Form-->  
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form id="kt_login_forgot_submit" action="<?php echo URLROOT; ?>/users/reset_password" method ="POST" novalidate="novalidate">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 style="color:#7c1c2b">Forgot Your Password ?</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div style="color:#7c1c2b">Enter your email to reset your password</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                         
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
                                <?php if ($data['emailError'] != "") { ?>
                                    <span class="label label-inline label-danger font-weight-bolder"><?php echo $data['emailError']; ?></span>
                                <?php } ?>
                                <?php if ($data['emailSuccess'] != "") { ?>
                                    <div class="alert alert-success" role="alert">
                                    <?php echo $data['emailSuccess']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3" style="color: #7C1C2B;">Cancel</a>
                                <button type="submit" name="reset-request" id="kt_login_forgot_submit" class="btn btn-danger font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4" style="background-color: #7C1C2B;">Search</button>
                            </div>
                            <!--end::Form group-->
                            
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->    

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Body-->
</div>
<!--end::Authentication - Sign-in--></div>
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
    var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?php echo URLROOT ?>/public/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?php echo URLROOT ?>/public/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>