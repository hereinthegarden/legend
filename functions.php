<?php

session_start();

include('conn.php');

if($stmt=$conn->prepare('SELECT id, password FROM accounts WHERE username = ?')){
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();

  $stmt->store_result();

  if($stmt->num_rows > 0){
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    if($_POST['password'] === $password){
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;

      header('Location: index.php');
    }else{
      echo('Incorrect Password !');
      header('refresh:2;url=login.php');
    }
  }else{
    echo('Incorrect Username !');
    header('refresh:2;url=login.php');
  }
  $stmt->close();
}
?>
