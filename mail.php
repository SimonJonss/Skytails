<?php

$domainText = "www.". $_SERVER['SERVER_NAME'];
if ($_SERVER['SERVER_PORT'] != 80 ) {
    $domainText .= ":" . $_SERVER['SERVER_PORT'] ;
}
$domainText .= substr($_SERVER['REQUEST_URI'], 0, strlen($_SERVER['REQUEST_URI']) - 9);
$domainText .= "/unsubscribe.php"; 

echo $domainText;
?>



<div style='background-color: rgb(30, 33, 36); color: white; width: fit-content; margin: auto; border-radius: 10px; padding: 30px;'>
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
                        <a href='https://google.com' style='width: fit-content; margin: auto;'><button style='width: fit-content; margin: auto; color: black; padding: 10px 30px; text-decoration: none; background-color: lime; color: black; border: 2px solid white; border-radius: 10px; box-shadow: 2px 1px 10px 2px white;'>Unsubscribe</button></a>
                        </div>
                        <br>
                        <br>
                        <div style='border-bottom: 2px solid white; height: 0px'></div>
                        <br>
                        <br>
                        <em style='font-size: 18px;'>Greetings!<br>Skytail Docs</em> 
                        <br><br>
                        <div style='width: fit-content; margin: auto;'>
                        <img style='width: 100px; border-radius: 25px; border: 2px solid white;' src='img/icon.png'>
                        </div>
                        <br>
                    </div>