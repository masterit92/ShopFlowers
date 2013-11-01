<?php
class Models_tblCustomers extends Libs_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $cus_id;
    private $title;
    private $email;
    private $password;
    private $phone;
    private $address;
    private $gender;
    private $avatar;
    private $post_date;
    private $first_name;
    private $last_name;
    private $dob;

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $cus_id
     */
    public function setCusId($cus_id)
    {
        $this->cus_id = $cus_id;
    }

    /**
     * @return mixed
     */
    public function getCusId()
    {
        return $this->cus_id;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $post_date
     */
    public function setPostDate($post_date)
    {
        $this->post_date = $post_date;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setCustomerValue($row, $isKey=FALSE)
    {
        $cus = new  Models_tblCustomers();
        if($isKey){
            $cus->setCusId($row['cus_id']);
        }
        $cus->setPhone($row['phone']);
        $cus->setEmail($row['email']);
        $cus->setAddress($row['address']);
        $cus->setAvatar($row['avatar']);
        $cus->setFirstName($row['first_name']);
        $cus->setLastName($row['last_name']);
        $cus->setPostDate($row['post_date']);
        $cus->setGender($row['gender']);
        $cus->setPassword($row['password']);
        $cus->setTitle($row['title']);
        $cus->setDob($row['dob']);
        return $cus;
    }

    public function getColumnAndValue(Models_tblCustomers $cus, $isKey)
    {
        $arr_data= array();
        if($isKey){
            $arr_data['cus_id']= $cus->getCusId();
        }
        $arr_data['email']= $cus->getEmail();
        $arr_data['password']= $cus->getPassword();
        $arr_data['phone']= $cus->getPhone();
        $arr_data['address']=$cus->getAddress();
        $arr_data['first_name']= $cus->getFirstName();
        $arr_data['last_name']= $cus->getLastName();
        $arr_data['gender']=$cus->getGender();
        $arr_data['title']=$cus->getTitle();
        $arr_data['dob']= $cus->getDob();
        $arr_data['post_date']= $cus->getPostDate();
        $arr_data['avatar']= $cus->getAvatar();
        return $arr_data;
    }
}