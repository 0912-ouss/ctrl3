<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit forni</title>
    <link rel="stylesheet" href="produit.css">
    <link rel="stylesheet" href="all.css">
</head>

<body>
<?php session_start(); if(empty($_SESSION["id"]))
    { header("location: login.php"); }?>
    <?php
        include("cnx.php");$i=0;
        $dr=ExecuteReader($cnx,"select * from produits");
        if(isset($_POST["cmd"]))
        {
            $ccc=$_POST['saad'];
            if(!empty($ccc))
            {
                foreach($ccc as $cheked)
                {   echo("<script>alert($cheked);</script>"); }
            }
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
                
                <li><a href="produit-forni.php">Shop </a></li>
                <li><a href="commande-forni.php">My commande </a></li>
                
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
                    <p id="p1">select</p>
                    <p id="p2">image</p>
                    <p id="p3">product name</p>
                    <p id="p4">price</p>
                    <p id="p5">quantite</p>
                    <p id="p6">total</p>
                </li>
                <?php while($xtr=$dr->fetch()){ $i++;?>
                <li>

                    <p id="p1"><input type="checkbox" name="saad[]" value="red"></p>
                    <p id="p2"><img src="<?php echo($xtr['Imagee']);?>" alt=""></p>
                    <div id="p3">
                        <h1><?php echo($xtr['Designation']);?></h1>
                        <span><?php echo($xtr['Descr']);?></span>
                    </div>
                    <p id="p4" class="p7"  name="<?php echo($i); ?>" ><?php echo($xtr['PrixUnit']);?></p>
                    <p id="p5" ><input type="text" name="<?php echo($i); ?>" onchange="myFunction(<?php echo($i); ?>)"></p>
                    <p  id="p6" class="p7" name="<?php echo($i); ?>">0</p>
                    <script> function myFunction(x){
                            var p= document.getElementsByName(x);
                            p[2].innerText=Number( p[0].innerText)*Number( p[1].value);
                            }
                    </script> 
                    
                    

                </li>
                <?php }$dr->closeCursor(); ?>
                
            </ul>



        </form>
        <form class="order" method="POST">
            <button class="btn" name="cmd">palce order</button>
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