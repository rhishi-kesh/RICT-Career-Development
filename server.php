<?php
    session_start();
    //database connection
	  $conn = mysqli_connect('localhost', 'root', '', 'rictjob_potal');

    $jobitle = mysqli_real_escape_string($conn, $_POST['post_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $uni_ins_name = mysqli_real_escape_string($conn, $_POST['uni_ins_name']);
    $sub_dep_name = mysqli_real_escape_string($conn, $_POST['sub_dep_name']);
    $year_senmister_name = mysqli_real_escape_string($conn, $_POST['year_senmister_name']);
    $job_position = mysqli_real_escape_string($conn, $_POST['job_position']);

    $file_name=$_FILES['cv']['name'];
    $tmp_name=$_FILES['cv']['tmp_name'];

    //email exest or not
    $sql = "SELECT * FROM `applications` WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
    $if_match = mysqli_num_rows($query);

    //mail config
	include('smtp/PHPMailerAutoload.php');
	$html = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html dir='ltr' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' lang='en' style='font-family:arial, 'helvetica neue', helvetica, sans-serif'>
 <head>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1' name='viewport'>
  <meta name='x-apple-disable-message-reformatting'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta content='telephone=no' name='format-detection'>
  <title>$job_position</title>
  <link href='https://fonts.googleapis.com/css2?family=Imprima&display=swap' rel='stylesheet'>
  <style type='text/css'>
  #outlook a {
    padding:0;
  }
  .es-button {
    mso-style-priority:100!important;
    text-decoration:none!important;
  }
  a[x-apple-data-detectors] {
    color:inherit!important;
    text-decoration:none!important;
    font-size:inherit!important;
    font-family:inherit!important;
    font-weight:inherit!important;
    line-height:inherit!important;
  }
  .es-desk-hidden {
    display:none;
    float:left;
    overflow:hidden;
    width:0;
    max-height:0;
    line-height:0;
    mso-hide:all;
  }
  @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:30px!important; text-align:left } h2 { font-size:24px!important; text-align:left } h3 { font-size:20px!important; text-align:left } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important; text-align:left } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:24px!important; text-align:left } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:left } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:18px!important; display:block!important; border-right-width:0px!important; border-left-width:0px!important; border-top-width:15px!important; border-bottom-width:15px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
  @media screen and (max-width:384px) {.mail-message-content { width:414px!important } }
</style>
 </head>
 <body style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'>
  <div dir='ltr' class='es-wrapper-color' lang='en' style='background-color:#FFFFFF'>
   <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FFFFFF'>
     <tr>
      <td valign='top' style='padding:0;Margin:0'>
       <table cellpadding='0' cellspacing='0' class='es-footer' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
         <tr>
          <td align='center' style='padding:0;Margin:0'>
           <table bgcolor='#bcb8b1' class='es-footer-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'>
             <tr>
              <td align='left' style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px'>
               <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr>
                  <td align='center' valign='top' style='padding:0;Margin:0;width:520px'>
                   <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr>
                      <td align='center' style='padding:0;Margin:0;display:none'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
         <tr>
          <td align='center' style='padding:0;Margin:0'>
           <table bgcolor='#efefef' class='es-content-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#EFEFEF;border-radius:20px 20px 0 0;width:600px'>
             <tr>
              <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:40px;padding-right:40px'>
               <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr>
                  <td align='center' valign='top' style='padding:0;Margin:0;width:520px'>
                   <table cellpadding='0' cellspacing='0' width='100%' bgcolor='#fafafa' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#fafafa;border-radius:10px'>
                     <tr>
                      <td align='left' style='padding:20px;Margin:0'><h3 style='Margin:0;line-height:34px;mso-line-height-rule:exactly;font-family:Imprima, Arial, sans-serif;font-size:28px;font-style:normal;font-weight:bold;color:#2D3142'>Dear &nbsp;$name,</h3><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Imprima, Arial, sans-serif;line-height:27px;color:#2D3142;font-size:18px'><br>I hope this message finds you well. I am writing to inform you that your application for the $job_position has been received and is currently under review by our HR team at Rayhans ICT Ltd.!<br><br>Our dedicated HR professionals will thoroughly assess your application, taking into consideration your qualifications and experiences. If your profile aligns with the requirements of the position, we will be in touch with you to discuss the next steps in the recruitment process.<br><br>We appreciate your interest in joining our team, and we thank you for your patience during this evaluation period. Should you have any immediate questions or updates to your application, please feel free to contact our HR team at shahidul.im09@gmail.com or 01309300606.<br><br>We look forward to the possibility of working together and wish you the best of luck throughout the selection process. <br> <br>Best regards, <br> Md Shahidul Islam <br> Head of Admin & Accounts <br> Rayhans ICT Ltd</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr>
                <td><br><br></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table cellpadding='0' cellspacing='0' class='es-footer' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
         <tr>
          <td align='center' style='padding:0;Margin:0'>
           <table bgcolor='#bcb8b1' class='es-footer-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'>
             <tr>
              <td align='left' style='Margin:0;padding-left:20px;padding-right:20px;padding-bottom:30px;padding-top:40px'>
               <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr>
                  <td align='left' style='padding:0;Margin:0;width:560px'>
                   <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr>
                      <td align='center' class='es-m-txt-c' style='padding:0;Margin:0;padding-bottom:20px;font-size:0px'><img src='https://rayhansict.com/wp-content/uploads/2020/08/logo.png' alt='Logo' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;font-size:12px' title='Logo' height='60'></td>
                     </tr>
                     <tr>
                      <td align='center' class='es-m-txt-c' style='padding:0;Margin:0;padding-top:10px;padding-bottom:20px;font-size:0'>
                       <table cellpadding='0' cellspacing='0' class='es-table-not-adapt es-social' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                         <tr>
                          <td align='center' valign='top' style='padding:0;Margin:0;padding-right:5px'><a target='_blank' href='https://www.facebook.com/Rayhansict' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:14px'><img src='https://ebyhigd.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png' alt='Fb' title='Facebook' height='24' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td>
                          <td align='center' valign='top' style='padding:0;Margin:0;padding-right:5px'><a target='_blank' href='https://www.instagram.com/rayhansict/' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:14px'><img src='https://freepngimg.com/save/58409-amstel-computer-instagram-gold-icons-race-logo/560x560' alt='Ins' title='Instragram' height='24' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td>
                          <td align='center' valign='top' style='padding:0;Margin:0'><a target='_blank' href='https://bd.linkedin.com/company/rayhansict' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:14px'><img src='https://ebyhigd.stripocdn.email/content/assets/img/social-icons/logo-black/linkedin-logo-black.png' alt='In' title='Linkedin' height='24' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td>
                         </tr>
                       </table></td>
                     </tr>
                     <tr>
                      <td align='center' style='padding:0;Margin:0;padding-top:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Imprima, Arial, sans-serif;line-height:21px;color:#2D3142;font-size:14px'>Copyright &#x24B8; 2016-2024 <a href='https://rayhansict.com/' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:14px'>Rayhan's ICT Limited</a><br type='_moz'></p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table cellpadding='0' cellspacing='0' class='es-footer' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
         <tr>
          <td align='center' style='padding:0;Margin:0'>
           <table bgcolor='#ffffff' class='es-footer-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'>
             <tr>
              <td align='left' style='padding:20px;Margin:0'>
               <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr>
                  <td align='left' style='padding:0;Margin:0;width:560px'>
                   <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr>
                      <td align='center' style='padding:0;Margin:0;display:none'></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table></td>
     </tr>
   </table>
  </div>
 </body>
