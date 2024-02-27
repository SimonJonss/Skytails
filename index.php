<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skytail Docs</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png">
</head>
<body class="bg-color-my">
    <div class="reallyBigDiv">
    <?php 
        include "essential/connection.php";
        include "essential/session.php";
        include "elements/standardNav.php";
        $fb = $conn->query("SELECT * FROM account WHERE id = {$_SESSION['accountID']}");
        if ($fb->num_rows > 0) {
            // include "elements/standardNavLoggedIn.php";
            buildLoggedInNav(1);
        } else {
            // include "elements/standardNav.php";
            buildNav(1);
        }
    ?>
    <br>
    <!-- <br> -->
    <center>
    <h1 class="my-header animate__animated animate__rubberBand"><span class="my-header-color1">Skytail Docs</span> - <span class="my-header-color2"> Elbilar</span></h1>
    </center>


    <div class="row simRowShit" id="contentMainDiv">
                <div class="col-md-6">
                    <br><br>
                    <div class="my-column-content" id="intro_column1">
                        <h3 class="my-column-header">Om Mig</h3>
                        Hejsan, jag heter Simon och jag är en teknikintresserad tonåring från Skåne. Då jag är intresserad av teknik så valde att skriva en hemsida om elbilar, deras utveckling, historia och framtiden för de. Men bilar? Du sa ju att det var tekniskt intresserad? Ja absolut, de låter kanske lite skumt först men när det kommer till elbilar så är det nästan lika mycket dator som bil. Det är även mycket teknologi bakom drivsystemet samt batterierna. 
                        <div class="my-column-img">
                            <img src="img/pages/charge.jpg" title="En ellbil som laddas" alt="En bild på en elbil som laddas" width="100%">
                            <p class="my-column-img-text">Som namnet "elbilar" säger så laddas bilarna med el istället för exempelvis bensin eller disel</p>
                        </div>
                        <h3 class="my-column-header">Kort om Elbilar</h3>
                        Idén om elbilar är i sig inte ny men teknologin som används i de moderna bilarna är relativt ny och utvecklas ständigt. För 15 år sedan så dök de ibland upp nya elbilar men då räckvidden var kort så skrattade och hånade dessa bilarna av många men i dagsläget så är det fullt fokus på elbilar eller eventuellt hybrider.
                        ourlogo
                    </div>
                    
                </div>
                

                <div class="col-md-6">
                    <br><br>

                    <div class="my-column-content" id="intro_column2">
                        <h3 class="my-column-header">Vårt Uppdrag</h3>

                        Som de flesta förmodligen listat ut av att läsa rubriken eller titeln ovanför så är detta en av alla Skytails &copy; hemsidor angående olika ämnen. Skytail är ett företag som låter individer skapa olika hemsidor beroende på deras intressen eller ämne de är insatta i för att dela med sig av sina informationen till världen. Vi anser att man inte ska behöva vara någon expert skribent eller proffs på att skapa hemsidor för att få chansen att dela med sig av sin kunskap till omvärlden. Vi ser till att all information som publiceras fakta granskas så att ingen information blir vilseledande.  
                        <!-- <div class="my-column-img">
                            <img src="img/pages/ourlogo.png" width="50%" title="En ellbil som laddas" alt="En bild på en elbil som laddas" width="100%">
                            <p class="my-column-img-text">Skytail &copy; loga</p>
                        </div> -->
                    </div>
                </div>
                
            </div>

    <?php include "elements/footer.php"; ?>
    <!-- <footer id="sticky-footer" style = "bottom: -1000;" class="border-top bg-dark border-radius-0">
    <div class="row" id="contentDiv">
        <div class="col-md-6 my-first-footer-col">
            <center>
            <form class="form my-footer-form" action="">
                <label class="text-light my-footer-subscribe-text" for="subscribeMail">Subscribe to our news letter</label>
                <div class="form-inline">
                <input class="form-control mr-sm-2" name="subscribeMail" type="email" placeholder="Email">
                <button class="btn btn-success" type="submit">Subscribe</button>
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
    </div> -->


    </footer>
    <script src="js/index.js"></script>

    <script>
        $.ajax({
            url: "getPageContents.php",
            success: function(result){
                var data = JSON.parse(JSON.parse(result));
                if (result.length > 2) {
                    for (var i = 0; i < data.length; i = i + 1) {
                        // console.log(data[i][1]);
                        document.getElementById(data[i][1]).innerHTML = data[i][0]
                    }
                }
            }       
        });

        // function appendData(item, index) {
        //     console.log(`${item}`);
        // }

    </script>

    </div>

</body>
</html>