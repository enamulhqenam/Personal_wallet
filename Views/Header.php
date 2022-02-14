<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWM</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color:lightseagreen;
            width: 100%;
            height: 100px;
            position: fixed;
           
        }

        .navbar ul {
            display: flex;
            list-style: none;
            float: right;
            margin-right:50px;
        }

        .navbar ul li {
            padding-top:35px;
            padding-left: 20px;
        }
        .navbar ul li a {
            text-decoration: none;
            font-size: 20px;
            color: whitesmoke;
        }
   
        .dropbtn {
            background-color:lightseagreen;
            color: white;
            padding: 16px;
            font-size: 20px;
            border: none;
            margin-left: 10px;
        }

        .dropdown{
            position:relative;
            display: inline-block;
            padding-top:20px;
        }
        .drop_content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;

        }
        .drop_content a{
            color:black;
            padding: 12px 16px ;
            text-decoration: none;
            display: block;
        }
        .drop_content a:hover {background-color: #ddd;}

        .dropdown:hover .drop_content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .header{
            margin-left:700px;
            margin-top: 120px;
        }
        .header .h1{
            font-size: 30px;
            font-weight: bolder;
            padding-right:10px;
            padding-left:10px;
            text-transform: uppercase;
            font-family: monospace;
        }
        .header .h2{
            font-size: 25px;
            font-weight: bolder;
            padding-right:10px;
            padding-left:10px;
            text-transform: uppercase;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">HOME</a></li>

            <li><a href="index.php?view=Income">INCOME</a></li>

            <li><a href="index.php?view=IncomeCetagory">INCOME CETAGORY</a></li>
            
            <li><a href="index.php?view=Expence">EXPENCE</a></li>

            <li><a href="index.php?view=ExpenceCetagory">EXPENCE CETAGORY</a></li>

            <div class="dropdown">
                <button class="dropbtn">Report</button>
            <div class="drop_content">
                <a href="index.php?view=IncomeReport" >Income Report </a>
                <a href="index.php?view=ExpenceReport" >Expence Report</a>
                <a href="index.php?view=TotalReport" >Total Report</a>
            </div>
            </div>

            <li><a href="index.php?view=Logout">Logout</a></li>
        </ul>
    </div>


    <hr>
    <div class="header">
  <span class="h1">Welcome</span><span class="h2">To</span><span class="h1">Personal Wellat Manager</span>
    </div>
