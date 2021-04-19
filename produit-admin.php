<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit admin</title>
    <link rel="stylesheet" href="produit.css">
    <link rel="stylesheet" href="all.css">
</head>

<body>
<?php session_start(); if(empty($_SESSION["id"]))
    { echo("<script>alert('ffffff');</script>"); header("location: login.php"); }?>
    <?php
        include("cnx.php"); 
        $dr=ExecuteReader($cnx,"select * from produits");
     
        if(isset($_POST["sup"]))
        {
            $id=$_POST["sup"];
            $sql="DELETE FROM produits where IdP='$id'";
	        ExecuteNonQuery($cnx,$sql);
            ?>
            <script>
                window.location.href = "produit-admin.php";
            </script>
            <?php
        }
        
    
    ?>
    <header>
        <div class="header-top">
            <ul>
                <li>
                    <p>+12463783399393</p>
                </li>
                <li>
                    <p>yourmail@email.com</p>
                </li>
                <li>
                    <p>3 business day dilevvery & free return </p>
                </li>
            </ul>
        </div>
        <nav>
            <div class="logo">
                <p>vegefoods</p>
            </div>
            <ul>
                
                <li><a href="produit-admin.php">sliste produits </a></li>
                <li><a href="command-admin.php">liste commande </a></li>
                <li><a href="forni-admin.php">Fornisseur </a></li>
                
            </ul>
        </nav>
    </header>
    <main>
        <div class="main-title">

            <p>home cart</p>
            <span> my cart</span>

        </div>
        <form class="list" method="POST">
            <ul>
                <li>
                    <p id="p1">action</p>
                    <p id="p2">image</p>
                    <p id="p3">product name</p>
                    <p id="p4">price</p>
                </li>
                <?php while($xtr=$dr->fetch()){?>
                <li>
                    <div id="p1" class="action">
                        <span>
                            <button value="<?php echo($xtr['IdP']);?>" name="sup"><i class="far fa-times"></i></button>
                        </span>

                    </div>
                    <p id="p2"><img src="<?php echo($xtr['Imagee']);?>" alt=""></p>
                    <div id="p3">
                        <h1><?php echo($xtr['Designation']);?></h1>
                        <span><?php echo($xtr['Descr']);?></span>
                    </div>
                    <p id="p4" class="p7" ><?php echo($xtr['PrixUnit']);?></p>
                    

                </li>
                <?php }$dr->closeCursor(); ?>
            </ul>
                
        </form>
        <form class="order" method="GET">
            <button class="btn" name="Paj">add new one</button><?php if(isset($_GET["Paj"])) {header("location: single-pro-aj.php");} ?>
            <button class="btn" name="Pup">edit product</button><?php if(isset($_GET["Pup"])) {header("location: single-pro-up.php");} ?>
        </form>

    </main>
    <footer>
        <ul>
            <li>
                <p>Vegefoods</p>
            </li>
            <li>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </li>
            <li>
                <div class="social">
                    <span><i class="fab fa-twitter"></i></span>
                    <span><i class="fab fa-facebook"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>

                </div>
            </li>
        </ul>
        <ul>
            <li>
                <p>menu</p>
            </li>
            <li>
                <p>shop</p>
            </li>
            <li>
                <p>about</p>
            </li>
            <li>
                <p>journal</p>
            </li>
            <li>
                <p>contact us</p>
            </li>
        </ul>
        <ul>
            <li>
                <p>help</p>
            </li>
            <li>
                <p>shipping information</p>
            </li>
            <li>
                <p>return & exchange</p>
            </li>
            <li>
                <p>teams and condition</p>
            </li>
            <li>
                <p>privacy policy</p>
            </li>
        </ul>
        <ul>
            <li>
                <p>Have a Questions?</p>
            </li>
            <li>
                <p>203 Fake St. Mountain View, San Francisco, California, USA</p>
            </li>
            <li>
                <p>+2 392 3929 210</p>
            </li>
            <li>
                <p>teams and condition</p>
            </li>
            <li>
                <p>info@yourdomain.com</p>
            </li>
        </ul>
        <div class="text">
            <p>Copyright ©2021 All rights reserved | This template is made with by Neabuzz</p>
        </div>
    </footer>

</body>

</html>