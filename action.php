<?php
session_start();
$conn = mysqli_connect('localhost:3306','root','root','todo_app');

if ($_GET['action'] == 'logout') {
  $_SESSION['direct'] = false;
  session_unset();
  session_destroy();
  header('location: index.php');
}

if ($_SESSION['username'] == '') {
  mysqli_close($conn);
  header('location: index.php');
}

if (isset($_POST['delete_item'])) {
  $itemid = $_POST['item_id'];
  
  $d = "DELETE FROM todo_list WHERE todo_item_id = '$itemid'";
  $query = mysqli_query($conn,$d);
  
  if (!$query) {
    echo 'ERROR QUERY: ' . mysqli_error($conn);
  } else{
    header('location: home.php');
  }
}

if (isset($_POST['todo_option'])) {
  $itemid = $_POST['item_id'];
  $option = $_POST['todo_option'];
  $u = "UPDATE todo_list SET todo_option = '$option' WHERE todo_item_id = '$itemid'";
  $query = mysqli_query($conn,$u);
  
 if (!$query) {
    echo 'ERROR QUERY: ' . mysqli_error($conn);
  } else{
    header('location: home.php');
  }
}

?>