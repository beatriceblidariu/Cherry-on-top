
<html>
  <head>
    <title> Survey - Part 3</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/test.css">
   <link rel="stylesheet" href="../css/parere.css">
  </head>
  <?php 
  
    
    include  "helper.php";
  
    if (isSet($_POST["submit"])){
      $error_msg = validate_satisfaction($purchasesSelect);  
      if (count($error_msg) == 0){
       header("Location: ./summary.php");
      }else{
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
    <form method="POST" action="survey3.php">
       <?php
        foreach($purchasesSelect as $v){
      ?>

      <h3><?php echo $v['value'] ; ?></h3><br>
      <label>La o scara de la 1 (nesatisfacut) la 5 (foarte satisfacut) cat de multumit esti de produsul ales?</label><br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="1" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "1")){ echo "checked";}else{echo null;} ?>/> 1<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="2" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "2")){ echo "checked";}else{echo null;} ?>/> 2<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="3" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "3")){ echo "checked";}else{echo null;} ?>/> 3<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="4" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "4")){ echo "checked";}else{echo null;} ?>/> 4<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="5" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "5")){ echo "checked";}else{echo null;} ?>/> 5<br><br>
     
      <label>Ai recomanda acest produs prietenilor?</label><br>
      <select name="recommend<?php echo $v['key'];?>" class="form-control">
        <option value="0">----</option>
        <option value="1"  <?php if (isset($_SESSION["recommend".$v['key']]) && ($_SESSION["recommend".$v['key']] == "1")){ echo "selected";}?>>Da</option>
      	<option value="2"  <?php if (isset($_SESSION["recommend".$v['key']]) && ($_SESSION["recommend".$v['key']] == "2")){ echo "selected";}?>>Poate</option>
      	<option value="3"  <?php if (isset($_SESSION["recommend".$v['key']]) && ($_SESSION["recommend".$v['key']] == "3")){ echo "selected";}?>>Nu</option>
      </select>
      <br><br>
      
      <?php } 
      ?>

      <input type="submit" value="Next" class="btn-lg btn-primary" name="submit" />
    </form>
</div>
    <?php 

     function validate_satisfaction($purchasesSelect){
        $error_msg = array();

        foreach($purchasesSelect as $v){
          if((!empty($_POST["satisfaction".$v['key']]))){
            $_SESSION["satisfaction".$v['key']] = $_POST["satisfaction".$v['key']];
            
          } else {
            $error_msg[] =  "Selecteaza cat de multumit esti de produsul: ".$v['value']."<br/>";
          }

          if((!empty($_POST["recommend".$v['key']])) && 
             (isSet($_POST["recommend".$v['key']])   &&
             ($_POST["recommend".$v['key']]>=0))) {
            $_SESSION["recommend".$v['key']] = $_POST["recommend".$v['key']];
          } else {
            $error_msg[] =  "Selecteaza daca ai recomanda vreunui prieten acest produs: ".$v['value']."<br/>";
          }     
        }

        return $error_msg;
     }

    ?>   
  </body>
</html>
