<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter - Skytail Docs</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png">
    <!-- <link rel="icon" href="img/icon.png"> -->
</head>
<body class="bg-color-my">
    <script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
    </script>
    <?php 
        $mailSent = false;
        // include "elements/standardNav.php";
        include "essential/session.php";
        include "essential/connection.php";
        include "elements/standardNav.php";
        $fb = $conn->query("SELECT * FROM account WHERE id = {$_SESSION['accountID']}");
        if ($fb->num_rows > 0) {
            // include "elements/standardNavLoggedIn.php";
            buildLoggedInNav(13);
        } else {
            header("Location: index.php");
            buildNav(11);
            // include "elements/standardNav.php";
        }

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sendMailBtn'])) {

            // print_r($_POST);
            $mailText = $_POST['textMail'];
            $mailHead = $_POST['headMail'];

            $mailTextN = nl2br($mailText);

            $fb2 = $conn->query("SELECT email FROM mail_list");
            if ($fb2->num_rows > 0) {
                while ($row = $fb2 -> fetch_assoc()) {
                    // print_r();
                    $ishMail = $row['email'];

                    // print_r($mailTextN);

                    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                    try {
                        //Server settings
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->CharSet = 'UTF-8';
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'Ange Mail';                // SMTP username
                        $mail->Password = 'Ange Lösenord';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 587
                        $mail->Port = 465;                                    // TCP port to connect to
            
                        //Recipients
                        $mail->setFrom('Ange Mail', 'Jan - Skytail');
                        // $mail->addAddress('simon.jonsson@elev.ga.ntig.se', 'Reciver');     // Add a recipient
                        $mail->addAddress($ishMail); 
                        $mail->AddEmbeddedImage("img/icon.png", "skytail-logo", "skytail.png");
                        // $mail->Body = "Your <b>HTML</b> with an embedded Image: <img src='cid:skytail-logo'> Here is an image!";
                    
                        //$mail->addAddress('contact@example.com');               // Name is optional
                        //$mail->addReplyTo('info@example.com', 'Information');
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
            
                        //Attachments
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Newsletter - Skytail';
                        // $mail->Body    = 'Body text goes here';
                        $mail->Body    = "<div style='background-color: rgb(30, 33, 36); color: white; width: fit-content; margin: auto; border-radius: 10px; padding: 30px;'>
                        <h1 style='margin: auto; width: fit-content; padding: 0px 20px; border-bottom: 2px solid white;'>News Letter</h1>   
                        <br>
                        <div style='text-align: center;'>
                        <h3>" . $mailHead . "</h3> " .
                        $mailTextN . "
                        <br>
                        <br>
                        <br>
                        <div style='border-bottom: 2px solid white; height; 0px'></div>
                        <br>
                        <br>
                        <em style='font-size: 18px;'>Greetings!<br>Skytail Docs</em> 
                        <br><br>
                        <div style='width: fit-content; margin: auto;'>
                        <img style='width: 100px; border-radius: 25px; border: 2px solid white;' src='cid:skytail-logo'>
                        </div>
                        <br>
                    </div>";
                        $mail->AltBody = "Thank you for subscribing to our newsletter! Now you will be able to receive updates about the site as well as new articles that might be what you were looking for and allowing you to catch up on that topic. 
            
                        Want to share your knowledge with the world? Visit our website and learn more about how to do so!
                        
                        Skytail thinks information should be available about every topic you might be able to think of, for free and we appreciate every single one that helps us get close to our goal.";
            
                        $mail->send();

                        $mailSent = true;
            
                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        // echo 'Message could not be sent.';
                        // echo 'Mailer Error: ' . $mail->ErrorInfo;
                        $passError = "";
                    }
                }
            }

        }
    ?>
    <br><br>
        


    <div class="newsletter_div">

    <?php 
        if ($mailSent) {
            echo "
            <div id='sentNotis'>
            <div class='mailSentBox'>The Newsletter has been sent</div>
            <br><br>
            </div>
            <script>
                setTimeout(function(){
                    document.getElementById('sentNotis').remove();
                }, 2500);
            </script>
            ";
        }
    ?>

    <h3>Newsletter</h3><br>
    

    <form style='white-space: pre-wrap;' method="POST" autocomplete="off">
        <label for="headMail">Title:</label>
        <input type="text" name="headMail" autocomplete="off"><br>
        Text:
        <textarea style="white-space: pre-wrap;" class="textarea_box" name='textMail'></textarea>
        <br>
        <input type="submit" name="sendMailBtn" value="Send Email">
    </form>


    </div>

</body>
</html>