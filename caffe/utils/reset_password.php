<?php
try{
    if(!(isset($_POST['sendEmail'])) || !(isset($_POST['email'])) || strlen($_POST['email']) == 0){
        throw new Exception('emptyFields');
    }

    include "connect_db.php";
    
    // Create a prepared statement
    if(!($stmt = $connection -> stmt_init())){
        throw new Exception();
    }

    if(!($stmt -> prepare("SELECT id FROM usersinfo WHERE email=?"))){
        throw new Exception("error1");
    }
    
      // Bind parameters
    if(!($stmt -> bind_param("s",$_POST['email']))){
        throw new Exception("error2");
    }
    
      // Execute query
    if(!($stmt -> execute())){
        throw new Exception("error3");
    }

    if(!($results = $stmt -> get_result())){
        throw new Exception("error4");
    }

    $numOfRows = $results -> num_rows;
    
    if($numOfRows === 0) {
        throw new Exception('invalidCredentials');
    }

    if(!($row = $results -> fetch_assoc())){
        throw new Exception();
    }

    //Se utente presente del DB allora genero token
    if($row)
    {
        
        $token = md5($_POST['email']).rand(10,9999);
    
        $expFormat = mktime(
        date("m") ,date("d")+1, date("Y")
        );
    
        $expDate = date("Y-m-d",$expFormat);
    
        if(!($stmt -> prepare("INSERT INTO tokenRecoverPassword VALUES (DEFAULT,?,?,?)"))){
            throw new Exception("error1");
        }
        
          // Bind parameters
        if(!($stmt -> bind_param("sss",$_POST['email'],$token,$expDate))){
            throw new Exception("error2");
        }
        
          // Execute query
        if(!($stmt -> execute())){
            throw new Exception("error3");
        }
    
        $link = "<a href='http://localhost/caffeSAW/caffe/html/update_password.php?key=".$_POST['email']."&amp;token=".$token."'>Click To Reset password</a>";
    
        require '../PHPMailer/Exception.php';
        require '../PHPMailer/PHPMailer.php';
        require '../PHPMailer/SMTP.php';
      
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
    
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "catcafesaw@gmail.com";
        $mail->Password = "giorgio.1999";
        $mail->SetFrom("catcafesaw@gmail.com");
        $mail->Subject = "Reset Password - Cat Cafe";
        $mail->Body= 'Click On This Link to Reset Password '.$link.'';
        $mail->AddAddress($_POST['email']);
    
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
        //die();
    }else{
        throw new Exception('invalidCredentials');
        if(!($stmt -> close())){
            throw new Exception();
        }
    }
    // Close statement

    if(!($stmt -> close())){
        throw new Exception();
    }

    if(!($connection -> close())){
        throw new Exception();
    };

    header("Location: ../html/reset_password.php?success=yes");
    exit();
}
catch(Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../html/reset_password.php?error=emptyFields");
        exit();

    }
    if ($e->getMessage()==='invalidCredentials') {
        header("Location: ../html/reset_password.php?error=invalidCredentials");
        exit();

    }
    else{
        header("Location: ../html/reset_password.php?error=unexpectedError");
        exit();
    }
}
?>