
<html>
  <head>
    <title> Summary</title>
    

     <link rel="stylesheet" href="../css/test.css">
  </head>
  <?php

    include "helper.php";
    $PurchaseGlobal = GetArrayPurchaseGlobal($purchasesSelect,$aPurchases);
    
    if (isset($_POST["save"])) {
  	  header("Location: ../index.php");
    }
    
  ?>
  <body>
  <nav>
   <a href="../index.php">ACASA</a>
 <a href="../pag/booking.html">REZERVARI</a>
  <a href="../pag/Comenzi.html">COMENZI</a>
  <a href="#">MENIU</a> 
  <div class="dropdown">
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

    <table class="table table-bordered">
	  <tr class="bg-primary">
	  	<td class="bg-primary" colspan="2" align="Center">Sumar</td>
	  </tr>

      <tr class="bg-primary">
	  	<td colspan="2" align="Center">Partea 1</td>
	  </tr>

	  <tr>
	  	<td>Nume</td>
	  	<td><?php  echo  GetNameGlobal()?></td>
	  </tr>
	  <tr>
	  	<td>Varsta</td>
	  	<td><?php  echo GetAgeGlobal(); ?></td>
  
	  </tr>
	  <tr>
		<td>Tip Client</td>
        <td>
          <?php echo GetStudentGlobal();?> 
        </td>
	  </tr>

      <tr>
		<td class="bg-primary" colspan="2" align="Center">Partea 2</td>
	  </tr>  
      <tr>
		<td>Metoda de completare</td>
		<td><?php  echo  GetHowPurchasedGlobal()?></td>
	  </tr>

      <tr>
		<td>Produsul ales</td>
        <td>
        <?php
          foreach($PurchaseGlobal as $v){
        ?>
		  <?php echo $v['value'] ; ?>
          <br>
        <?php } 
        ?>
        </td>
	  </tr>
    
      <tr>
	    <td class="bg-primary" colspan="2" align="Center">Partea 3</td>
        <?php
          foreach($PurchaseGlobal as $v){
        ?>      
        <tr>
          <td colspan="2" align="Center"><?php echo $v['value'] ; ?></td> 
        </tr>  
        
        <tr>
	  	<td>Multumit?</td>
          <td><?php echo $v['satisfaction'] ; ?></td>
	    </tr>
        <tr>
	  	<td>Recomandari prietenilor?</td>
          <td><?php echo $v['recommend'] ; ?></td>
	    </tr> 
        <?php } 
        ?>
	  </tr>
    </table>

    <br>
    <form method="POST" action="summary.php">
    
      <input type="submit" value="Save" class="btn-lg btn-primary"   name="save" />
    </form>
  </body>
</html>