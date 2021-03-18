<!DOCTYPE html>

<?php include '../php/login_process.php';?>
<html>
<head>
<link rel="stylesheet"  type="text/css" href="../css/login-style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
    font-family: 'Raleway', sans-serif;
      background:pink;
    border-top-right-radius: 12px;
   	border-top-left-radius: 12px;
	border-bottom-left-radius: 12px;
	border-bottom-right-radius:12px;
	 background: url("../images/background.jpg") no-repeat;
    background-size: cover;
    padding-left:130px;
	padding-right: 130px;
	padding-bottom: 80px;
	padding-top: 80px;
    height: 100em;
    display: block;
	color: #1a253f;
    box-sizing: border-box;
    direction: inherit;
    width: 250px;
}



input[type=text], input[type=password] {
    margin: 20px 0;
    padding: 10px;
    background: transparent;
    border: none;
    outline: none;
    color: #1a253f;
    font-family: 'Raleway', sans-serif;
	border-bottom: 1px solid #fff;
}

.button{
    background: transparent;
    border: 3px solid #fff;
    color:#1a253f;
    font-size: 18px;
}

.button:hover{
    background: #fff;
    color: #000;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}


.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h1><br>Login</h1>
<form action="../php/login_process.php" method="post">
  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" name="username" placeholder="Enter Username"  required>

    <label for="password"><b>Password</b></label>
    <input type="password" name="password"  placeholder="Enter Password" required>
        
    <button class="button" type="submit" name="sub">Login</button>

  </div>

</form>

</body>
</html>