</html>
	";

    $send_sms_number = "88" . $number;
    function send_sms($send_sms_number, $name, $job_position) {
        $url = "https://880sms.com/smsapi";
        $data = [
          "api_key" => "C20070576581b892abb538.40220352",
          "type" => "text",
          "contacts" => "$send_sms_number",
          "senderid" => "RAYHANS ICT",
          "msg" => "Congratulations $name . You have successfully applied for $job_position . Our hr team will contact with you soon keep eyes on your phone and email.",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
      //   return $response;
      }

    if(!empty($name) && !empty($email) && !empty($age) && !empty($uni_ins_name) && !empty($year_senmister_name) && !empty($jobitle) && !empty($sub_dep_name) && !empty($file_name) && !empty($number)){
        if($if_match){
            $respons['message'] = 'Email already exists';
        }else{
            $pattern = "/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/";
            if(preg_match($pattern, $number)){
                $sql = "INSERT INTO `applications`(`job_post_id`, `name`, `number`, `email`, `age`, `uni_ins_name`, `sub_dep_name`, `year_senmister_name`, `cv`) VALUES ('$jobitle','$name','$number','$email','$age','$uni_ins_name','$sub_dep_name','$year_senmister_name','$file_name')";
                $query = mysqli_query($conn, $sql);
                if($query){
                    move_uploaded_file($tmp_name,"upload/".$file_name);
                    //mail send
                    $mail=new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host="smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure="tls";
                    $mail->SMTPAuth=true;
                    $mail->Username="rayhansict.info@gmail.com";
                    $mail->Password="quei htvx xcgh nxol";
                    $mail->SetFrom("rayhansict.info@gmail.com");
                    $mail->addAddress("$email");
                    $mail->IsHTML(true);
                    $mail->Subject="Confirmation of Application Review by HR Team";
                    $mail->Body=$html;
                    $mail->SMTPOptions=array('ssl'=>array(
                        'verify_peer'=>false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>false
                    ));
                    $mail->send();
                    //sms send
                    send_sms($send_sms_number, $name, $job_position);
                    //job_position
                    $_SESSION['job_position'] = $job_position;
                    //success
                    $respons['message'] = 'success';
                }else{
                  $respons['message'] = 'Error';
                }
            }else{
                $respons['message'] = 'Please Enter a valid Number';
            }
        }
    }else{
        $respons['message'] = 'Any Feild Cannot be empty';
    }
    header('Content-Type: application/json');
	  echo json_encode($respons);

?>