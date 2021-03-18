<?php
  session_start();

  $aPurchases = array();
  array_push($aPurchases, 'Ecler');
  array_push($aPurchases, 'Prajitura cu mere');
  array_push($aPurchases, 'Cheese cake');
  array_push($aPurchases, 'Tort aniversar');
  array_push($aPurchases, 'Tort de nunta');
  array_push($aPurchases, 'Saleuri');
  array_push($aPurchases, 'Savarina');
  array_push($aPurchases, 'Dobos');

  $purchasesSelect = array();
  if (isset($_SESSION['purchases']))
  {
    foreach ($_SESSION['purchases'] as $key=>$value){
      $tmp = array();
      $tmp['key']   = $key;
      $tmp['value'] = $aPurchases[$key];
      array_push($purchasesSelect, $tmp);
      unset($tmp);
    }
  }

  function ClearSection($purchasesSelect){
    if (isset($_SESSION["name"])){  
      unset($_SESSION['name']);
    }
    if (isset($_SESSION["age"])){  
      unset($_SESSION["age"]);
    }

    if (isset($_SESSION["tipclient"])){ 
      unset($_SESSION["age"]);
    }

    if (isset($_SESSION["howPurchased"])){ 
      unset($_SESSION["howPurchased"]);
    } 

    foreach($purchasesSelect as $v){
      if (isset($_SESSION["satisfaction".$v['key']])){
        unset($_SESSION["satisfaction".$v['key']]);
      }

      if (isset($_SESSION["recommend".$v['key']])){
        unset($_SESSION["recommend".$v['key']]);
      }
    }


       


  }
  function GetNameGlobal(){
    $aux = "";
    if (isset($_SESSION["name"])){  
        $aux = $_SESSION["name"];
    }
    return $aux;
  }

  function GetAgeGlobal(){
    $aux = "";  
    if (isset($_SESSION["age"])){  
        $aux = $_SESSION["age"];
    }
    return $aux;
  }

  function GetStudentGlobal(){
    $aux = "-";  
    if (isset($_SESSION["tipclient"])){  
      if($_SESSION['tipclient']== "0"){ $aux = "Vechi";}
      else if($_SESSION['tipclient']== "1"){ $aux = "Nou";}
      else if($_SESSION['tipclient']== "2"){ $aux = "Fidel";}
    }
    return $aux;
  }

  function GetStudentGlobalChar(){
    $aux = "-";  
    if (isset($_SESSION["tipclient"])){  
      $aux = $_SESSION['tipclient'];
    }
    return $aux;
  }

  function GetHowPurchasedGlobal(){
    $aux = "-";  
    if (isset($_SESSION["howPurchased"])){  
      switch($_SESSION["howPurchased"]){
          case "online":
              $aux = "Online";
              break;
          case "phone":
              $aux = "Prin telefon";
              break;
          case "apps":
              $aux = "Aplicatie mobila";
              break;
          case "store":
              $aux = "Din magazin";
              break;
          case "mail":
              $aux = "Prin mail";
              break;   
          default: 
              $aux = "";
              break;
        }
      }
    return $aux;
  }

  function GetArrayPurchaseGlobal($purchasesSelect,$aPurchases){
      $aux_PurchaseGlobal = array();
      foreach($purchasesSelect as $v){
        $tmp = array();
        $tmp['key']   = $v['key'];
        $tmp['value'] = $aPurchases[$v['key']];
        $tmp['satisfaction'] = 0;
        if (isset($_SESSION["satisfaction".$v['key']])){
          $tmp['satisfaction'] = $_SESSION["satisfaction".$v['key']];
        } 
        $tmp['recommend'] = "";
        if (isset($_SESSION["recommend".$v['key']])){
           switch( $_SESSION["recommend".$v['key']]){
            case "1":
              $aux = "Da";
              break;
            case "2":
              $aux = "Poate";
              break;
             case "3":
              $aux = "Nu";
              break;               
            default: 
              $aux = "";
              break;
            }
            $tmp['recommend'] = $aux;
        }      
        array_push($aux_PurchaseGlobal, $tmp);
        unset($tmp); 
      }
      return $aux_PurchaseGlobal; 
  }

  
  /*Retrieve erro message*/
  function display_error($error_msg){
    echo "<p>\n";
    foreach($error_msg as $v){
    echo $v."<br>\n";
    }
    echo "</p>\n";
  } 



