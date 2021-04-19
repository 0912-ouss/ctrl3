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
    <?php
        include("cnx.php"); session_start();
        $dr=ExecuteReader($cnx,"select * from produits");
        if(isset($_POST["cmd"]))
        {
            if(!empty($_POST["chec"])) 
                {    echo("<script>alert('cmd');</script>");
                    foreach($_POST["chec"] as $cheked)
                    {   
                        $id=$_SESSION["id"];$date=date('d-m-y');
                        ExecuteNonQuery($cnx," insert into commande values('','$id','$date')");
                         
                    }
                    
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
                <li>home</li>
                <li>shop</li>
                <li>home</li>
                <li>shop</li>
                <li>home</li>
                <li>shop</li>

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
                <?php while($xtr=$dr->fetch()){?>
                <li>
                    <p id="p1"><input type="checkbox" value="<?php echo($xtr['IdP']);?>" name="chec" id=""></p>
                    <p id="p2"><img src="<?php echo($xtr['Imagee']);?>" alt=""></p>
                    <div id="p3">
                        <h1><?php echo($xtr['Designation']);?></h1>
                        <span><?php echo($xtr['Descr']);?></span>
                    </div>
                    <p  class="p7" id="pri" ><?php echo($xtr['PrixUnit']);?></p>
                    <p id="p5" ><input type="text" id="qte" onchange="myFunction()"></p>
                    <p  class="p7" id="tot"></p>
                    <script> $tot=0;  
                        function myFunction() {
                            
                        var Prix = Number(document.getElementById('pri').innerHTML);alert(prix);
                        var element = Number(document.getElementById('qte').value);alert(element);
                        var prd=prix*element;
                        document.getElementById('tot').value=prd;
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