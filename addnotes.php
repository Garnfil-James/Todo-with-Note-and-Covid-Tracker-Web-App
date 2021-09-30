<?php
session_start();
$conn = mysqli_connect('localhost:3306','root','root','todo_app');

if (isset($_POST['add_note'])) {
  $note = $_POST['note'];
  $id = $_POST['userid'];
  
  if (!empty($note)) {
      $i = "INSERT INTO note_list(user_id,note_item) VALUES('$id','$note')";
      if (mysqli_query($conn,$i)) {
        echo '<script>alert("Add Note Successfully")</script>';
      } else{
        echo 'ERROR QUERY: ' . mysqli_error($conn);
      }
   } else{
     echo '<script>alert("The input is empty")</script>';
   } 
  
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App - NOTES PAGE</title>
    <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    
    <nav>
      <h3><?php echo $_SESSION['username']; ?></h3>
      <a href="action.php?action=logout">Log Out</a>
    </nav>
    
    <div class="edit-container">
      <div class="edit-content">
        <form action="addnotes.php" method="POST">
          <textarea name="note" id="note-area" rows="8" cols="40" placeholder="Note..."></textarea>
          <input type="hidden" name="userid" id="" value="<?php echo $_SESSION['userid']; ?>" />
          <button type="submit" name="add_note">Add</button>
        </form>
      </div>
    </div>
    
    <div class="bottom-nav">
      <div class="bottom-a covid-tracker"><a href="covid.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-shield-virus"></i></a></div>
      <div class="bottom-a todo-list"><a href="home.php"><i class="fas fa-plus-circle"></i></a></div>
      <div class="bottom-a add-notes"><a href="notes.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-clipboard"></i></a></div>
    </div>
    
  </body>
</html>