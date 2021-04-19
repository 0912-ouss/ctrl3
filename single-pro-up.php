<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> up produit</title>
    <link rel="stylesheet" href="produit.css">
    <link rel="stylesheet" href="all.css">
</head>

<body>
<?php session_start(); if(empty($_SESSION["id"]))
    { header("location: login.php"); }?>
<?php 
    include("cnx.php");$IP='';$prix='';$qte='';$desc='';$desi=''; $image='';
    $dr=ExecuteReader($cnx,"select * from produits ");
    if(isset($_GET["serch"]))
        {
            $_SESSION["desi"]=$_GET["desi"];
            $desig=$_SESSION["desi"];
            $dt=ExecuteReader($cnx,"select * from produits where IdP=$desig ");
            while($inf1=$dt->fetch()){
            $IP=$inf1["IdP"];$prix=$inf1["PrixUnit"];$qte=$inf1["Qte"];$desc=$inf1["Descr"];$desi=$inf1["Designation"];
            }$dt->closeCursor();
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
        <form class="single" method="GET">
            <div class="left">
                <img src="images/product-6.jpg" alt="">
                <input type="file" name="image" id="" name="pic">
            </div>
            <div class="right">

                <div class="search">
                    <select name="desi" id="">
                        <?php while($inf=$dr->fetch()){?>
                            <option  value="<?php echo($inf["IdP"]); ?>" > 
                                <?php echo($inf["Designation"]);?>
                             </option>
                        <?php }$dr->closeCursor();?>
                    </select>
                    <button id="search-btn" name="serch"><i class="far fa-search"></i></button>
                </div>
                <div class="rating">
                    <p class="v">5.0</p>
                    <p id="star" class="v">
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                    </p>
                    <p>100 <span>rating</span></p>
                    <p>500 <span>sold</span></p>
                </div>
                <input type="text" placeholder="$120.00" id="prix" name="prix" value="<?php if($prix!=''){echo($prix);} ?>">
                <textarea id="desc" name="desc" name="" id="" cols="30" rows="10" placeholder="A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until."><?php if($desc!=''){echo($desc);} ?></textarea>
                <div class="qt">
                    <p>-</p>
                    <input type="text" placeholder="1" name="qte" value="<?php if($qte!=''){echo($qte);} ?>">
                    <p>+</p>
                </div>
                <br><br>
                <button id="save" name="save">save</button>
                <?php
                 if(isset($_GET["save"]))
                 {
                    $image=$_FILES["image"]['name'];
                    $tmp_dir=$_FILES["image"]['tmp_name'];
                    $image_size=$_FILES["image"]['size'];
                    $upload_dir='uploads';
                    $image_ext=strtolower(pathinfo($image,PATHINFO_EXTENSION));
                    $validExt=array('jpg','png','jpeg','gif','pdf');
                    $picProfile=rand(100,10000000).'.'.$image_ext;
                    move_uploaded_file($tmp_dir,$upload_dir.$picProfile);
             
                    $id=$_SESSION["desi"];$qte=$_GET["qte"];$pri=$_GET["prix"];$descr=$_GET["desc"];
                    ExecuteNonQuery($cnx,"UPDATE produits set Qte='$qte', PrixUnit='$pri' , Imagee='$picProfile', Descr='$descr' where IdP='$id'");
                }
                ?>
            </div>

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