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
    <?php 
        include "essential/connection.php";
        include "essential/session.php";
        include "elements/standardNav.php";
        $fb = $conn->query("SELECT * FROM account WHERE id = {$_SESSION['accountID']}");
        if ($fb->num_rows > 0) {
            // include "elements/standardNavLoggedIn.php";
            buildLoggedInNav(8);
        } else {
            // include "elements/standardNav.php";
            buildNav(8);
        }
    ?>
    <br>
    <!-- <br> -->
    <center>
    <h1 class="my-header animate__animated animate__rubberBand"><span class="my-header-color1">Skytail Docs</span> - <span class="my-header-color2"> Elbilar</span></h1>
    </center>


    <div class="row" id="contentMainDiv">
                <div class="col-md-12">
                    <br><br>
                    <div class="my-column-content" id="lankar_column">
                        <div class="sources_div">
                            <h3>Källor:</h3><ul><br><!-- sources start -->
                                <li><a class="source_link" href="https://edition.cnn.com/interactive/2019/07/business/electric-car-timeline/index.html">https://edition.cnn.com/interactive/2019/07/business/electric-car-timeline/index.html</a></li><br><!-- source link end -->

                                <li><a class="source_link" href="https://incharge.vattenfall.de/en/knowledge-hub/articles/the-history-of-the-electric-car-it-all-started-in-1832">https://incharge.vattenfall.de/en/knowledge-hub/articles/the-history-of-the-electric-car-it-all-started-in-1832</a></li><br><!-- source link end -->

                                <li><a class="source_link" href="https://elbilen.se/artiklar/180-ar-av-elbilshistoria/">https://elbilen.se/artiklar/180-ar-av-elbilshistoria/</a></li><br><!-- source link end -->

                                <li><a class="source_link" href="https://www.energy.gov/articles/history-electric-car">https://www.energy.gov/articles/history-electric-car</a></li><br><!-- source link end -->

                                <li><a class="source_link" href="https://www.svenskfordonsladdning.se/elbilsbatterier-hur-fungerar-det/">https://www.svenskfordonsladdning.se/elbilsbatterier-hur-fungerar-det/</a></li><br><!-- source link end -->

                                <li><a class="source_link" href="https://www.opel.se/simply-electric/oeversikt/elmotorn-enkelt-foerklarad/">https://www.opel.se/simply-electric/oeversikt/elmotorn-enkelt-foerklarad/</a></li><br><!-- source link end -->

                                <li><a class="source_link" href="https://en.wikipedia.org/wiki/Stanley_Meyer%27s_water_fuel_cell">https://en.wikipedia.org/wiki/Stanley_Meyer%27s_water_fuel_cell</a></li><br><!-- source link end -->
                                
                                <li><a class="source_link" href="https://www.chalmers.se/sv/institutioner/ims/nyheter/Sidor/kolfiber-kan-lagra-energi.aspx">https://www.chalmers.se/sv/institutioner/ims/nyheter/Sidor/kolfiber-kan-lagra-energi.aspx</a></li><br><!-- source link end -->

                            </ul></div><!-- sources end --></div>
                    
                </div>
                
                
            </div>

    <?php // include "elements/footer.php"; ?>
    <footer id="sticky-footer" style = "bottom: -1000;" class="border-top bg-dark border-radius-0">
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
    </div>

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
                        try {
                            document.getElementById(data[i][1]).innerHTML = data[i][0]
                        } catch (error) {
                            var notFound = true;
                        }
                        
                    }
                }
            }       
        });

        // function appendData(item, index) {
        //     console.log(`${item}`);
        // }

    </script>

</body>
</html>