<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Todo App - COVID TRACKER</title>
  <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    
    <div class="tracker-container">
      <h1 class="title">Covid 19 TRACKER - PHILIPPINES</h1>
      <h6 class="date"></h6>
      <span>Fore more info: </span> <a class="doh" href="https://doh.gov.ph/covid-19/case-tracker">DOH PHILIPPINES</a>
      <div class="tracker-content">
        <div class="covid-content">
          <div>
            <h2>Total Confirmed Cases:</h2>
            <h1 class="confirmed-cases"></h1>
          </div>
        </div>
        <div class="covid-content">
          <div>
            <h2>Total Deaths:</h2>
            <h1 class="death"></h1>
          </div>
        </div>
        <div class="covid-content">
          <div>
            <h2>New Cases:</h2>
            <h1 class="new-cases"></h1>
          </div>
        </div>
        <div class="covid-content">
          <div>
            <h2>New Deaths:</h2>
            <h1 class="new-deaths"></h1>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bottom-nav">
      <div class="bottom-a covid-tracker"><a href="covid.php?name=<?php echo $_SESSION['username'] ?>"><i class="fas fa-shield-virus"></i></a></div>
      <div class="bottom-a todo-list"><a href="home.php"><i class="fas fa-plus-circle"></i></a></div>
      <div class="bottom-a add-notes"><a href="notes.php"><i class="fas fa-clipboard"></i></a></div>
    </div>
    
  
  <script src="js/tracker.js"></script>
  </body>