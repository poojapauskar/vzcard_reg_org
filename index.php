<!-- http://localhost/foodromeo/sign-up.php -->

<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="admin_login.css">

<script type="text/javascript">

function hide_wait_msg ()
{
    document.getElementById('loadingPleaseWait').style.display = 'none';
}

function show_wait_msg ()
{
     document.getElementById('loadingPleaseWait').style.display = 'block';
}

</script>
</head>
<body onload="hide_wait_msg()" style="text-align:center">

<img src="vz_title.png" style="transform:scale(0.7);margin-left:2%"></img>


<?php

if($_POST['username'] != '' && $_POST['password'] != ''){
  if($_POST['username'] == 'test' && $_POST['password'] == 'bitjini'){
      echo "<script>location='import_excel.php'</script>";
  }

}

?>




<div class="container-fluid"><!-- MAIN CONTAINER Begins -->
    
<div id="loadingPleaseWait"><div><h6>Loading, please wait...</h6></div></div>


<?php /*if($arr2['status']==400 || $arr['status'] == 401){
          $error="Invalid Admin Credentials";
}*/?>



  <div style=";margin-top:5%">   
    <p id="form_title">Admin Console</p>

      <h6 style="color:#F03F32;margin-left:0%"><?php echo $error;?></h6>
 
        <form role="form" action="" method="post">
          <div class="form-group">
            <input type="text" name="username" placeholder="Username" class="form-control" id="name" required/><br>
            <input type="password" name="password" placeholder="Password" class="form-control" id="pwd" required>
          </div>
          
          <br><br>
          <button style="background-color:green;color:white;height:30px" onclick="show_wait_msg()" type="submit" class="btn btn-md round">LOG IN</button>
        </form>
  </div>
</body>
</html>



