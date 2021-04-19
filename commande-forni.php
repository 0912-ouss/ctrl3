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
<?php
    include("cnx.php"); session_start();
    if(empty($_SESSION["id"]))
    { header("location: login.php"); }
    $id=$_SESSION["id"];
    $dr=ExecuteReader($cnx,"select commande.IdCmd , fournisseur.Nomf , produits.Designation , produits.PrixUnit , 
    detailcmd.QteCommande , detailcmd.PrixCommande , livraison.Etat
    from commande ,livraison ,detailcmd ,produits ,fournisseur
    where commande.IdCmd=livraison.IdCmdfk and commande.IdCmd=detailcmd.IdCmdfk and detailcmd.IdPfk=produits.IdP
    and commande.Idffk='$id' and fournisseur.Idf= '$id'
    ");
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
        <form class="list">
            <ul>
                <li>
                    <p id="p11">id commande </p>
                    <p id="p22">nom fornisseur</p>
                    <p id="p33">product name</p>
                    <p id="p44">price</p>
                    <p id="p5">quantite</p>
                    <p id="p66">total</p>
                    <p id="p88">livraison</p>
                </li>
                <?php while($xtr=$dr->fetch()){?>
                <li>
                    <p id="p11"><?php echo( "#0000".$xtr["commande.IdCmd"]); ?> </p>
                    <p id="p22"><?php echo($xtr["fournisseur.Nomf"]); ?></p>
                    <p id="p33"><?php echo($xtr["produits.Designation"]); ?></p>
                    <p id="p44"><?php echo($xtr["produits.PrixUnit"]); ?></p>
                    <p id="p5"><?php echo($xtr["detailcmd.QteCommande"]); ?></p>
                    <p id="p66"><?php echo($xtr["detailcmd.PrixCommande"]); ?></p>
                    <p id="p88"><?php echo($xtr["livraison.Etat"]); ?><p>
                </li>
                <?php }$dr->closeCursor(); ?>

            </ul>

        </form>
        <form class="order">
           <p id="msg">total a payerr est :</p>
           <p id="total">$288484.00</p>
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