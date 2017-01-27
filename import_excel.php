<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
<style type="text/css">

</style>
<script src='https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.12/xlsx.core.min.js'></script>

</head>
<body style="text-align:center">

<img src="vz_title.png" style="transform:scale(0.7);margin-left:2%"></img>
<?php

if(isset($_POST['reg_org'])){
      $list_of_firstname="";
      $list_of_lastname="";
      $list_of_mobile_no="";

      for($i=0;$i<count($_POST['firstname']);$i++){
        $list_of_firstname= $list_of_firstname.",".$_POST['firstname'][$i];
      }

      for($j=0;$j<count($_POST['lastname']);$j++){
        $list_of_lastname= $list_of_lastname.",".$_POST['lastname'][$j];
      }

      for($k=0;$k<count($_POST['mobile']);$k++){
        $list_of_mobile_no= $list_of_mobile_no.",".$_POST['mobile'][$k];
      }

      $list_of_firstname = ltrim($list_of_firstname, ',');
      $list_of_lastname = ltrim($list_of_lastname, ',');
      $list_of_mobile_no = ltrim($list_of_mobile_no, ',');

      $url_reg_org = 'http://staging-vzcards-api.herokuapp.com/register_organization';
      $options_reg_org = array(
        'http' => array(
          'header'  => array(
                        'LIST-OF-PHONE-NOS: '.$list_of_mobile_no,
                        'LIST-OF-FIRSTNAME: '.$list_of_firstname,
                        'LIST-OF-LASTNAME: '.$list_of_lastname,
                        'COMPANY: '.$_POST['company'],
                      ),
          'method'  => 'GET',
        ),
      );
      $context_reg_org = stream_context_create($options_reg_org);
      $output_reg_org = file_get_contents($url_reg_org, false,$context_reg_org);
      /*echo $output_check;*/
      $arr_reg_org = json_decode($output_reg_org,true);
      /*echo $arr_check;*/

      if($arr_reg_org[0]['status'] == 200){
            $message="Organization Registered";
      }else{
          /*echo "<script>location='index.php'</script>"; */ 
      }
}
?>


<script type="text/javascript">
function validate(){
    var inp = document.getElementById('readfile');
    if(inp.files.length === 0){
        alert("Please import a file");
        inp.focus();

        return false;
    }
}
</script>
<script>
    function loadFile(event) {
        alasql('SELECT * FROM FILE(?,{headers:true})',[event],function(data){
            console.log(data);
            fname="";
            lname="";
            phone="";
            for (i = 0; i < data.length; i++) { 
                fname=fname.concat((",").concat(data[i]['fname']));
                lname=lname.concat((",").concat(data[i]['lname']));
                phone=phone.concat((",").concat(data[i]['phone']));
            }

            fname=fname.substring(1, fname.length);
            lname=lname.substring(1, lname.length);
            phone=phone.substring(1, phone.length);

            console.log(fname);
            console.log(lname);
            console.log(phone);


            document.getElementById("firstname[]").value = fname;
            document.getElementById("lastname[]").value = lname;
            document.getElementById("mobile[]").value = phone;
        });
     }
</script>

<h4 style="color:green"><?php echo $message ?></h4>

<form id="import_form" name="import_form" method="post" action="import_excel.php">
          <br>
          <label >Company</label>
          <br>
          <input type="text" value="" name="company" required/>

          <input type="hidden" name="firstname[]" id="firstname[]" required></td>
          <input type="hidden" name="lastname[]" id="lastname[]" required></td>
          <input type="hidden" name="mobile[]" id="mobile[]" required></td>
    
</form>


<p>Excel file</p>
<input style="margin-left:6%" id="readfile" type="file" onchange="loadFile(event)" required/>

<br><br>
<button id="reg_org" style="background-color:green;color:white;height:30px" form="import_form" onclick="validate()" name="reg_org" type="submit">Register Organization</button>

<br><br><br><br>
<button style="background-color:red;color:white;height:30px" onclick="window.location.href='delete_org.php'">Delete Organization</button>
<br><br>

</body>
</html>