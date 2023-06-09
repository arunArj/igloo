<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomHashing
{
    private $CI;
    private $secret;
    public function __construct()
    {   
        $this->ci =& get_instance();
        $this->ci->load->library('email'); 
         $this->ci->load->library('session');
       // $this->secret = ;

    }
    
    public function hashData($str){
        if($str)
         return hash_hmac('sha256', $str, $this->secret);
        return false;

    }

}