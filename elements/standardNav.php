
<?php 
  function buildNav($navNum) {  
    $activeArray = array(""," ","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
    if ($navNum != null) {
      $activeArray[$navNum - 1] = "active";
    }
    
        echo "<nav class='navbar navbar-expand-md bg-dark navbar-dark navbarNav'>
                <!-- <a class='navbar-brand' href='#'>Vandelay</a> -->
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
                  <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='collapsibleNavbar'>
                <ul class='navbar-nav'>
                  <li class='nav-item'>
                    <a class='nav-link {$activeArray[0]}' href='./'>Intro</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link {$activeArray[1]}' href='historik.php'>Historik</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link {$activeArray[2]}' href='nutid.php'>Nutid</a>
                  </li>  
                  <li class='nav-item'>
                      <a class='nav-link {$activeArray[3]}' href='tekniken.php'>Tekniken</a>
                  </li> 
                  <li class='nav-item'>
                      <a class='nav-link {$activeArray[4]}' href='framtiden.php'>Framtiden</a>
                  </li> 
                  <li class='nav-item'>
                      <a class='nav-link {$activeArray[5]}' href='media.php'>Media</a>
                  </li> 
                  <li class='nav-item'>
                      <a class='nav-link {$activeArray[6]}' href='faq.php'>FAQ</a>
                  </li> 
                  <li class='nav-item'>
                      <a class='nav-link {$activeArray[7]}' href='lankar.php'>Länkar</a>
                  </li> 



                  </ul>


                  <ul class='navbar-nav ml-auto'>
                  
                    <li class='nav-item'>
                      <a class='nav-link {$activeArray[12]}' href='login.php'>Login &nbsp;<i class='fas fa-sign-in-alt'></i></a>
                  </li>  
                  

                  <!-- <li class='nav-item'>
                    <a class='nav-link' href='#'>Sign Up &nbsp;<i class='fas fa-user-plus'></i></a>   
                </li>    -->
                    </li>
                </ul>
                </div>  
            </nav>";
  }

  function buildLoggedInNav($navNum) {
    $activeArray = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

    if ($navNum != null) {
      $activeArray[$navNum - 1] = "active";
    }
        echo "<nav class='navbar navbar-expand-md bg-dark navbar-dark navbarNav'>
                <!-- <a class='navbar-brand' href='#'>Vandelay</a> -->
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
                  <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='collapsibleNavbar'>
                  <ul class='navbar-nav'>
                    <li class='nav-item'>
                      <a class='nav-link {$activeArray[0]}' href='./'>Intro</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link {$activeArray[1]}' href='historik.php'>Historik</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link {$activeArray[2]}' href='nutid.php'>Nutid</a>
                    </li>  
                    <li class='nav-item'>
                        <a class='nav-link {$activeArray[3]}' href='tekniken.php'>Tekniken</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link {$activeArray[4]}' href='framtiden.php'>Framtiden</a>
                    </li> 
                    <li class='nav-item'>
                        <a class='nav-link {$activeArray[5]}' href='media.php'>Media</a>
                    </li> 
                    <li class='nav-item'>
                        <a class='nav-link {$activeArray[6]}' href='faq.php'>FAQ</a>
                    </li> 
                    <li class='nav-item'>
                        <a class='nav-link {$activeArray[7]}' href='lankar.php'>Länkar</a>
                    </li> 


                    
      </ul>

      <ul class='navbar-nav ml-auto'>

      <li class='nav-item'>
        <a class='nav-link {$activeArray[10]}'  href='admin.php'>Open &nbsp;<i class='fas fa-door-open'></i></a>
    </li>  

    <li class='nav-item'>
    <a class='nav-link {$activeArray[11]}'  href='images.php'>Images &nbsp;<i class='far fa-images'></i></a>
</li>  
<li class='nav-item'>
<a class='nav-link {$activeArray[12]}'  href='newsletter.php'>Email &nbsp;<i class='fas fa-envelope'></i></a>
</li>  


        <li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout &nbsp;<i class='fas fa-sign-out-alt'></i></a>
      </li>  
      

      <!-- <li class='nav-item'>
        <a class='nav-link' href='#'>Sign Up &nbsp;<i class='fas fa-user-plus'></i></a>   
    </li>    -->
        </li>
    </ul>
    </div>  
</nav>";
  } 
?>