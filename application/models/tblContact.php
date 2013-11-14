<?php

class Models_tblContact extends Libs_Model {

    public function __construct() {
        parent::__construct();
    }

    private $con_id;
    private $full_name;
    private $email;
    private $content;
    private $post_date;

    /**
     * contact id
     */
    public function setConId($con_id) {
        $this->con_id = $con_id;
    }

    public function getConId() {
        return $this->con_id;
    }

    /**
     * contact full name
     */
    public function setFullName($full_name) {
        $this->full_name = $full_name;
    }

    public function getFullName() {
        return $this->full_name;
    }

    /**
     * contact email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    /**
     * contact content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    /**
     * contact postdate
     */
    public function setPostDate($post_date) {
        $this->post_date = $post_date;
    }

    public function getPostDate() {
        return $this->post_date;
    }

}