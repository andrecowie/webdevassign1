<!DOCTYPE html>
<html>
  <head>
    <title>Status Posted.</title>
  </head>
  <body>
    <?php
      echo $_POST['statusCode']. $_POST['status'] . $_POST['date'] . $_POST['share'];
      if (!empty($_POST['permissions'])){
        foreach($_POST['permissions'] as $permission) {
            echo $permission;
      }
    }
    ?>
    <a href="./index.php">Homepage</a>
  </body>
</html>
