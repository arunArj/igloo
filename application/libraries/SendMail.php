<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail
{
    private $CI;
    private $send_otp_message;
    private $welcome_message; 
    public function __construct()
    {   
        $this->ci =& get_instance();
        $this->ci->load->library('email'); // Load the email library
         $this->ci->load->library('session');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'info@kreataglobal.com';
        $config['smtp_pass'] = 'd&&@3My!zf7b';
        $config['smtp_port'] = 465;
        
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['noreply_email'] = 'noreply@example.com';

        $this->ci->load->library('email',$config);
       // $this->ci->email->initialize($config);
        $this->ci->email->set_newline("\r\n"); 
    }

    public function send_registration_email($name ,$mail,$otp)
    {
        
        $message ='<!DOCTYPE html>
            <html>
            <head>
                <title>The fun has started with Igloo and Quanta</title>
            </head>
            <body>
                <div style="background-color: #f2f2f2; padding: 20px; text-align: center;">
                    <h2 style="color: #333;">The fun has started with Igloo and Quanta ☀️</h2>
                    <h4 style="color: #333;">OTP verification</h4>
                    <p style="font-size: 16px;">Dear '.$name.',</p>
                    <p style="font-size: 16px;">Your One-Time Password (OTP) for Scan For Fun: '. $otp.'</p>
                    <p style="font-size: 16px;">Please use this One-Time Password (OTP) to verify your account.</p>
                    <p style="font-size: 16px;">Keep scanning and keep collecting points!</p>
                </div>
            </body>
            </html>';
        $this->ci->email->set_mailtype("html");
        //$this->ci->email->set_header('Content-Type', 'text/html');
       // $this->ci->email->from('info@kreataglobal.com', 'IglooQuanta');
        $this->ci->email->from('noreply@example.com', 'No Reply');
        $this->ci->email->to($mail);
        $this->ci->email->subject('Igloo & Quanta Scan for Fun 2023  – Email verification');
        $this->ci->email->message($message);
        
        if ($this->ci->email->send()) {
            // Email sent successfully
            return true;
        } else {
              //$error_message = $this->ci->email->print_debugger();
             //echo $error_message;
             return false;
        }
        
    }
    public function welcome_email($name,$mail,$pass)
    {
        $message ='<!DOCTYPE html>
            <html>
            <head>
                <title>Here begins your ‘Scan for Fun’ journey</title>
            </head>
            <body>
                <div style="background-color: #f2f2f2; padding: 20px; text-align: center;">
                    <h2 style="color: #333;">Here begins your ‘Scan for Fun’ journey ☀️</h2>
                    <p style="font-size: 16px;">Dear '.$name.',</p>
                    <p style="font-size: 16px;">We have added your points successfully.</p>
                    <p style="font-size: 16px;">Earn more points and you could redeem it for an iPhone, Playstation 5 or Airpod.</p>
                    <p style="font-size: 16px;">Please log into your account using the below username and password to view your points.</p>
                    <p style="font-size: 16px;">User Name: '. $mail.'</p>
                    <p style="font-size: 16px;">Password: '. $pass.'</p>
                    <p style="font-size: 16px;"><a href="https://kgapps.in/web-projects/2023/iglooquanta/login"><button>Vew Point</button></a></p>

                </div>
            </body>
            </html>';

        $this->ci->email->set_mailtype("html");
         $this->ci->email->from('noreply@example.com', 'No Reply');
        $this->ci->email->to($mail);
        $this->ci->email->subject('Igloo & Quanta Scan for Fun 2023 – Thank you for registering with us!');
        $this->ci->email->message($message);

        if ($this->ci->email->send()) {
            // Email sent successfully
            return true;
        } else {
              //$error_message = $this->ci->email->print_debugger();
             //echo $error_message;
             return false;
        }
    }
    public function success_email($mail,$point)
    {
        
        $message ='<!DOCTYPE html>
            <html>
            <head>
                <title>The fun has started with Igloo and Quanta</title>
            </head>
            <body>
                <div style="background-color: #f2f2f2; padding: 20px; text-align: center;">
                    <h2 style="color: #333;">The fun has started with Igloo and Quanta ☀️</h2>
                    <h3 style="color: #333;">Congratulations!</h3>
                    <h3 style="color: #333;">You have won</h3>
                    <h2 style="color: #333;">Point : '.$point.'</h2>
                    <p style="font-size: 16px;">Enter the login details you received in your email to</p>
                    <p style="font-size: 16px;">check your points and add more points using another code.</p>
                </div>
            </body>
            </html>';
        $this->ci->email->set_mailtype("html");
        //$this->ci->email->set_header('Content-Type', 'text/html');
       // $this->ci->email->from('info@kreataglobal.com', 'IglooQuanta');
        $this->ci->email->from('noreply@example.com', 'No Reply');
        $this->ci->email->to($mail);
        $this->ci->email->subject('Igloo & Quanta Scan for Fun 2023  – Email verification');
        $this->ci->email->message($message);
        
        if ($this->ci->email->send()) {
            return true;
        } else {
              
             return false;
        }
        
    }
    
    
    public function prizeclaim($name,$email,$image,$prize){

        $message ='<!DOCTYPE html>
                    <html>
                    
                    <head>
                      <meta charset="UTF-8">
                      <title>Congratulations!</title>
                      <style>
                        /* Internal CSS */
                        body {
                          font-family: Arial, sans-serif;
                          background-color: #f2f2f2;
                          margin: 0;
                          padding: 0;
                        }
                    
                        .container {
                          max-width: 600px;
                          margin: 0 auto;
                          padding: 20px;
                        }
                    
                        .header {
                          text-align: center;
                          margin-bottom: 30px;
                        }
                    
                        .content {
                          background-color: #ffffff;
                          padding: 40px;
                        }
                    
                        .message {
                          margin-bottom: 30px;
                          font-size: 18px;
                        }
                    
                        .prize-image {
                          text-align: center;
                        }
                    
                        .prize-image img {
                          max-width: 100%;
                          height: auto;
                        }
                    
                        .footer {
                          text-align: center;
                          margin-top: 30px;
                          font-size: 14px;
                        }
                      </style>
                    </head>
                    
                    <body>
                      <div class="container">
                        <div class="header">
                          <h1>Congratulations!</h1>
                        </div>
                        <div class="content">
                          <p class="message">Dear '.$name.',</p>
                          <p class="message">Congratulations! You have won the contest for '.$prize.'.</p>
                          <div class="prize-image">
                          
                            <img src="'.base_url().$image.'" alt="Prize Image">
                          </div>
                          <p class="message">We will contact you shortly.</p>
                        </div>
                        <div class="footer">
                          <p>Thank you,</p>
                          <p>IqlooQuanta team</p>
                        </div>
                      </div>
                    </body>
                    
                    </html>
                    ';

        $this->ci->email->set_mailtype("html");
        $this->ci->email->from('noreply@example.com', 'No Reply');
        $this->ci->email->to($email);
        $this->ci->email->subject('Welcome to Iqloo Quanta');
        $this->ci->email->message($message);

        if ($this->ci->email->send()) {
            // Email sent successfully
            return true;
        } else {
              //$error_message = $this->ci->email->print_debugger();
             //echo $error_message;
             return false;
        } 
    }
}
