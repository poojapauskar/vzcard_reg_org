<!DOCTYPE html>
<html>
<body>

<?php
echo "Company : ".$_POST['company']; echo "<br>";
echo "Number Of Users :".$_POST['no_of_users'];echo "<br>";

?>

<form method="post" action="organization3.php">
          <br>
          <input type="hidden" value="<?php echo $_POST['company']; ?>" name="company"/>
          <input type="hidden" value="<?php echo $_POST['no_of_users']; ?>" name="number_of_users"/>

          <table id="users">
          <tr>
              <td><label for="firstname" >FirtsName</label></td>
              <td><label for="lastname" >LastName</label></td>
              <td><label for="lastname" >Mobile</label></td>
          </tr>

          <?php for($i=0;$i<$_POST['no_of_users'];$i++){?>
            <tr>
                <td><input type="text" name="firstname[]" required></td>
                <td><input type="text" name="lastname[]"  required></td>
                <td><input type="text" pattern="[0-9]{11,14}" title="Enter country code. Phone number must be entered in the format: '919999999'." name="mobile[]"  required></td>
            </tr>
          <?php }?>
        </table>

    <button type="submit">Register Organization</button>
</form>



</body>
</html>