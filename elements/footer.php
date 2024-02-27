<script>

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
    </script>

<?php 
    

        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load composer's autoloader
        require 'vendor/autoload.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['subscribeBtn'])) {
        $emailText = $_POST['subscribeMail'];

        
        $rowsData = $conn->query("SELECT * FROM mail_list WHERE email = '{$emailText}'") -> num_rows;
       
        // echo $rowsData;
        if ( $rowsData == 0  ) {
            $key = "";

            do {   
                $key = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15));

                $resultFB = $conn->query("INSERT INTO mail_list (email, removekey) VALUES ('{$emailText}', '{$key}')");
            }while (!$resultFB);
            // $conn->query("INSERT INTO mail_list (email, removekey) VALUES ('{$emailText}', '{$key}')");
        
        

        $domainText = "http://". $_SERVER['SERVER_NAME'];
        if ($_SERVER['SERVER_PORT'] != 80 ) {
            $domainText .= ":" . $_SERVER['SERVER_PORT'] ;
        }
        $domainText .= substr($_SERVER['REQUEST_URI'], 0, strlen($_SERVER['REQUEST_URI']) - 9);
        $domainText .= "css_last/unsubscribe.php"; 

        $domainText .= "?" . $key;

        // https://github.com/PHPMailer/PHPMailer/blob/master/examples/gmail_xoauth.phps

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'janeriksson2002@gmail.com';                // SMTP username
            $mail->Password = 'MittNamnJan123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 587
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('janeriksson2002@gmail.com', 'Jan - Skytail');
            // $mail->addAddress('simon.jonsson@elev.ga.ntig.se', 'Reciver');     // Add a recipient
            $mail->addAddress($_POST['subscribeMail']); 
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
            <h1 style='margin: auto; width: fit-content; padding: 0px 20px; border-bottom: 2px solid white;'>Thank You</h1>   
            <br>
            <div style='text-align: center;'>
            <h3>Thank you for subscribing to our newsletter</h3>
            Now you will be able to receive updates about the <br>
            site as well as new articles that might be what you were<br> 
            looking for and allowing you to catch up on that topic. 

            <br>
            <br>
            Want to share your knowledge with the world? <br>
            Visit our website and learn more about how to do so!
            <br>
            Skytail thinks information should be available about <br>
            every topic you might be able to think of, for free and we <br>
            appreciate every single one that helps us get close to our goal
            <br><br>

            <u>Just to be clear, this is a free subscription so<br>
            we will never charge you with anything</u>
            </div>
            <br>
            <h4>You find these emails annoying? We understand you.</h4>
            <div style='width: fit-content; margin: auto;'>
            <a href='{$domainText}' style='width: fit-content; margin: auto;'><button style='width: fit-content; margin: auto; color: black; padding: 10px 30px; text-decoration: none; background-color: lime; color: black; border: 2px solid white; border-radius: 10px; box-shadow: 2px 1px 10px 2px white;'>Unsubscribe</button></a>
            </div>
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
            
            Skytail thinks information should be available about every topic you might be able to think of, for free and we appreciate every single one that helps us get close to our goal.

            Just to be clear, this is a free subscription so we will never charge you with anything. Visit {$domainText} to unsubscribe from these letters.";

            $mail->send();

            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            $passError = "";
        }
        
        }
        
    } 
?>
<br><br><br><br>
<footer id="sticky-footer" style="bottom: 0;" class="page-footer border-top bg-dark border-radius-0">
    <div class="row" id="contentDiv">
        <div class="col-md-6 my-first-footer-col">
            <center>
            <form class="form my-footer-form" method="POST" action="">
                <label class="text-light my-footer-subscribe-text" for="subscribeMail">Subscribe to our news letter</label>
                <div class="form-inline">
                <input class="form-control mr-sm-2" name="subscribeMail" type="email" placeholder="Email">
                <button class="btn btn-success" name="subscribeBtn" type="submit">Subscribe</button>
                </div>
            </form>
            </center>
        </div>

        <div class="col-md-6">
            <center>
            <div class="container text-light text-center">
                <div id="my-footer-div">
                    <a href="#"><i class="fa fa-youtube"></i> Skytail</a>
                    &nbsp;&nbsp;
                    <a href="#"><i class="fa fa-twitter"></i> Skytail</a>
                    &nbsp;&nbsp;
                    <a href="#"><i class="fa fa-instagram"></i> @Skytail</a>
                </div>
                <div id="my-footer-mainText">                
                    <em>Copyright &copy; Skytail <span id="currentYear"></span></em>
                </div>
            </div>
            </center>
        </div>
    </div>
    <div style="font-weight: 300; color: white; margin: auto; width: fit-content; font-style: italic;">
        Template & Backend Written By: Simon Jönsson
    </div>


    </footer>

    <script>
// window.setInterval(function(){ 
//     // document.getElementById("sticky-footer").style = "Bottom: -1";
//     try {
//         foot = document.getElementById("sticky-footer")
//         document.getElementById("contentMainDiv").style = `margin: 20px 0px; margin-bottom: ${foot.offsetHeight + 20}px;`;
//         // console.log("WEEE 2")
//     } catch (error) {
//         var catching = true
//     }

// }, 100);

setTimeout(() => {
    try {
        foot = document.getElementById("sticky-footer")
        document.getElementById("contentMainDiv").style = `margin: 20px 0px; margin-bottom: ${foot.offsetHeight - 20}px;`;
        // console.log("WEEE 2")
    } catch (error) {
        var catching = true
    } 

    try {
        foot = document.getElementById("sticky-footer")
        foot.style = "bottom: 0.1;"
        document.getElementById("contentMainDiv2").style = `margin-bottom: ${foot.offsetHeight - 20}px;`;
        // console.log("WEEE 2")
    } catch (error) {
        var catching = true
    } 

    // document.getElementById("contentMainDiv2").style = `margin: 20px 0px; margin-bottom: ${foot.offsetHeight - 20}px;`;
}, 200);


if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

    </script>