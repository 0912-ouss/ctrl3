<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update fornisseurs</title>
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="forni.css">
</head>

<body id="bg3">
<?php session_start(); if(empty($_SESSION["id"]))
    { header("location: login.php"); }?>
    <?php
    include("cnx.php");$IP='';$nom='';$tel='';$mail='';$pass=''; $adress='';
    $dr=ExecuteReader($cnx,"select * from fournisseur ");
    if(isset($_POST["serch"]))
        {
            $_SESSION["nomfo"]=$_POST["nom"];
            $nom=$_SESSION["nomfo"];
            $dt=ExecuteReader($cnx,"select * from fournisseur where Idf='$nom' ");
            while($inf1=$dt->fetch()){
             $tel=$inf1["Tel"];$mail=$inf1["Email"];$pass=$inf1["Psw"];$adress=$inf1["adresse"];
            }$dt->closeCursor();
        }
    if(isset($_POST["save"]))
    { 
        $tel1=$_POST["tel"];$adress1=$_POST["adresse"];$pass1=$_POST["password"];$mail1=$_POST["email"];$id=$_SESSION['nomfo'];
        ExecuteNonQuery($cnx,"UPDATE fournisseur set  Tel='$tel1' , Email='$mail1', Psw='$pass1' , adresse='$adress1' where Idf='$id'");        
    }
    ?>
    <div class="wrapper">


        <div class="quote-wrapper" id="bg4">
            <blockquote>
                <p>
                    "Paradise isn't a place. <br> It's a feeling"
                </p>
                <p class="author">- L. Boyer</p>
            </blockquote>
        </div>
        <!-- end quote-wrapper -->

        <div class="form-wrapper">
            <h1 class="form-title">Update fornisseur</h1>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    
                    <select name="nom" id="select-user" class="w-100"> 
                        <?php while($inf=$dr->fetch()){?>
                            <option  value="<?php echo($inf["Idf"]); ?>" > 
                                <?php echo($inf["Nomf"]);?>
                             </option>
                        <?php }$dr->closeCursor();?>
                    </select>
                    <button id="select-search" name="serch"><i class="far fa-search"></i></button>
                    <span class="check-icon"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="w-100" value="<?php echo($mail); ?>">
                    <span class="check-icon"></span>
                </div>

                <div class="form-group ">
                    <label for="password">Password</label>
                    <input type="password" value="<?php echo($pass); ?>" name="password" id="password" class="w-100" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                    <span class="check-icon"></span>
                </div>
                <div class="form-group">
                    <label for="username">Tel</label>
                    <input type="text" name="tel" id="username" class="w-100" value="<?php echo($tel); ?>" title="Must be longer than 4 characters">
                    <span class="check-icon"></span>
                </div>
                <div class="form-group">
                    <label for="username">Adresse</label>
                    <input type="text" name="adresse" id="username" class="w-100" value="<?php echo($adress); ?>" title="Must be longer than 4 characters">
                    <span class="check-icon"></span>
                </div>


                <div class="form-group mb-0">
                    <button id="btn-save" name="save">save</button>
                </div>
            </form>


        </div>
        <!-- end form-wrapper -->
    </div>
    <!-- end wrapper -->
    <script src="login.js"></script>
</body>

</html>