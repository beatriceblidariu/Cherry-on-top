
<html>
  <head>
  	<title> Partea 1 </title>
	<link rel="stylesheet" href="../css/test.css">
	 <link rel="stylesheet" href="../css/parere.css">
	
  </head>

  <?php 

	include "helper.php";


    if (!isSet($_SESSION['name'])) {
       $_SESSION['name'] = "";
	};
	
	if (!isSet($_SESSION['age'])) {
		$_SESSION['age'] = "";
	};
	if (!isSet($_SESSION['tipclient'])) {
	  $_SESSION['tipclient'] = "";
	};

   if (isSet($_POST["submit"])) {
		$error_msg = validate_fields();
		if (count($error_msg) == 0){
			header("Location: ./survey2.php");
		} else { 
		  display_error($error_msg); 
		}
	}
  ?> 

  <body>
  	<nav>
  <a href="../index.php">ACASA</a>
 <a href="../pag/booking.html">REZERVARI</a>
  <a href="../pag/Comenzi.html">COMENZI</a>
  <a href="#">MENIU</a> 
  <div class="dropdown">
  <a href="#" class="drop">RETETE</a>
   <a class="drop">RETETE</a>
        <div class="dropdown-content">
          <a href="pag/cookie.html">Cookies</a>
          <a href="pag/brownie.html">Brownie</a>
          <a href="pag/papanasi.html">Papanasi</a>
        </div>
</div> 
  <a href="../login-register/register.php">AUTENTIFICARE</a>
  <a href="../login-register/logout.php">LOGOUT</a>
  <a href="../pag/contact.php">CONTACT</a>
  <div id="indicator"></div>
</nav>
<div class="formParere">
    <form method="POST" action="./survey1.php">

      <h3>Nume:</h3>
        <input type="text" class="form-control" name="fullName" value="<?php  echo $_SESSION["name"]; ?>"/>
        <h3>Varsta:</h3>
        <input type="number" class="form-control" name="age" value="<?php  echo $_SESSION["age"]; ?>"/>
        <h3>Ce fel de client esti?</h3>
        <select name="tipclient" class="form-control">
          <option value="-1">----</option>
          <option value="2" <?php if($_SESSION['tipclient']== "2"){ echo "selected";}?> >Fidel</option>
      	  <option value="1" <?php if($_SESSION['tipclient']== "1"){ echo "selected";}?>>Nou</option>
      	  <option value="0" <?php if($_SESSION['tipclient']== "0"){ echo "selected";}?>>Vechi</option>
        </select>
        <br><br>
        <input type="submit" value="Next" class="btn-lg btn-primary" name="submit" />	
    </form>
</div>

	<?php 
      function validate_fields(){
		
		$error_msg = array();
		
  	    if (!isset($_POST['fullName'])){
		  $error_msg[] = "Campul de nume nedefinit!";
	    } else if(isset($_POST['fullName'])){
		  $name = trim($_POST['fullName']);
		  if (empty($name)){
			$error_msg[] = "Campul de nume este gol!";
		  }else if(strlen($name) >  128){
			$error_msg[] = "Nume prea lung!";
		  }else {
			$_SESSION['name'] = $_POST['fullName'];
	   	  }
	    }
	  
  	    if (isset($_POST['age'])){
		  $age = $_POST['age'];
		  if (empty($age)){
			$error_msg[] = "The age field is empty";
    	  }else if (!is_numeric($age)){//check if number
			$error_msg[] = "The age field should contain numbers only!";
		  } else if ($age <= 0){
			$error_msg[] = "Please, the age should be greater than 0!";
		  } else {
			$_SESSION['age'] = $_POST['age'];
		  }
	    }

        if ((isSet($_POST['tipclient'])) && ($_POST['tipclient']>=0)) { 
   		  $_SESSION['tipclient'] = $_POST['tipclient'];
	    }else {
		  $error_msg[] = "Te rugam sa nu lasi campul Tip Client necompletat!";	
	    }

		return $error_msg;
      } 
	  
    ?>

  </body>
</html>

