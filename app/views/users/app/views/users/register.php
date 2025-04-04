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
    <title>Youth Venture - Sign Up</title>
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
   
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
    

    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <!--begin::Form-->  
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form id="register-form" action="<?php echo URLROOT; ?>/users/register" method ="POST">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 style="color:#7c1c2b">Sign Up</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div style="color:#7c1c2b">YV Track</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Username-->
                                <input type="text" placeholder="Username*" name="username"
                                    class="form-control bg-transparent" />
                                    <?php if($data['usernameError']!=""){?>
                                        <span class="badge badge-danger"><?php echo $data['usernameError']; ?></span>
									<?php }?>
                                 <!--end::Username-->
                            </div>
                            <!--end::Input group=-->

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Email*" name="email"
                                    class="form-control bg-transparent" />
                                    <?php if($data['emailError']!=""){?>
                                        <span class="badge badge-danger"><?php echo $data['emailError']; ?></span>
									<?php }?>
                                 <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            
                            <div class="fv-row mb-8">
                                <!--begin::Role-->
                                <select class="form-select" aria-label="Default select example" name="role" required>
                                    <option disabled selected hidden>Please select:</option>
                                    <option value="Student">Student</option>
                                    <option value="Client">Client</option>
                                </select>
                                <?php if($data['roleError']!=""){?>
                                        <span class="badge badge-danger"><?php echo $data['roleError']; ?></span>
									<?php }?>
                                <!--end::Role-->
                            </div>

                            <div class="fv-row mb-8">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password*" name="password"
                                    class="form-control bg-transparent" />
                                    <?php if($data['passwordError']!=""){?>
                                        <span class="badge badge-danger"><?php echo $data['passwordError']; ?></span>
									<?php }?>
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            
                             <div class="fv-row mb-8">
                                <!--begin:: Confirm Password-->
                                <input type="password" placeholder="Confirm Password*" name="confirmPassword"
                                    class="form-control bg-transparent" />
                                    <?php if($data['confirmPasswordError']!=""){?>
                                        <span class="badge badge-danger"><?php echo $data['confirmPasswordError']; ?></span>
									<?php }?>
                                <!--end::Confirm Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-danger" style="background-color: #7C1C2B;">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign Up</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign in-->
                            <div class="text-gray-500 text-center fw-semibold fs-6">Have an account?
                                    <a href="<?php echo URLROOT; ?>/users/login" class="link-primary">Sign in</a>
                                </div>
                                <!--end::Sign in-->
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
<!--end::Authentication - Sign-up--></div>
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
    <script src="<?php echo URLROOT ?>/public/assets/js/custom/authentication/sign-up/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>