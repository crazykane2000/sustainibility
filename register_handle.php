<?php session_start();
  include 'administrator/connection.php';
  include 'administrator/function.php';
  $pdo = new PDO($dsn, $user, $pass, $opt);
  //print_r($_REQUEST);

  try {
      $stmt = $pdo->prepare('SELECT email FROM `users` WHERE `email`="'.$_REQUEST['email'].'"  ORDER BY date DESC ');
  } catch(PDOException $ex) {
      echo "An Error occured!"; 
      print_r($ex->getMessage());
  }

  $stmt->execute();
  $user = $stmt->fetchAll();
  $count = count($user);  
  if($count>0){
    header('Location:register.php?choice=error&value=A User with Either Same Email or Same Transaction Address Already Exist');
    exit();
  }
  if(isset($_REQUEST['register'])){
      //print_r($_REQUEST);
      $table = "users";
      $pass = $_REQUEST['password'];
      $uniq = get_new_address($pass);
      $uniq = json_decode($uniq,true);
      $uniq = $uniq['address'];

      $key_list = "`name`, `email`, `verified`, `password`,`tx_address`";
      $value_list = "'".$_REQUEST['f_name']." ".$_REQUEST['l_name']."',";
      $value_list.="'".$_REQUEST['email']."',";
      $value_list.="'Yes',";
      $value_list.="'".$pass."',";
      $value_list.="'".$uniq."'";
      $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
      add_notification("A New User Created", "admin");
      
      header('Location:index.php?choice=success&value=Added Successfully');
      exit();
    }
?>