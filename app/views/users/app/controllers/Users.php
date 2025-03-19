<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'reg_code' => '',
            'role' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'roleError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'role' => trim($_POST['role']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

            //validate role
            if (empty($data['role'])) {
                $data['roleError'] = "Please select your role.";
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => '',
            ];

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter a email.';
            }
            

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['role'] = $user->role;

        $this->userModel->setPfp();


        header('location:' . URLROOT . '/dashboards/index');
    }

    public function reset_password()
    {

        $data = [

            'email' => '',
            'emailError' => '',
            'emailSuccess' => ''
        ];

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open

            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "sandkas.com/threeplusone/users/create_new_password/?selector=" . $selector . "&validator=" . bin2hex($token);

            date_default_timezone_set("Asia/Taipei");

            $expires = date("U") + 1800;

            $hashed_token = password_hash($token, PASSWORD_DEFAULT);

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'pwdResetSelector' => $selector,
                'pwdResetToken' => $hashed_token,
                'pwdResetExpires' => $expires,
                'emailError' => '',
                'emailSuccess' => ''
            ];

            //validate email
            if (empty($data['email'])) {
                $data['emailError'] = "Please enter an email.";
            } else {
                // check if email exists
                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = "No account registered under this email.";
                } elseif ($data['email']) {
                    $delete_Reset_Email = $this->userModel->deleteResetEmail($data['email']);

                    if ($delete_Reset_Email) {

                        $this->userModel->createResetEmail($data);


                        $to = $data['email'];

                        $subject = "Reset your password for YT Track";

                        $message = '<p>We received a password reset request. Here is your password reset link:';
                        $message .= '<a href="' . $url . '">' . $url . '</a></p>';

                        $headers = "From: YT Track <yongwernjie.2003@gmail.com>\r\n";
                        $headers .= "Reply-To: yongwernjie.2003@gmail.com\r\n";
                        $headers .= "Content-type: text/html\r\n";

                        mail($to, $subject, $message, $headers);
                        
                        $data['emailSuccess'] = 'We have sent the reset password link to your email. 
                        Please check your email. If you have not receive any email, please wait around 2 ~ 10 minutes or check your spam box.
                        Please request for new password again if you did not received any email after 10 minutes. Thank You.';

                        $this->view('users/reset_password', $data);
                    } else {
                        $data['emailError'] = 'Password or email is incorrect. Please try again.';

                        $this->view('users/reset_password', $data);
                    }
                }
            }
        } else { //if server request closed
            $data = [

                'email' => '',
                'emailError' => '',
                'emailSuccess' => ''
            ];
        }

        $this->view('users/reset_password', $data);
    }

    public function create_new_password()
    {

        $data = [

            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'selector' => trim($_POST['selector']),
            'validator' => trim($_POST['validator']),
            'passwordError' => '',
            'confirmPasswordError' => ''

        ];

        $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

        //check for post from form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if server request open
            unset($_SESSION['passwordError']);
            unset($_SESSION['confirmPasswordError']);
    

            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'selector' => trim($_POST['selector']),
                'validator' => trim($_POST['validator']),
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            //validate password on length and numeric values
            if (empty($data['password'])) {
                $_SESSION['passwordError'] = "Please enter password";
                header('location:' . $_SESSION['url_token']);
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $_SESSION['passwordError'] = "Password must have at least one numeric value";
                header('location:' . $_SESSION['url_token']);
            }

            //validate confirm password
            if (empty($data['confirmPassword'])) {
                $_SESSION['confirmPasswordError']= "Please enter password";
                header('location:' . $_SESSION['url_token']);
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $_SESSION['confirmPasswordError'] = "Password do not match, please try again.";
                    header('location:' . $_SESSION['url_token']);
                }
            }

            //make sure that errors are empty
            if (empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                //validate email
                if (empty($data['selector'])) {
                    $data['tokenError'] = "You need to re-submit your reset password request.";
                } else {
                    // check if token if exists
                    date_default_timezone_set("Asia/Taipei");

                    $findToken = $this->userModel->findEmailByToken($data['selector']);

                    if ($findToken) {

                        $tokenEmail = $findToken->pwdResetEmail;
                        $pwdResetToken = $findToken->pwdResetToken;

                        $tokenBin = hex2bin($data['validator']);
                        $tokenCheck = password_verify($tokenBin, $pwdResetToken);

                        if ($tokenCheck === true) {
                            $checkEmail = $this->userModel->checkEmailByToken($tokenEmail);

                            if ($checkEmail) {

                                $data = [
                                    'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                                    'confirmPassword' => trim($_POST['confirmPassword']),
                                    'selector' => trim($_POST['selector']),
                                    'validator' => trim($_POST['validator']),
                                    'email' => $tokenEmail,
                                    'passwordError' => '',
                                    'confirmPasswordError' => ''
                                ];

                                $this->userModel->updatePassword($data);

                                $data['tokenSuccess'] = "Your password has been changed";

                                $this->view('users/create_new_password', $data);
                            } else {
                                $data['tokenError'] = "No email associate with this token.";

                                $this->view('users/create_new_password', $data);
                            }
                        } else {

                            $data['tokenError'] = "Token is not valid. Please request for new password again.";
                        }
                    } else {
                        $data['tokenError'] = 'Your token or link may have been already expired.';

                        $this->view('users/create_new_password', $data);
                    }
                }
            }
        } else { //if server request closed
            $data = [

                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'selector' => trim($_POST['selector']),
                'validator' => trim($_POST['validator']),
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
        }

      
        $this->view('users/create_new_password', $data);
        
    }
    
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        unset($_SESSION['pfp']);
        header('location:' . URLROOT . '/users/login');
    }
}
