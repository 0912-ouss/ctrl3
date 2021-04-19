<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fornisseur</title>
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="forni.css">
</head>

<body id="bg1">

<?php 
session_start();if(empty($_SESSION["id"]))
    { header("location: login.php"); }?>
    <div class="wrapper">


        <div class="quote-wrapper" id="bg2">
            <blockquote>
                <p>
                    "Paradise isn't a place. <br> It's a feeling"
                </p>
                <p class="author">- L. Boyer</p>
            </blockquote>
        </div>
        <!-- end quote-wrapper -->

        <div class="form-wrapper">
            <h1 class="form-title">Add Fornisseur</h1>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="w-100" autofocus value="">
                    <span class="check-icon"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="w-100" value="">
                    <span class="check-icon"></span>
                </div>

                <div class="form-group ">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="w-100" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">
                    <span class="check-icon"></span>
                </div>
                <div class="form-group">
                    <label for="username">Tel</label>
                    <input type="text" name="Tel" id="username" class="w-100" autofocus value="" title="Must be longer than 4 characters">
                    <span class="check-icon"></span>
                </div>
                <div class="form-group">
                    <label for="username">Adresse</label>
                    <input type="text" name="Adresse" id="username" class="w-100" autofocus value="" title="Must be longer than 4 characters">
                    <span class="check-icon"></span>
                </div>


                <div class="form-group mb-0">
                    <input type="submit" value="Create fornisseur" name="add" class="w-100" id="submit" style="display:none">
                    <button type="submit" name="add" id="btn-save" >Create fornisseur</button>
                    
                </div>
            </form>


        </div>
        <!-- end form-wrapper -->
    </div>
    <!-- end wrapper -->
    <script src="login.js"></script>

    <?php
   session_start();
   include("cnx.php");
   //SignUp code
   if(isset($_POST["add"]))
    {
        
		$C=0;
		$nom=$_POST["username"];$email=$_POST["email"];$psw=$_POST["password"];
        $Tel=$_POST["Tel"];$Adresse=$_POST["Adresse"];
      
		$dr=ExecuteReader($cnx,"select * from fournisseur WHERE Email='$email' and Psw='$psw'");
    
		while($cnt=$dr->fetch()) { $C++; } $dr->closeCursor();
		if($C>=1)
		{
			echo("<script>alert('Enter an other Email');</script>");
		}
		else
		{
            if(!empty($nom)&&!empty($email)&&!empty($psw)&& !empty($Tel) && !empty($Adresse))
            {
			    ExecuteNonQuery($cnx,"insert into fournisseur values('','$nom','$Tel','$email','$psw','$Adresse')");
            }
		}
	}
    ?>
</body>

</html>