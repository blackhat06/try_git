<?php
// DKIM sign
require_once('class.phpmailer.php');
//require_once 'class.amazonses.php';

$service =$argv[1];
$computer =$argv[2];
$status =$argv[3];
$time1 =$argv[4]; 

// Set mailer to use AmazonSES.;
$mail= new phpmailer ;

// Set AWSAccessKeyId and AWSSecretKey provided by amazon.
$mail->IsAmazonSES();
$mail->AddAmazonSESKey('AKIAJB3LQZB6PTF3KMJQ','svDQ8E3zJCfDO8uPTj0L2TLHYcxOZFpIvGs27IXl');

// "From" must be a verified address.
$mail->From = 'care@dialhealth.com';
$mail->FromName = 'vikas';
$mail->AddAddress('vikasruhil06@gmail.com','vikasruhil');
$mail->Subject = 'Service '.$service.' is '. $status;
$mail->Body = 'Service '.$service.' on System '.$computer.' is '.$status.' at '. $time1 ; 
$mail->Send(); // send message

//--- The part below sends sms.
	
	$request="";
	$param['method']='sendMessage';
        $param['send_to'] = 9220475321;
        $param['msg'] ='Service '.$service.' on System '.$computer.' is '.$status.' at '. $time1 ;        
        $param['userid'] = "2000101951";
        $param['password'] = "7SGCBFOGd";
        $param['v'] = "1.1";
        $param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
        $param['auth_scheme'] = "PLAIN";
        //Have to URL encode the values
        foreach($param as $key=>$val) {
        $request .= $key ."=". urlencode($val);
        //we have to urlencode the values
        $request.= "&";
        //append the ampersand (&) sign after each
        //parameter/value pair
        }
        $request = substr($request, 0, strlen($request)-1);
        //remove final (&) sign from the request
        $url ="http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
	print_r($curl_scraped_page);
        curl_close($ch);
    ?>
