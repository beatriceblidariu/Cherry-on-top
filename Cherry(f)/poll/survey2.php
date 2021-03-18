
<html>
  <head> 
	<title> Partea 2 </title>
  
<link rel="stylesheet" href="../css/test.css">
   <link rel="stylesheet" href="../css/parere.css">
</head>
  
  <?php 

	include  "helper.php";
    if (!isSet($_SESSION['howPurchased'])) {
		$_SESSION['howPurchased']= "";
	 };

	 if (!isSet($_SESSION['purchases'])) {
		$_SESSION['purchases']= "";
	 };
    
    if (isSet($_POST["submit"])){
  	  $error_msg = validate_buttons();
  
  	  if (count($error_msg) == 0){
  		header("Location: ./survey3.php");
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
  <a href="../pag/contact.html">CONTACT</a>
  <div id="indicator"></div>
</nav>
<div class="formParere">
    <form method="POST" action="survey2.php">
      <h3>Cum ai completat acest formular?</h3>
      <input type="radio"  name="howPurchased" value="online" <?php echo ($_SESSION['howPurchased'] == "online") ? "checked" : null; ?>/>Online
      <br>
      <input type="radio" name="howPurchased" value="phone" <?php echo ($_SESSION['howPurchased'] == "phone") ? "checked" : null; ?>/>Prin telefon
      <br>
      <input type="radio" name="howPurchased" value="app"   <?php echo ($_SESSION['howPurchased'] == "apps") ? "checked" : null; ?>/>Aplicatie mobila
      <br>
      <input type="radio" name="howPurchased" value="store" <?php echo ($_SESSION['howPurchased'] == "store") ? "checked" : null; ?>/>Din magazin
      <br>
      <input type="radio" name="howPurchased" value="mail" <?php echo ($_SESSION['howPurchased'] == "mail") ? "checked" : null; ?>/>Prin mail
      <br>
      
      <h3>Ce produs iti place cel mai mult?</h3>
      <input type="checkbox" name="purchases[0]" <?php echo isSet($_SESSION['purchases'][0]) ? "checked" : null; ?>><?php echo $aPurchases[0]?> </input>
      <br>
      <input type="checkbox" name="purchases[1]" <?php echo isSet($_SESSION['purchases'][1]) ? "checked" : null; ?>><?php echo $aPurchases[1]?> </input>
      <br>
      <input type="checkbox" name="purchases[2]" <?php echo isSet($_SESSION['purchases'][2]) ? "checked" : null; ?>><?php echo $aPurchases[2]?> </input>
      <br>
      <input type="checkbox" name="purchases[3]" <?php echo isSet($_SESSION['purchases'][3]) ? "checked" : null; ?>><?php echo $aPurchases[3]?> </input>
      <br>
      <input type="checkbox" name="purchases[4]" <?php echo isSet($_SESSION['purchases'][4]) ? "checked" : null; ?>><?php echo $aPurchases[4]?> </input>
      <br>
      <input type="checkbox" name="purchases[5]" <?php echo isSet($_SESSION['purchases'][5]) ? "checked" : null; ?>><?php echo $aPurchases[5]?> </input>
      <br>
      <input type="checkbox" name="purchases[6]" <?php echo isSet($_SESSION['purchases'][6]) ? "checked" : null; ?>><?php echo $aPurchases[6]?> </input>
      <br>
      <input type="checkbox" name="purchases[7]" <?php echo isSet($_SESSION['purchases'][7]) ? "checked" : null; ?>><?php echo $aPurchases[7]?> </input>
      <br><br>
      <input type="submit" value="Next" class="btn-lg btn-primary"    name="submit" />
    </form>
</div>
    <?php

      function validate_buttons(){
	    $error_msg = array();
	    if(!isset($_POST['howPurchased'])){ 
	    	$error_msg[] = "Nu ai ales nicio varianta dintre metode."; 	
	    }
	    else{
	    	$_SESSION['howPurchased'] = $_POST['howPurchased'];
	    }
    
	    if(!isset($_POST['purchases'])){ 
	    	$error_msg[] = "Nu ai ales nicio varianta dintre produse."; 
	    }
	    else{
	    	echo $_POST['purchases'];
	    	$_SESSION['purchases'] = $_POST['purchases'];
	    }
	    return $error_msg;
      }
	?>
  </body>
</html>
