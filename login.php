<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    
<div class="wrapper">
    
    
    <div class="quote-wrapper">
      <blockquote>
        <p>
          "Paradise isn't a place. <br>
            It's a feeling"
        </p>
        <p class="author">- L. Boyer</p>
      </blockquote>
    </div> <!-- end quote-wrapper -->
  
    <div class="form-wrapper">
      <h1 class="form-title">Sign in</h1>
  
      <form Method="POST">
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
        <div class="form-group mb-0">
          <input type="submit" value="login" class="w-100" id="submit" name="log" required>
        </div>
      </form>
  
      <small>Sign Up <a href="inscription.php">Click here</a></small>
    </div> <!-- end form-wrapper -->
  </div> <!-- end wrapper -->
  <script src="login.js"></script>
  <?php
  //Login code
  session_start();
  include("cnx.php");
  if(isset($_POST["log"]))
  {
    $mail=$_POST["email"];
    $psw=$_POST["password"];
    $dr=ExecuteReader($cnx,"select * from fournisseur WHERE Email='$mail' and Psw='$psw'");
    while($inf=$dr->fetch())
	  {
		  $bl==true;
		 
      $_SESSION["mail"]=$inf["Email"];$_SESSION["nom"]=$inf["Nomf"];$_SESSION["id"]=$inf["Idf"];
      header("Location: produit-forni.php");
	  }
	  $dr->closeCursor();

    $dr1=ExecuteReader($cnx,"select * from admine WHERE Email='$mail' and Psw='$psw'");
    while($inf1=$dr1->fetch())
    {
      $bl==true;
      
      $_SESSION["mail"]=$inf1["Email"];$_SESSION["nom"]=$inf1["Nomf"];$_SESSION["id"]=$inf1["IdA"];
      header("Location: produit-admin.php");
    }
    $dr1->closeCursor();
  if($bl==false)
  {echo("<script>alert('Email or Password is incorrect');</script>");}
  }
  ?>
</body>
</html>