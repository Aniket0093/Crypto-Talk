<?php
require_once ("functions.inc.php");
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_GET['code']))
    {
            $code = $_GET['code'];
            $post = http_build_query(array(
                'client_id' => 'efd986ccb7b5095e4186',
                //'redirect_url' => 'http://http://localhost/odUCSF2K19A3/git_login.php',
                    'redirect_url' => 'http://chandakaniket.cs518.cs.odu.edu/git_login.php',
                'client_secret' => 'e4aa3782899ef85d7e36dd305371a8cb7c0edcde',
                'code' => $code,
            ));
            $context = stream_context_create(
                array(
                    "http" => array(
                        "method" => "POST",
                        'header'=> "Content-type: application/x-www-form-urlencoded\r\n" .
                                    "Content-Length: ". strlen($post) . "\r\n".
                                    "Accept: application/json" ,  
                        "content" => $post,
                    )
                )
            );
            $json_data = file_get_contents("https://github.com/login/oauth/access_token", false, $context);
            //echo $json_data; 
            $r = json_decode($json_data , true);
            $access_token = $r['access_token'];
            $scope = $r['scope']; 
            $url = "https://api.github.com/user?access_token=".$access_token."";
            $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
            $context  = stream_context_create($options);
            $data = file_get_contents($url, false, $context); 
            $user_data  = json_decode($data, true);
            $username = $user_data['login'];
            $fullname = $user_data['name'];
            $profile_pic=$user_data['avatar_url'];
            /*- Get User e-mail Details -*/                
            $url = "https://api.github.com/user/emails?access_token=".$access_token."";
            $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
            $context  = stream_context_create($options);
            $emails =  file_get_contents($url, false, $context);
            $email_data = json_decode($emails, true);
            $email_id = $email_data[0]['email'];
            $email_primary = $email_data[0]['primary'];
            $email_verified = $email_data[0]['verified'];
    
            git_login($username,$email_id,$profile_pic);
     }
    
 ?>   