<?php
session_start();
$conn = mysqli_connect('localhost:3306','root','root','todo_app');
$id = $_SESSION['userid'];
$s = "SELECT * FROM note_list WHERE user_id = '$id'";
$query = mysqli_query($conn,$s);
$notes = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['delete_notes'])) {
  $noteid = $_POST['noteid'];
  
  $d = "DELETE FROM note_list WHERE note_item_id = '$noteid'";
  $query = mysqli_query($conn,$d);
  
  if (!$query) {
    echo 'ERROR QUERY: ' . mysqli_error($conn);
  } else{
    header('location: notes.php');
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
      <a class="addBtn" href="addnotes.php">Add Notes</a>
      <a href="action.php?action=logout">Log Out</a>
    </nav>
    
    <div class="notes-container">
      <div class="notes-content">
        <?php foreach ($notes as $note): ?>
          <div class="note-item">
            <h1>Note</h1>
            <p><?php echo $note['note_item'] ?></p>
            <div class="note-buttons">
              <form action="notes.php" method="POST" accept-charset="utf-8">
                <a href="updatenotes.php"><i class="fas fa-edit"></i></a>
                <input type="hidden" name="noteid" id="" value="<?php echo $note['note_item_id'] ?>" />
                <button type="submit" name="delete_notes"><i class="far fa-trash-alt"></i></button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    
    <div class="bottom-nav">
      <div class="bottom-a covid-tracker"><a href="covid.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-shield-virus"></i></a></div>
      <div class="bottom-a todo-list"><a href="home.php"><i class="fas fa-plus-circle"></i></a></div>
      <div class="bottom-a add-notes"><a href="notes.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-clipboard"></i></a></div>
    </div>
    
  </body>
</html>