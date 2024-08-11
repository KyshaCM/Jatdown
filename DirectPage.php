<?php

require_once "middleware.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<header>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="DiaryPage.php">My Notes</a>
        <a href="DirectPage.html">Make Notes</a>
        <a href="#">My Schedule</a>
        <a href="#">Done Works</a>
        <a href="#">Themes</a>
        <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
      
      </div>
      
      <div id="main">
        <h2>Jatdown</h2>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      </div>
      
      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
      </script>
</header>
<body>
    <form id="diaryForm" action="diary.php" method="post">
        <br>
        <label class="date" for="date">Date:</label>
        <input type="date" id="date" name="date" required>
    
        <label class="title" for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    
        <label for="entry">Diary Entry:</label>
        <textarea id="entry" name="entry" rows="8" required></textarea>
    
        <button type="submit">Save</button>
      </form>

</body>
</html> 

<style>
     /* General body style */
     body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
        }

        /* Sidebar style */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #60608f;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            height: 50px;
            color: #000000;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left 0.5s;
            padding: 16px;
            flex-grow: 1;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        /* Form style */
        form {
            width: 100%;
            height: calc(100% - 32px); /* Adjust for padding in main */
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group div {
            width: 48%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-entry {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .form-entry label {
            margin-bottom: 8px;
        }

        .form-entry textarea {
            flex-grow: 1;
            resize: none;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
</style>