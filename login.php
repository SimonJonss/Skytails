<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon Jönsson</title>
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
    <?php 
        // include "elements/standardNav.php";
        include "essential/session.php";
        include "essential/connection.php";

        include "elements/standardNav.php";
        $fb = $conn->query("SELECT * FROM account WHERE id = {$_SESSION['accountID']}");
        if ($fb->num_rows > 0) {
            // include "elements/standardNavLoggedIn.php";
            buildLoggedInNav(13);
        } else {
            // include "elements/standardNav.php";
            buildNav(10);
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loginBtn'])) {
            // echo $_POST['username'];
            // print_r($_POST);
            $fb = $conn->query("SELECT * FROM account WHERE name = '{$_POST['username']}' AND password = '{$_POST['password']}'");
            if ($fb->num_rows > 0) {
                $data = $fb->fetch_assoc();

                $_SESSION['accountID'] = $data['id'];
                header("Location: admin.php");
            }
        }
    ?>

    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

    <br>
    <br>
    <div id="loginFormDiv">
        <form id="loginForm" method="POST">
            <label for="username">Username:</label>
            <br>
            <input class="formField" name="username" type="username">
            <br><br>
            <label for="password">Password:</label>
            <br>
            <input class="formField" name="password" type="password">
            <br><br>
            <button class="formBtn1" name="loginBtn" onclick="submitFormWithId('loginForm')">Log in</button>
        </form>
    </div>
    
    <?php include "elements/footer.php"; ?>

    <!-- <footer id="sticky-footer" class="border-top bg-dark border-radius-0">
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
    </footer> -->
    <script src="js/index.js"></script>
</body>
</html>