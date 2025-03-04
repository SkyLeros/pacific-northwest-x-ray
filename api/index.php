<?php session_start(); phpinfo(); ?>

<!DOCTYPE html>
<!--Procurred by Chong Yun Sin 74455, Than Ye Hong 76990, Tang Jhen Nee 77363, Liew Yu Heng 77313-->

<html lang="en">
    <head>
        <title>Pnwx</title>
        <link rel="icon" href="Pictures/icon.png">
        <link rel="shortcut icon" href="Pictures/icon.png">
        <link rel="stylesheet" href="CSS/stylesheet.css">
    </head>
    <body>

    <?php

        // Create database & connection
        include 'connection.php';

        //Declarations
        $signup = $login = $logout = $myprofile = "";
        //Check if session login is defined
        if (isset($_SESSION['login'])) 
        {
            //If it is defined, then we check is it Logged in 
            if($_SESSION['login'] === "Logged In")
            {
                $logout = "Logout";
                $myprofile = "My Profile";
            }
        }
        else //session login not set yet
        {
            $signup = "Sign Up";
            $login = "Login";
        }

        //product
        //Create Table Products
        $sql = "CREATE TABLE product (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        productcategory VARCHAR(255) NOT NULL,
        productname VARCHAR(255) NOT NULL,
        productdetail VARCHAR(255) NOT NULL,
        price int(11) NOT NULL,
        productpic BLOB (255) NOT NULL,
        productpicadd VARCHAR(255) NOT NULL
        )";

        $result = mysqli_query($conn, $sql);
        if ($result === TRUE) {
          //echo "Table u created successfully or Table exists".'<br>';
          
          //setup array for dummy products
          $productcategory = array("Merchant Board ", "Merchant Board ", "Silver Recovery Systems ", "Silver Recovery Systems ", "Veterinary ", "Veterinary ", 
          "X Ray Test Meters ", "X Ray Test Meters ");

          $productname = array("Pacific Northway X-Ray Merchant Board for DR Panels", "PNWX Light Duty Merchant Board for Film Cassettes", 
          "Steel Wool Recovery Canisters and Accessories", "Rotex Standard Ultra Series Silver Recovery Systems", "Techno Aide Veterinary Immobilizers", 
          "Techno Aide Veterinary Positioner", "ECC Series 820 kVp Meters", "Series 815 kVp Meters");

          $productdetail = array("Model: 1104-C3a, box style merchant board with arms to accommodate DR Panels up to 1-1/4 thick.", 
          "Model: 1104, constructed of solid oak, adjustable tabletops ,compatible with CR.", 
          "Model: C4 Steel Wool Canister; Size: 3-1/2 gallon; Steel Wool Type: Coarse", "Model: Ultra 4; Max Recovery Rate: 0.5oz/hr Tank Capacity: 2.75 gal; Electrical Requirements: 115VAC/60Hz", 
          "Type:  Immobilizers; Model: VIT X; Size: X Large; Dimension: 36 x 14 x 9 feet high.",
          "Type:  Positioner; Model: YFCA Positioner; Size: Small; Dimensions: 7 x 12.5 x 3.", "Model: 820; X-Ray kVp Meter/Exposure; Time Meter/mA Meter/mAs; kVp Range: 45 to 125.",
          "Model: 815L;Lower kV Range Version of the 815 Meter(40 to 120kVp);For dental applications.");

          $price = array("1968", "770", "215", "2412", "170", "33", "2279", "1700");

          $productpicadd = array("itempic/item1.jpg", "itempic/item2.jpg", "itempic/item3.jpg", "itempic/item4.jpg", "itempic/item5.jpg", "itempic/item6.jpg", "itempic/item7.jpg", 
          "itempic/item8.jpg");

          $productpic = array("presetpic/item1.jpg", "presetpic/item2.jpg", "presetpic/item3.jpg", "presetpic/item4.jpg", "presetpic/item5.jpg", "presetpic/item6.jpg", "presetpic/item7.jpg", 
          "presetpic/item8.jpg");
          
          $index = 0;
          foreach($productcategory as $value){
            $sql = "INSERT INTO product(productcategory, productname, productdetail, price, productpic, productpicadd) 
            VALUES ('$value','$productname[$index]', '$productdetail[$index]', '$price[$index]', '$productpic[$index]', '$productpicadd[$index]')";
            $result = mysqli_query($conn, $sql);
            if ($result === TRUE) {
              //echo "New record created successfully";
            } else {
              //echo "Error: " . $sql  . mysqli_error($conn);
            }
            $index++;
          }
          
        } else {
          //echo "Error creating table: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
    <!----product end-->
    
        <header class="HeaderHeader" id="Push_header">
            
        <?php
          if(!isset($_SESSION['login']))
          {
            if(isset($_SESSION['admin_login']))
            {
              echo '<a class="button2" href="adminDashboard.php"  >Staff Only</a>';
            }
            else
            {
              echo '<a class="button2" href="adminlogin.php"  >Staff Only</a>';
            }
          }
            
        ?>
        

            <div class="login_register">
                <ul id = abc>
                  <li><img class="logo" src="Pictures/logo index.png" alt="Pacific Northwest X-Ray Inc."></li>
                  <li><a id="expand_sidenav"><span onclick="sidebar()">&#9776;</span></a></li>
                </ul>

                <ul>
                  <li><a href="logout.php"  ><?php echo $logout?></a></li>
                  <li><a href="register.php"><?php echo $signup?></a></li>
                  <li>&nbsp| </li>
                  <li><a href="login.php" ><?php echo $login?></a></li>
                  <li><a href="myProfile.php"  ><?php echo $myprofile?></a></li>
                  <li><img class="image_login_register" src="Pictures/login_register_icon.png" alt="Login and register icon"></a>
                </ul>
                
            </div>

            

            <a class = "cart_position" href="cart.php"> <img id="cart" src="Pictures/cart.png" alt="Cart"> </a>
              
        </header>

        <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closesidebar()">&times;</a>
              <br>
              <a href="#merchantBoard" >Merchant Board</a>
              <br>
              <a href="#silverRecovery" >Silver Recovery Systems</a>
              <br>
              <a href="#veterinary">Veterinary</a>
              <br>
              <a href="#xray" ">X-Ray Test Meters</a>
        </div>

        <main id="Push_main">
        <div class="slidebanner-container">
            <div class="mySlides">
              <img src="Pictures/pnwxHomePage.png" style="width:100%">
            </div>
            
            <div class="mySlides">
            <img src="Pictures/banner.png" style="width:100%">
            </div>

            <div class="mySlides">
            <img src="Pictures/banner 3.png" style="width:100%">
            </div>
            
            <a class="prev" onclick="nextslide(-1)">&#10094;</a>
            <a class="next" onclick="nextslide(1)">&#10095;</a>
            
            <div class = "dotbullet">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
            <script src="slides.js"></script>
            </div>
            <br>
            <br>

            <section class="Showcase">
              <div class="page1-title">
                <h2>- Category -</h2>
              </div>

              <div class="row">

                <h3 id = "merchantBoard"> Merchant Board </h3>
                <?php 
                include 'connection.php';
                $sql = "SELECT id, productcategory, productname, productdetail, price, productpic FROM product WHERE productcategory='Merchant Board'";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo '<form name="add_cart" method="post" action="cart.php">';
                      echo '<div class="column"> <div class = "card">';
                      echo '<img src = "' . $row['productpic'] . '"/>';
                      echo '  <div class="grid-container_1"> <h2>' . $row["productname"]. '</h2></div>';
                      echo '  <div class="grid-container_2"> <h2 class="title">'. "$" . $row["price"] .  '</h2></div>';
                      echo '  <div class="grid-container_3"> <p>' . $row["productdetail"] . '</p></div>';
                      echo '<p class = "grid-container_4"> Quantity: <input type="number" name="quantity" value="1" min="1" style="text-align:center" > </p>';
                      echo '<input type="hidden" name="product_id" value="' .$row["id"]. '">';
                      echo '<input class="button" type="submit" value="Add Cart">   ';
                      echo '</div></div>';
                      echo '</form>';
    
                    }
    
                } else {
                  echo '<p align=center style="font-size:18px;font-family: Maiandra GD;">'."0 results";
                }
                ?>    
                
              </div>

              <div class="row">
                <h3 id = "silverRecovery"> Silver Recovery Systems </h3>
                <?php 
                include 'connection.php';
                $sql = "SELECT id, productcategory, productname, productdetail, price, productpic FROM product WHERE productcategory='Silver Recovery Systems'";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo '<form name="add_cart" method="post" action="cart.php">';
                      echo '<div class="column"> <div class = "card">';
                      echo '' .'<img src = "' . $row['productpic'] . '"/>' . '';
                      echo '  <div class="grid-container_1"> <h2>' . $row["productname"]. '</h2></div>';
                      echo '  <div class="grid-container_2"> <h2 class="title">'. "$" . $row["price"] .  '</h2></div>';
                      echo '  <div class="grid-container_3"> <p>' . $row["productdetail"] . '</p></div>';
                      echo '<p class = "grid-container_4"> Quantity: <input type="number" name="quantity" value="1" min="1" style="text-align:center" width="100%"> </p>';
                      echo '<input type="hidden" name="product_id" value="' .$row["id"]. '">';
                      echo '<input class="button" type="submit" value="Add Cart">   ';
                      echo '</div></div>';
                      echo '</form>';
                    }
                    
                } else {
                  echo '<p align=center style="font-size:18px;font-family: Maiandra GD;">'."0 results";
                }
                ?>            
              </div>

              <div class="row">
                <h3 id = "veterinary"> Veterinary  </h3>
                <?php 
                include 'connection.php';
                $sql = "SELECT id, productcategory, productname, productdetail, price, productpic FROM product WHERE productcategory='Veterinary '";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo '<form name="add_cart" method="post" action="cart.php">';
                      echo '<div class="column"> <div class = "card">';
                      echo '' .'<img src = "' . $row['productpic'] . '"/>' . '';
                      echo '  <div class="grid-container_1"> <h2>' . $row["productname"]. '</h2></div>';
                      echo '  <div class="grid-container_2"> <h2 class="title">'. "$" . $row["price"] .  '</h2></div>';
                      echo '  <div class="grid-container_3"> <p>' . $row["productdetail"] . '</p></div>';
                      echo '<p class = "grid-container_4"> Quantity: <input type="number" name="quantity" value="1" min="1" style="text-align:center" width="100%"> </p>';
                      echo '<input type="hidden" name="product_id" value="' .$row["id"]. '">';
                      echo '<input class="button" type="submit" value="Add Cart">   ';
                      echo '</div></div>';
                      echo '</form>';
    
                    }
    
                } else {
                  echo '<p align=center style="font-size:18px;font-family: Maiandra GD;">'."0 results";
                }
                ?>               
              </div>

              <div class="row">
                <h3 id = "xray"> X Ray Test Meters  </h3>
                <?php 
                include 'connection.php';
                $sql = "SELECT id, productcategory, productname, productdetail, price, productpic FROM product WHERE productcategory='X Ray Test Meters  '";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo '<form name="add_cart" method="post" action="cart.php">';
                      echo '<div class="column"> <div class = "card">';
                      echo '' .'<img src = "' . $row['productpic'] . '"/>' . '';
                      echo '  <div class="grid-container_1"> <h2>' . $row["productname"]. '</h2></div>';
                      echo '  <div class="grid-container_2"> <h2 class="title">'. "$" . $row["price"] .  '</h2></div>';
                      echo '  <div class="grid-container_3"> <p>' . $row["productdetail"] . '</p></div>';
                      echo '<p class = "grid-container_4"> Quantity: <input type="number" name="quantity" value="1" min="1" style="text-align:center" width="100%"> </p>';
                      echo '<input type="hidden" name="product_id" value="' .$row["id"]. '">';
                      echo '<input class="button" type="submit" value="Add Cart">   ';
                      echo '</div></div>';
                      echo '</form>';
    
                    }
    
                } else {
                  echo '<p align=center style="font-size:18px;font-family: Maiandra GD;">'."0 results";
                }
                ?>                
              </div>
            </section>

        
        </main>

        <footer class="FooterFooter" id="Push_footer">
            <div class="FFooterUpperPortion">
                <div class="FFooterIcon">
                    <img src="Pictures/LOGO.jpeg" alt="Pacific Northwest X-Ray Inc.">
                </div>
                <div class="FFooterBlocks">
                    <h3><b>Contact Us</b></h3>
                    <ul>
                        <li>Tel: 503-667-3000</li>
                        <br>
                        <li>Toll-Free: 800-827-9729</li>
                        <br>
                        <li>Fax: 503-666-8855</li>
                    </ul>
                </div>
                <div class="FFooterBlocks">
                    <h3><b>Reach Us</b></h3>
                    <ul>
                        <li>P.O. Box 625,</li>
                        <br>
                        <li>Gresham, OR</li>
                        <br>
                        <li>97030 U.S.A.</li>
                    </ul>
                </div>
                <div class="FFooterBlocks">
                    <h3><b>Opening Hours</b></h3>
                    <ul>
                        <li>8am - 5pm</li>
                        <br>
                        <li>Monday-Friday</li>
                        <br>
                        <li>(PST/PT)</li>
                    </ul>
                </div>
            </div>

            <br>
            <br>
            <hr id="FooterLine"/>
            <div class="FFooterLowerPortion" >
              <sub class="Disclaimer">This web site is our catalog! <u>No printed catalog is available.</u></sub>
              <br>
              <sub class="Disclaimer">©1997-2021 Pacific Northwest X-Ray Inc. - Sales & Marketing Division - All Rights Reserved</sub>
            </div>
        </footer>   
    </body>
</html>