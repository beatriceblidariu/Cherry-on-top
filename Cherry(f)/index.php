
<html>
  <head>
   <title>Cherry on top! </title>
    <link rel="stylesheet" href="css/test.css">
  </head>
<body>



  <nav >
  <a href="index.php">ACASA</a>
  <a href="pag/booking.html">REZERVARI</a>
  <div class="dropdown">
    <a href="pag/poze.html">MENIU</a> 
        <div class="dropdown-content">
          <a href="vinuri/index.html">Recomandari Vinuri</a>
          <a href="prajituri/index.html">Recomandari Prajituri</a>
        </div>
    </div>
  <a href="pag/Comenzi.html">COMENZI</a> 

  


   <div class="dropdown">
    <a href="#" class="drop">RETETE</a>
      <div class="dropdown-content">
          <a href="pag/cookie.html">Cookies</a>
          <a href="pag/brownie.html">Brownies</a>
          <a href="pag/papanasi.html">Papanasi</a>
        </div>
 </div>
  <a href="login-register/register.php">AUTENTIFICARE</a>
  <a href="login-register/login.php">LOGIN</a>
  <a href="pag/contact.html">CONTACT</a>
     <div id="indicator"></div>
</nav>

   <?php
     include "poll/helper.php";
     if (isSet($_POST["start"])) {
       ClearSection($purchasesSelect);
		   header("Location: poll/survey1.php");
	   }
   ?>

	 <form method="POST"  action="./index.php">
	   <input type="submit" class="btn-lg btn-primary" class="button" name="start" value="Spune-ne parerea ta!" />
     </form>


     <a  href="php/login2.php"><button class="btn-lg btn-primary" >ad</button></a>
  </body>
</html>
