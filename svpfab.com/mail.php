<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    $targetfolder = "uploads/";
    $targetfile = $targetfolder . basename($_FILES["uploadfile"]["name"]);
    $file_type =strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
    $allowed = array('iges','dxf','dwg','jpg','jpeg','gif','png','pdf','xlsx','doc','docx');
    echo(allowed);
    if (in_array($file_type, $allowed)){
        if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $targetfile))
        {   
        echo "The file ". basename( $_FILES['uploadfile']['name']). " is uploaded</br>";

        require_once "vendor/autoload.php";
        
        $mail = new PHPMailer(true);

        try{

            $mail->SMTPDebug  = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tsl';

            /* Username (email address). */
            $mail->Username = 'siddharthdubey323@gmail.com';

            /* Google account password. */
            $mail->Password = 'Dubey@100';
            
            //Declaring Variables
            $name = $_POST["name"];
            $email = $_POST["email"];
            $mobile = $_POST["mobile"];
            $subject = $_POST["subject"];
            $text = $_POST["message"];
            
            $message = '<table style="width:100%">
            <tbody><tr>
                <td>Name : '.$name.' </td>
            </tr>
            <tr><td>Email: '.$email.'</td></tr>
            <tr><td>Contact No: '.$mobile.'</td></tr>
            <tr><td>Subject: '.$subject.'</td></tr>
            <tr><td>Message: '.$text.'</td></tr>
            </tbody></table>';

            $mail->From = "siddharthdubey323@gmail.com";
            $mail->FromName = "SVP Website";
            
            $mail->addAddress("svpplastics@rediffmail.com");
            
            $mail->isHTML(true);
            
            $mail->Subject = "Contact Information";
            $mail->Body = "<i>.$message.</i>";    
            $mail->addAttachment($targetfile);
            $mail->send();
            echo "Message has been sent successfully";   
        } 
        catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        }
        }
         else {
            echo "Problem uploading file";
        }
    }
    else {
        echo "You may only upload PDFs, DOC, XLS,JPEGs or GIF files.<br>";
    }
    
    

?>
