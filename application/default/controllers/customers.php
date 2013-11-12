<?php
include("/phpmailer/class.phpmailer.php");
class Default_Controllers_Customers extends Libs_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $flag= FALSE;
        if(isset($_POST["btnLogin"])){
            $email= $_POST['txtUser'];
            $pass= $_POST["txtPass"];
            $model= new Default_Models_tblCustomers();
            if($model->checkLogin($email, $pass)){

            }
        }
        $this->view->render('customers/index');
    }

    public function register(){
        $this->view->render('customers/register');
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
            $cus->setPassword($_POST['password']);
            $cus->setPhone($_POST['phone']); 
            $cus->setAddress($_POST['address']);

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

                $mail->SetFrom("hunglk.smartosc@gmail.com","LE KHAC HUNG");
                $mail->AddAddress($email, "MAIL ACTIVE");
                $mail->AddReplyTo("hunglk.smartosc@gmail.com","LE KHAC HUNG");

                $mail->Subject    = "Shop Flowers Online ";
                $mail->CharSet = "utf-8";
                $body = "
                    Email này được gửi từ Shop Online Flowers vì có thể bạn đã đăng ký thành viên. \n 
                    Hãy click vào link sau để kích hoạt tài khoản hoặc bạn có thể copy link rồi paste vào trình duyệt. \n                   
                    ".URL_BASE."/customers/active?email=$email&resetkey=$resetkey \n

                    Nếu đó thật sự là yêu cầu của bạn!";

                $mail->Body = $body;

                if(!$mail->Send()) 
                    $msg = "Không gửi được mail !";

            //END
            $cus->insertCus($cus);    
            header("location: index");
        }

        //$this->view->render('customers/register');
    }
}
?>
