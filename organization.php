<!DOCTYPE html>
<html>
<body>

<form method="post" action="organization2.php">
  Company:<br>
  <input type="text" name="company" required>
  <br>
  Number Of Users:<br>
  <input type="text" name="no_of_users" required>
  <br><br>
  <button type="submit">Submit</button>
</form>

<br><br><br><br>
<button onclick="window.location.href='delete_org.php'">Delete Organization</button>
</body>
</html>