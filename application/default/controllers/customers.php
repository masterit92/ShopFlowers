<?php
include("/phpmailer/class.phpmailer.php");
class Default_Controllers_Customers extends Libs_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        if(isset($_SESSION['user'])){
            $this->view->render('index/index');
        }     
        $this->view->render('customers/index');
    }

    public function postLogin(){
        $flag= FALSE;
        $email= $_POST['email'];
        $pass = md5( $_POST["password"] );
        $model= new Default_Models_tblCustomers();
        $cus = $model->checkLogin($email, $pass);
            if( isset($cus) ){  
                $_SESSION['user'] = $cus->getEmail();
                $_SESSION['fullname']= $cus->getFirstName().' '.$cus->getLastName();
                header("location:".URL_BASE);
            }else{
                $this->view->msg = "Email or Password not match. Please try again!";
                $this->view->render('customers/index');
            }      
    }    

    public function register(){
        if(isset($_SESSION['user'])){
            $this->view->render('index/index');
        }
        $this->view->render('customers/register');
    }

    public function postRegister(){
        $cus = new Models_tblCustomers();
        $email = $_POST['email'];
        if($cus->getCusByEmail($email) ){
            $this->view->msg = "Sorry, the email $email is taken.";
            $this->view->render('customers/register');
        }else{
            $cus->setFirstName($_POST['first_name']);
            $cus->setLastName($_POST['last_name']);
            $cus->setEmail($_POST['email']);
            $cus->setPassword(md5( $_POST['password'] ));
            $cus->setPhone($_POST['phone']); 
            $cus->setAddress($_POST['address']);

            $dt = new DateTime();
            $cus->setPostDate($dt->format('Y-m-d H:i:s'));

            $today = date("F j, Y, g:i a"); 
            $rk = $email.$today;
            $resetkey = md5($rk);
            $cus->setResetkey($resetkey);
            //SEND MAIL
                $mail = new PHPMailer();
                $mail->IsSMTP();                                                                                            
                $mail->SMTPAuth   = true;                  
                $mail->SMTPSecure = "ssl";
                $mail->Host       = "smtp.gmail.com";     
                $mail->Port       = 465;                     
                $mail->Username   = "hunglk.smartosc@gmail.com"; 
                $mail->Password   = "lekhachung87";            

                $mail->SetFrom("hunglk.smartosc@gmail.com","Shop Flowers Online");
                $mail->AddAddress($email, "MAIL ACTIVE");
                $mail->AddReplyTo("hunglk.smartosc@gmail.com","Shop Flowers Online");

                $mail->Subject    = "Shop Flowers Online ";
                $mail->CharSet = "utf-8";
                $body = "
                    Email này được gửi từ Shop Online Flowers vì có thể bạn đã đăng ký thành viên. \n 
                    Hãy click vào link sau để kích hoạt tài khoản hoặc bạn có thể copy link rồi paste vào trình duyệt. \n                   
                    ".URL_BASE."/customers/active?email=$email&resetkey=$resetkey \n

                    Nếu đó thật sự là yêu cầu của bạn!";

                $mail->Body = $body;

                if(!$mail->Send()){ 
                    $this->view->msg = "Send mail error!";
                    $this->view->render('customers/register');
                }else{
                   $cus->insertCus($cus);
                    $this->view->msg = "Register successful! Please login now."; 
                    $this->view->render('customers/index');
                }    
            //END
                
            
        }
        //$this->view->render('customers/register');
    }

    public function changePass(){     
        $this->view->render('customers/changePass');
    }
    public function postChangePass(){
        $email = $_SESSION['user'];
        $model = new Default_Models_tblCustomers();
        $old_pass = md5( $_POST['old_pass'] );
        $new_pass = md5( $_POST['new_pass'] );
        if($model->getCusByEmail($email)->getPassword() === $old_pass){
            $model->updateCusByEmail($new_pass,$email);
            $this->view->msg = "Change password successful.";
        }else{
            $this->view->msg = "Old password not match.";
        }

        $this->view->render('customers/changePass');
    }

    public function forgotPass(){   
        $this->view->render('customers/forgotPass');
    }

    public function postForgotPass(){     
        $cus = new Default_Models_tblCustomers();
        $email = $_POST['email'];
        if(!$cus->getCusByEmail($email) ){
            $this->view->msg = "Sorry, the email $email not exit.";
            $this->view->render('customers/forgotPass');
        }else{
            $md5_hash = md5(rand(0, 999));
            $new_pass = substr($md5_hash, 15, 7);
            $security_code = md5(substr($md5_hash, 15, 7));

            //SEND MAIL
                $mail = new PHPMailer();
                $mail->IsSMTP();                                                                                            
                $mail->SMTPAuth   = true;                  
                $mail->SMTPSecure = "ssl";
                $mail->Host       = "smtp.gmail.com";     
                $mail->Port       = 465;                     
                $mail->Username   = "hunglk.smartosc@gmail.com"; 
                $mail->Password   = "lekhachung87";            

                $mail->SetFrom("hunglk.smartosc@gmail.com","Shop Flowers Online");
                $mail->AddAddress($email, "Forgot Password");
                $mail->AddReplyTo("hunglk.smartosc@gmail.com","Shop Flowers Online");

                $mail->Subject    = "Shop Flowers Online ";
                $mail->CharSet = "utf-8";
                $body = "Your password is: $new_pass ";

                $mail->Body = $body;

                if(!$mail->Send()){ 
                    $this->view->msg = "Send mail error!";
                }else{
                    $cus->updateCusByEmail($security_code,$email);
                    $this->view->msg = "Password has been sent!";
                }    
            //END
        }
        header("location: customers/forgotPass");
    }

    public function changeProfile(){     
        $email = $_SESSION['user'];
        $model = new Default_Models_tblCustomers();
        $cus = $model->getCusByEmail($email);

        $this->view->cus = $cus;
        $this->view->render('customers/changeProfile');
    }

    public function postChangeProfile(){ 
        $model = new Default_Models_tblCustomers();

        $email = $_SESSION['user'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $pwd = $_POST['pwd'];

        if( empty($_POST['password']) ) {
            $password = $_POST['pwd'];
        }else{
            $password = md5( $_POST['password'] );
        }

        if( $model->updateCusProfile($first_name,$last_name,$phone,$address,$password,$email) ){
            $this->view->msg = "Change profile successful.";
        }else{
            $this->view->msg = "Error!";
        }

        $cus = $model->getCusByEmail($email);

        $this->view->cus = $cus;
        $this->view->render('customers/changeProfile');
    }

    public function active(){
        $email = $_GET['email'];
        $resetkey = $_GET['resetkey'];

        $cus = new Models_tblCustomers();
        $cusEmail = $cus->getCusByEmail($email);

        $cus->setCusId($cusEmail->getCusId());
        $cus->setFirstName($cusEmail->getFirstName());
        $cus->setLastName($cusEmail->getLastName());
        $cus->setEmail($cusEmail->getEmail());
        $cus->setPassword($cusEmail->getPassword());
        $cus->setPhone($cusEmail->getPhone());
        $cus->setAddress($cusEmail->getAddress());
        $cus->setActive("1");
        $cus->setResetkey("");

        if($cusEmail->getResetkey() === $resetkey){
            $cus->updateCus($cus,$email);
            $this->view->msg = "Active success!";
        }else{
            $this->view->msg = "Active Error!";
        }

        $this->view->render('customers/active');
    }

    public function logout() {
        session_destroy();
        session_unset();

        $this->view->render('customers/logout');
    }
}
?>
