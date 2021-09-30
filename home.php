<?php 
  session_start();
  $conn = mysqli_connect('localhost:3306','root','root','todo_app');
  $id = $_SESSION['userid'];
  if (isset($_POST['add_item'])) {
    $item = $_POST['todo_item'];
    $option = $_POST['todo_option'];
    $userid = $_POST['user_id'];
    
    if (!empty($item)) {
      $i = "INSERT INTO todo_list(user_id,todo_item,todo_option) VALUES('$userid','$item','$option')";
      if (mysqli_query($conn,$i)) {
        echo '<script>alert("Add Item Successfully")</script>';
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
    <title>Todo App - HOME PAGE</title>
    <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    
    <nav>
      <h3><?php echo $_SESSION['username']; ?></h3>
      <a href="action.php?action=logout">Log Out</a>
    </nav>
    
    <div class="todo-container">
      <div class="todo-form">
        <h1>Todo List</h1>
        <form action="home.php" method="POST" accept-charset="utf-8">
          <input type="text" name="todo_item" id="todo-item" value="" placeholder="Add Item"/>
          <select name="todo_option" id="todo-option">
            <option value="To Do">To do</option>
            <option value="Doing">Doing</option>
          </select>
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>">
          <input type="submit" name="add_item" id="add-item" value="Submit">
        </form>
      </div>
      
      <div class="item-container">
        <?php 
        $s = "SELECT * FROM todo_list WHERE user_id = '$id'";
        $query = mysqli_query($conn,$s);
        $items = mysqli_fetch_all($query, MYSQLI_ASSOC);
        ?>
        
        <?php foreach ($items as $item) { ?>
        
          <div class="item">
            <h5><?php echo mysqli_real_escape_string($conn,$item['todo_item']); ?></h5>
            <form action="action.php" method="POST">
              <input type="hidden" name="item_id" value="<?php echo $item['todo_item_id']; ?>">
              <select onchange="this.form.submit()" name="todo_option" class="todo-option">
                <option class="option-value" value="<?php echo $item['todo_option'];?>"><?php echo $item['todo_option'] ?></option>
                <option value="To do">To do</option>
                <option value="Doing">Doing</option>
                <option value="Done">Done</option>
                
              </select>
              <button type="submit" name="delete_item"><i class="far fa-trash-alt"></i></button>
            </form>
          </div>
        <?php } ?>
        
      </div>
    </div>
    <div class="bottom-nav">
      <div class="bottom-a covid-tracker"><a href="covid.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-shield-virus"></i></a></div>
      <div class="bottom-a todo-list"><a href="home.php"><i class="fas fa-plus-circle"></i></a></div>
      <div class="bottom-a add-notes"><a href="notes.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-clipboard"></i></a></div>
    </div>
    <script src="js/home.js"></script>
  </body>
</html>