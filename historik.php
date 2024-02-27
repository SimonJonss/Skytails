<!DOCTYPE html>
<html lang="en" style="height: 100%;">
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

    <style type="text/css">
    .my-column-img > img {
        max-height: 250px;
    }
    </style>
</head>
<body class="bg-color-my" style="height: 100%;">
    <?php 
        include "essential/connection.php";
        include "essential/session.php";
        include "elements/standardNav.php";
        $fb = $conn->query("SELECT * FROM account WHERE id = {$_SESSION['accountID']}");
        if ($fb->num_rows > 0) {
            // include "elements/standardNavLoggedIn.php";
            buildLoggedInNav(2);
        } else {
            // include "elements/standardNav.php";
            buildNav(2);
        }
    ?>
    <br>
    <!-- <br> -->
    
    <center>
    <h1 class="my-header animate__animated animate__rubberBand"><span class="my-header-color1">Skytail Docs</span> - <span class="my-header-color2"> Elbilar</span></h1>
    </center>

        <div class="snapDiv" id="histoDiv">
            <!-- <div class="hist_div"> -->
            <span class="hist_line"></span>
            <!-- </div> -->

            <br><br>
            <div class="my-year-div" id="contentMainDiv2">
                <div class="col-md-6">
                    <div class="my-column-content">
                        <h3 class="my-column-header my-head-year-start">År: <span class="my-head-year">1777</span></h3>
                        <div class="shitty-yearBox1-div">
                            Data data Data data Data data Data data Data data Data data Data data Data data Data data 
                        </div><!-- box1 ^ -->
                    </div>
                </div>

                
                <div class="col-md-6">
                    <!-- <br><br> -->

                    <div class="my-column-content">
                        <h3 class="my-column-header my-head-year-start"><span class="my-head-year">&nbsp;</span></h3>
                        <div class="shitty-yearBox2-div">
                        Data data Data data Data data Data data Data data Data data Data data 
                        </div><!-- box2 ^ -->
                    </div>
                </div>
            </div><!-- one year ^ -->

            <br><br>   


        </div>
    <script src="js/index.js"></script>
    <script>
        $.ajax({
            url: "getPageContents.php",
            success: function(result){
                var data = JSON.parse(JSON.parse(result));
                if (result.length > 2) {
                    for (var i = 0; i < data.length; i = i + 1) {
                        console.log(data[i][1]);
                        try {
                            document.getElementById(data[i][1]).innerHTML = data[i][0]
                        } catch (error) {
                           var error = "placeholder"; 
                        }
                        
                    }
                    
                    setTimeout(() => {
                        var elems = document.getElementsByClassName("my-year-div");
                        for (var i = 0; i < elems.length; i = i + 1) {
                            elems[i].style = "";
                            console.log("i")
                        } 
                    }, 400);

                }
            }       
        });


    </script>

    <?php include "elements/footer.php"; ?>

</body>
</html>