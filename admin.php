<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Skytail Docs</title>
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
            buildLoggedInNav(11);
        } else {
            header("Location: index.php");
            buildNav(11);
            // include "elements/standardNav.php";
        }

        // if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loginBtn'])) {

        // }
    ?>
    <br><br>
    <form method="POST" name="contentForm" id="contentForm" >
        <?php 
            function get_string_between($string, $start, $end){
                $string = ' ' . $string;
                $ini = strpos($string, $start);
                if ($ini == 0) return '';
                $ini += strlen($start);
                $len = strpos($string, $end, $ini) - $ini;
                return substr($string, $ini, $len);
            }
            

            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
            //    echo "<h1>Yes</h1>"; 
               $fbChange = $conn->query("SELECT * FROM site_text");
               if ($fbChange->num_rows > 0) {
                   while ($row = $fbChange -> fetch_assoc()) {
                        $textareaName = "area_" . $row['id'];
                        $textareaContent = $_POST[$textareaName];
                        
                        $buildYearBox = true; 
                        $dumpText = $textareaContent;
                        $dumpText2 = str_replace('<yearbox year="', '<br><br><div class="my-year-div" id="contentMainDiv2"><div class="col-md-6"><div class="my-column-content"><h3 class="my-column-header my-head-year-start">År: <span class="my-head-year">', $textareaContent);
                        if ($dumpText2 == $dumpText) {
                            $buildYearBox = false;
                        }

                        if ($buildYearBox) {
                            while (strpos($textareaContent, '<yearbox year="') !== false) {
                                $yearTemp = explode('<yearbox year="', $textareaContent, 2);
                                $year = "";
                                $array = str_split($yearTemp[1]);
                                foreach ($array as $char) {
                                    // echo $char;
                                    if ($char == '"')  {
                                        break;
                                    }
                                    
                                    $year .= $char;
                                }

                                $yearString = explode('<yearbox year="' . $year . '">', $textareaContent, 2);
                                if (count($yearString) > 1) {
                                    $textareaContent = $yearString[0] . '<br><br><div class="my-year-div" id="contentMainDiv2"><div class="col-md-6"><div class="my-column-content"><h3 class="my-column-header my-head-year-start">År: <span class="my-head-year">' . $year . '</span></h3><!-- the end of the year start -->' . $yearString[1];  
                                }
                                
                               // $textareaContent = str_replace('<yearbox year="' . $year . '">', '<br><br><div class="my-year-div" id="contentMainDiv2"><div class="col-md-6"><div class="my-column-content"><h3 class="my-column-header my-head-year-start">År: <span class="my-head-year">' . $year . '</span></h3>', $textareaContent);
                               
                            }

                            $textareaContent = str_replace('<box1>', '<div class="shitty-yearBox1-div">', $textareaContent);
                            $textareaContent = str_replace('</box1>', '</div><!-- box1 ^ --></div></div>', $textareaContent);
                            
                            $textareaContent = str_replace('<box2>', '<div class="col-md-6"><div class="my-column-content"><h3 class="my-column-header my-head-year-start"><span class="my-head-year">&nbsp;</span></h3><div class="shitty-yearBox2-div">', $textareaContent);
                            $textareaContent = str_replace('</box2>', '</div><!-- box2 ^ --></div></div>', $textareaContent);

                            $textareaContent = str_replace('</yearbox>', '</div><!-- one year ^ -->', $textareaContent);

                            
                        }

                       $textareaContent = str_replace('<header>', '<!-- headstart --><h3 class="my-column-header">', $textareaContent);
                       $textareaContent = str_replace('</header>', '</h3><!-- headend -->', $textareaContent);

                       $textareaContent = str_replace('<faq_box>', '<!-- the start of faq box --><div class="faq_div">', $textareaContent);
                       $textareaContent = str_replace('</faq_box>', '</div><br><br><!-- the end of faq box -->', $textareaContent);
   
                       $textareaContent = str_replace('<faq_que>', '<div class="faq_question">', $textareaContent);
                       $textareaContent = str_replace('</faq_que>', '</div><!-- faq question end -->', $textareaContent);
   
                       $textareaContent = str_replace('<faq_awn>', '<div class="faq_awnser">', $textareaContent);
                       $textareaContent = str_replace('</faq_awn>', '</div><!-- faq awnser end -->', $textareaContent);

                       $textareaContent = str_replace('<sources>','<div class="sources_div"><h3>Källor:</h3><ul><br><!-- sources start -->', $textareaContent);
                       $textareaContent = str_replace('</sources>','</ul></div><!-- sources end --></div>', $textareaContent);


                        // $textareaContent = str_replace('<header>', '<h3 class="my-column-header">', $textareaContent);
                        // $textareaContent = str_replace('</header>', '</h3>', $textareaContent);

                        while (strpos($textareaContent, "<source_link>") !== false) {
                            $strData = explode("<source_link>", $textareaContent, 2);
                            $strData2 = explode("</source_link>", $strData[1], 2);
                            

                            $linkCode = '<li><a class="source_link" href="' . $strData2[0] . '">' . $strData2[0] . '</a></li><br><!-- source link end -->';

                            $textareaContent = $strData[0] . $linkCode . $strData2[1];
                        }


                        while (strpos($textareaContent, "<bild") !== false) {
                            $strData = explode("<bild", $textareaContent, 2);
                            $strData2 = explode("</bild>", $strData[1], 2);
                            
                            $pos = strpos($strData2[0], ">");
                            $imageText = substr($strData2[0], $pos + 1);
                            
                            // print_r("<code>" . $strData[0] . "|" . $strData2[1]  . "</code>");
                            $pos2 = strpos($strData[1], ">"); // for attributes 
                            $imgAttr = substr($strData[1], 0, $pos2);

                            $imgAttr = str_replace("hover", "title", $imgAttr);
                            $imgAttr = str_replace('file="', 'src="img/pages/', $imgAttr);

                            $imgHTML = '<div class="my-column-img"><img' . $imgAttr . '>';
                            if (strlen($imageText) > 0) {
                                $imgHTML .= '<p class="my-column-img-text">' . $imageText . '</p>';
                            }
                            $imgHTML .= "</div>";

                            // echo $imageText;
                            // echo strlen($imageText);
                            // echo $imgHTML;


                            $textareaContent = $strData[0] . $imgHTML . $strData2[1];
                            // echo $strData[0] . "|" . $strData2[1];
                        }

                        while (strpos($textareaContent, "<klipp") !== false) {
                            $strData = explode("<klipp", $textareaContent, 2);
                            $strData2 = explode(">", $strData[1], 2);
                            
                            $fileParts = explode('file="', $strData[1], 2);
                            $posStop = strpos($fileParts[1], '"');

                            $videoName = substr($fileParts[1], 0, $posStop);

                            $videoHTML = '<!-- video div --><div class="videoDiv"><video width="100%" controls controlsList="nodownload"><source src="vid/';
                                
                            $videoHTML .= $videoName;

                            $videoHTML .= '" type="video/mp4">Din browser stöder inte video taggen.</video></div><!-- video div end -->';

                            $textareaContent = $strData[0] . $videoHTML . $strData2[1];
                            
                        }

                        $conn->query("UPDATE site_text SET text = '{$textareaContent}' WHERE id = {$row['id']}");
                   }
               } 
            }

            $fb2 = $conn->query("SELECT * FROM site_text");
            if ($fb2->num_rows > 0) {
                while ($row = $fb2 -> fetch_assoc()) {
                    $textareaContent = $row['text'];

                    $buildYearBox = false; 
                    $dumpText = $textareaContent;
                    $textareaContent = str_replace('<br><br><div class="my-year-div" id="contentMainDiv2"><div class="col-md-6"><div class="my-column-content"><h3 class="my-column-header my-head-year-start">År: <span class="my-head-year">', '<yearbox year="', $textareaContent);
                    if ($textareaContent != $dumpText) {
                        $buildYearBox = true;
                    }

                    if ($buildYearBox) {
                        $textareaContent = str_replace('</span></h3><!-- the end of the year start -->', '">', $textareaContent);
                    }

                    // $textareaContent = str_replace('<h3 class="my-column-header">', '<header>', $textareaContent);
                    // $textareaContent = str_replace('</h3>', '</header>', $textareaContent);
                    $textareaContent = str_replace('<!-- video div --><div class="videoDiv"><video width="100%" controls controlsList="nodownload"><source src="vid/', '<klipp file="', $textareaContent);

                    $textareaContent = str_replace('" type="video/mp4">Din browser stöder inte video taggen.</video></div><!-- video div end -->', '">', $textareaContent);

                    $textareaContent = str_replace('<!-- the start of faq box --><div class="faq_div">', '<faq_box>', $textareaContent);
                    $textareaContent = str_replace('</div><br><br><!-- the end of faq box -->', '</faq_box>', $textareaContent);

                    $textareaContent = str_replace('<div class="faq_question">', '<faq_que>', $textareaContent);
                    $textareaContent = str_replace('</div><!-- faq question end -->', '</faq_que>', $textareaContent);

                    $textareaContent = str_replace('<div class="faq_awnser">', '<faq_awn>', $textareaContent);
                    $textareaContent = str_replace('</div><!-- faq awnser end -->', '</faq_awn>', $textareaContent);

                    $textareaContent = str_replace('<div class="shitty-yearBox1-div">', '<box1>', $textareaContent);
                    $textareaContent = str_replace('</div><!-- box1 ^ --></div></div>', '</box1>', $textareaContent);
                    
                    $textareaContent = str_replace('<div class="col-md-6"><div class="my-column-content"><h3 class="my-column-header my-head-year-start"><span class="my-head-year">&nbsp;</span></h3><div class="shitty-yearBox2-div">', '<box2>', $textareaContent);
                    $textareaContent = str_replace('</div><!-- box2 ^ --></div></div>', '</box2>', $textareaContent);

                    $textareaContent = str_replace('</div><!-- one year ^ -->', '</yearbox>', $textareaContent);

                    $textareaContent = str_replace('<!-- headstart --><h3 class="my-column-header">', '<header>', $textareaContent);
                    $textareaContent = str_replace('</h3><!-- headend -->', '</header>', $textareaContent);

                    $textareaContent = str_replace('<div class="sources_div"><h3>Källor:</h3><ul><br><!-- sources start -->', '<sources>', $textareaContent);
                    $textareaContent = str_replace('</ul></div><!-- sources end --></div>', '</sources>', $textareaContent);

                    $temperCounter = 0;

                    while (strpos($textareaContent, '<li><a class="source_link" href="') !== false) {
                        $strData = explode('<li><a class="source_link" href="', $textareaContent, 2);
                        $strData2 = explode('">', $strData[1], 2);
                        
                        $linkHref = $strData2[0];
                        $linkIshCode = '<li><a class="source_link" href="' . $linkHref . '">' . $linkHref . '</a></li><br><!-- source link end -->';

                        $strData3 = explode($linkIshCode, $textareaContent, 2);

                        $linkCode = '<source_link>' . $linkHref . '</source_link>';

                        $textareaContent = $strData3[0] . $linkCode . $strData3[1];

                        $temperCounter += 1;

                        if ($temperCounter >= 12) {
                            break;
                        }
                    }

                    while (strpos($textareaContent, '<div class="my-column-img"><img') !== false) {
                        $strData = explode('<div class="my-column-img"><img', $textareaContent, 2);
                        $strData2 = explode("</div>", $strData[1], 2);

                        $imageText = "";

                        if (strpos($strData[1], '<p class="my-column-img-text">') !== false) {
                            $imageText = get_string_between($strData[1], '<p class="my-column-img-text">', '</p>');
                        }
                        
                        // echo $imageText;
                        
                        $pos2 = strpos($strData[1], ">"); // for attributes 
                        $imgAttr = substr($strData[1], 0, $pos2);
                        $imgAttr = str_replace("title", "hover", $imgAttr);
                        $imgAttr = str_replace('src="img/pages/', 'file="', $imgAttr);

                        // print_r( $imgAttr );

                        $imgHTML = '<bild' . $imgAttr . '>';
                        if (strlen($imageText) > 0) {
                            $imgHTML .= $imageText;
                        }
                        $imgHTML .= "</bild>";

                        // echo $imageText;
                        // echo strlen($imageText);
                        // echo $imgHTML;


                        $textareaContent = $strData[0] . $imgHTML . $strData2[1];
                        // echo $strData[0] . "|" . $strData2[1];
                    }

                    echo "
                    <br>
                    <div class='my-content-textform'>
                        <h2>{$row['title']}</h2>
                        <div class='contentFormTextareaParentDiv'>
                        <textarea id='area_{$row['id']}' name='area_{$row['id']}' class='contentFormTextarea'>{$textareaContent}</textarea>
                    
                        </div>
                    </div> 
                    <br>
                    ";
                }
            } 

        ?>
        <input type="submit" name="submit" value="Update" id="submit"/>
    </form>

    <?php // include "elements/footer.php"; ?>
    <script src="js/index.js"></script>
    <script>
        fixTextareaHeight("contentFormTextarea");
    </script>
    <br>
</body>
</html>