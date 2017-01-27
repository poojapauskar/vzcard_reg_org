<!DOCTYPE html>
<html>
<body style="text-align:center">

<img src="vz_title.png" style=";margin-left:2%;transform:scale(0.7)"></img>

<?php

if(isset($_POST['del_btn'])){


$url_del_org = 'http://staging-vzcards-api.herokuapp.com/delete_organization/?access_token=AmmzCgOFAPKeVK8NLgPyUArloU3e2H';
$options_del_org = array(
  'http' => array(
    'header'  => array(
                  'COMPANY: '.$_POST['company'],
                ),
    'method'  => 'GET',
  ),
);
$context_del_org = stream_context_create($options_del_org);
$output_del_org = file_get_contents($url_del_org, false,$context_del_org);
/*echo $output_del_org;*/
$arr_del_org = json_decode($output_del_org,true);
/*echo $arr_check;*/

if($arr_del_org['status'] == 200){
      $message="Organization Deleted";
}else{
    /*echo "<script>location='index.php'</script>"; */ 
}

}
?>

<h4 style="color:green"><?php echo $message ?></h4>

<form method="post" action="delete_org.php">
  Company:<br>
  <input type="text" name="company" required>
  <br><br>
  <button name="del_btn" id="del_btn" style="background-color:red;color:white;height:30px" type="submit">Delete</button>
</form>

<br><br><br><br>
<button style="background-color:blue;color:white;height:30px" onclick="window.location.href='import_excel.php'">Back</button>
</body>
</html>