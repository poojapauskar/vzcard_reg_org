<!DOCTYPE html>
<html>
<body>

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
      echo "Organization Deleted";
}else{
    /*echo "<script>location='index.php'</script>"; */ 
}

}
?>

<form method="post" action="delete_org.php">
  Company:<br>
  <input type="text" name="company" required>
  <br><br>
  <button name="del_btn" id="del_btn"  type="submit">Delete</button>
</form>

<br><br><br><br>
<button onclick="window.location.href='organization.php'">Back</button>
</body>
</html>