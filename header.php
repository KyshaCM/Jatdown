<?php

require_once "middleware.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo isset($title) ? $title : 'Jatdown | Home'; ?> </title>
    <style>
        body {
            font-family: 'Caveat', cursive;
            background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .notepad {
            background: #fffbe7;
            width: 1000px;
            height: 600px;
            padding: 20px;
            margin-left: 200px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #d3d3d3;
            position: relative;
        }

        .notepad::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: repeating-linear-gradient(
                0deg,
                #fffbe7,
                #fffbe7 19px,
                #d3d3d3 20px
            );
        }

        .notepad form {
            display: flex;
            flex-direction: column;
        }

        .notepad label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.2em;
        }

        .notepad input,
        .notepad textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-bottom: 2px solid #d3d3d3;
            background: transparent;
            font-size: 1.2em;
            font-family: 'Caveat', cursive;
            resize: none;
        }

        .notepad input:focus,
        .notepad textarea:focus {
            outline: none;
            border-bottom: 2px solid #4caf50;
        }

        .notepad button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            margin-top: 100px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-self: flex-end;
            font-size: 1.2em;
        }

        .notepad button:hover {
            background-color: #45a049;
        }

        .notepad a {
            text-decoration: none;
            color: #4caf50;
            font-size: 1.2em;
            margin-bottom: 15px;
            align-self: flex-start;
        }

        .notepad a:hover {
            text-decoration: underline;
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
            color: #a1cdff;
            text-shadow: #a1cdff;
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
            transition: margin-left .5s;
            margin-right:300px ;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="Directpage.php">My Notes</a>
        <a href="adddiary.html">Make Notes</a>
        <a href="schedule.php">My Schedule</a>
        <a href="#">Done Works</a>
        <a href="logout.php">Log out</a>

    </div>

    <div id="main">
        <h2>Jatdown</h2>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="notepad">