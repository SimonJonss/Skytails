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
    <script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
    </script>
    <?php 
        // include "elements/standardNav.php";
        include "essential/session.php";
        include "essential/connection.php";
        include "elements/standardNav.php";
        $fb = $conn->query("SELECT * FROM account WHERE id = {$_SESSION['accountID']}");
        if ($fb->num_rows > 0) {
            // include "elements/standardNavLoggedIn.php";
            buildLoggedInNav(12);
        } else {
            header("Location: index.php");
            buildNav(12);
            // include "elements/standardNav.php";
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['uploadFileBtn'])) {

        


        $target_dir = "img/pages/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        
        // if (filesize($_FILES["fileToUpload"]["tmp_name"]) < 1) {
        //     echo "Ingen fil valdes";
        // } 


        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Filen är inte en bild.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file) && $uploadOk == 1) {
        echo "Det finns redan en bild med detta namnet.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000 && $uploadOk == 1) {
        echo "Bilden var för stor.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $uploadOk == 1 ) {
        echo "Endast bilder kan laddas upp.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "<br>Filen kunde inte laddas upp.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Filen vid namn: ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " har laddats upp.";
        } else {
            echo "<br>Ett fel uppstod.";
        }
        }

        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['deleteImageBtn'])) {

            unlink("img/pages/" . $_POST['imageName']);

        }

    ?>
    <br><br>
    <div class="imageDisplayBox">
        <form method="POST" enctype="multipart/form-data">
            <br>
            <h5>Upload Image</h5>
            <br>
            <hr>
            <input required class="uploadFileInp" name="fileToUpload" type="file">
            <br>
            <hr>
            <br>
            <button type='submit' class='uploadImgBtn' name='uploadFileBtn'>Upload <i class="fas fa-upload"></i></button>
        </form>
        <?php 
            $directory = "img/pages/";
            
            $images = glob($directory . "*.*");

            foreach($images as $image)
            {
                if ( str_ends_with($image, ".jpg") || str_ends_with($image, ".jpeg") || str_ends_with($image, ".png") ) {

                    $imageName = explode($directory, $image)[1];
                    echo  "
                    <form method='POST'>
                        <input hidden name='imageName' value='{$imageName}'>
                        <img src='{$image}'> 
                        <hr>
                        <h5>{$imageName}</h5>
                        <hr>
                        <button type='submit' class='deleteImgBtn'name='deleteImageBtn'>Delete <i class='far fa-trash-alt'></i></button>
                    </form>
                    ";

                }
                    
            }

        ?>
    </div>

    <?php // include "elements/footer.php"; ?>
    <script src="js/index.js"></script>
    <script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
    </script>
</body>
</html>