<?php
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

      /*echo "Company Name :";echo "<br>";
      echo $_POST['company'];echo "<br>";echo "<br>";

      echo "List Of Firstname :";echo "<br>";
      echo $list_of_firstname;echo "<br>";echo "<br>";

      echo "List Of Lastname :";echo "<br>";
      echo $list_of_lastname;echo "<br>";echo "<br>";

      echo "List Of Mobile No. :";echo "<br>";
      echo $list_of_mobile_no;echo "<br>";echo "<br>";*/

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
            echo "Organization Registered";
      }else{
          /*echo "<script>location='index.php'</script>"; */ 
      }

?>

<br><br>
<button onclick="window.location.href='import_excel.php'">Back</button>