<?php

include("connection.php");


$loggedUsername = $_GET['username'];
$search_text    = $_GET['search'];

$query_restaurant   = "SELECT * FROM restaurent WHERE restaurent.rest_name LIKE '%$search_text%'";
$query_food         = "SELECT * FROM foods WHERE foods.f_name LIKE '%$search_text%'";

$result_restaurent  = mysqli_query($conn,$query_restaurant);
$result_food        = mysqli_query($conn,$query_food);

if(isset($_POST['search_button']))
{
    if(isset($_POST['search_box']))
    {
        $search = $_POST['search_box'];
        header("Location:search.php? username=$loggedUsername & search=$search");
        exit;
    }
}

?>



<html>

    <head>
    
        <title>FOOD BANK</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    
        <style>
            
            /* Navbar */
            
            body
            {
                overflow-x: hidden;
                overflow-y: auto;
            }
            
            #navbar_body 
            { 
                background: linear-gradient(#190A05,#870000); 
                border-color: #222;  
            }
            #brand_header 
            { 
                font-family: 'Julius Sans One';
                color: #fff; 
            }
            #navbar_options
            { 
                font-family: 'Julius Sans One';
                color: #fff; 
                border-style: solid; 
                border-width: 0 0 2px 0; 
                border-color: transparent;
                transition: all 300ms ease;
            }
            #navbar_options:hover
            { 
                color:#fff;
                font-size: 15px;
            }
            #navbar_options:hover,
            #navbar_options:visited,
            #navbar_options:focus,
            #navbar_options:active 
            { 
                background: rgba(0,0,0,0.5); 
            }
            #search_box
            {
                margin-top: 7.5%;
                margin-left: -10%;
                outline: none;
                border-radius: 3px;
                border: 1px solid #222;
                padding-left: 5px;
                padding-right: 5px;
            }
            #search_button
            { 
                outline: none;
                font-family: 'Julius Sans One';
                background: transparent;
                color: #fff; 
                border-style: solid; 
                border-width: 0 0 2px 0; 
                border-color: transparent;
                font-size: 22px;
                margin-left: -5%;
                margin-top: 40%;
                transition: all 300ms ease;
            }
            #table_body
            {
                position: relative;
                background: rgba(0,0,0,0.85);
                border-radius: 50px;
            }
            .table
            {
                width: 90%;
            }
            td
            {
                color: white;
            }
            #navbar_option_button
            {
                background: #222; border-radius: 2px; 
            }
            #navbar_option_button:hover 
            { background: black; }
            
            
            #brand_header
            {
                font-size: 25px;
                font-family: 'Julius Sans One';
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            @-webkit-keyframes neon
            {
                to 
                {
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 70px #fff, 0 0 80px #fff;
                }
            }
            
            /* Navbar */
        
           
            /* Image  Slider*/
            
            .slide1,.slide2,.slide3,.slide4,.slide5,.slide6,.slide7,.slide8,.slide9,.slide10 
            {
                position: fixed;
                bottom: 0%;
                left: 0%;
                height: 100%;
                width: 100%;
                transition: all 1000ms ease;
            }
            .slide1 
            {
                background: url(images/res_1.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade 60s infinite;
                -webkit-animation:fade 60s infinite;
            } 
            .slide2 
            {
                background: url(images/food1.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade2 60s infinite;
                -webkit-animation:fade2 60s infinite;
            }
            .slide3 
            {
                background: url(images/res_2.jpeg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade3 60s infinite;
                -webkit-animation:fade3 60s infinite;
            }
            .slide4 
            {
                background: url(images/food2.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade4 60s infinite;
                -webkit-animation:fade4 60s infinite;
            }
            .slide5 
            {
                background: url(images/res_3.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade5 60s infinite;
                -webkit-animation:fade5 60s infinite;
            }
            .slide6 
            {
                background: url(images/food3.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade6 60s infinite;
                -webkit-animation:fade6 60s infinite;
            }
            .slide7 
            {
                background: url(images/res_4.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade7 60s infinite;
                -webkit-animation:fade7 60s infinite;
            }
            .slide8 
            {
                background: url(images/food4.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade8 60s infinite;
                -webkit-animation:fade8 60s infinite;
            }
            .slide9 
            {
                background: url(images/res_5.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade9 60s infinite;
                -webkit-animation:fade9 60s infinite;
            }
            .slide10 
            {
                background: url(images/food5.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade10 60s infinite;
                -webkit-animation:fade10 60s infinite;
            }
            
            
            @keyframes fade
            {
                0%     {opacity:1}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:1}
            }
            @keyframes fade2
            {
                0%     {opacity:0}
                10%    {opacity:1}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade3
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:1}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade4
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:1}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade5
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:1}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade6
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:1}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade7
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:1}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade8
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:1}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade9
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:1}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade10
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:1}
                100%   {opacity:0}
            }
            
            /* Image  Slider*/
            
            
            /* Footer */
            
            #footer_body
            {
                position: relative;
                background: #222;
                color: white;
                font-family: 'Julius Sans One';
            }
            
            /* Footer */
            
        </style>
        
    </head>

    
    <body>
    
        <!-- Navbar -->
        
        <div>
            <nav id="navbar_body" class="navbar navbar-findcond navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button id="navbar_option_button" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span style="background: #fff;"  class="icon-bar"></span>
                            <span style="background: #fff;" class="icon-bar"></span>
                            <span style="background: #fff;" class="icon-bar"></span>
                        </button>
                        <a id="brand_header" class="navbar-brand" href="food_bank.php?username=<?php echo $loggedUsername?>">FOOD BANK</a>
                    </div>
                    
                    <form style="margin-bottom:0%;" action="" method="post">
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <input placeholder="Search Here..." id="search_box" name="search_box">
                                </li>
                                <li>
                                    <button id="search_button" type="submit" name="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </li>
                                <li>
                                    <a id="navbar_options" href="restaurant.php?username=<?php echo $loggedUsername?>">Restaurant<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a id="navbar_options" href="foods.php?username=<?php echo $loggedUsername?>">Foods<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a id="navbar_options" href="index.php">Log-Out&nbsp;&nbsp;<label style="margin-bottom:0%;font-family:sans-serif;"><?php echo $loggedUsername ?></label><span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        
        <!-- Navbar -->
        
        
        <!-- Image Slider -->
        
        <div class='slider'>
            <div class='slide1'></div>
            <div class='slide2'></div>
            <div class='slide3'></div>
            <div class='slide4'></div>
            <div class='slide5'></div>
            <div class='slide6'></div>
            <div class='slide7'></div>
            <div class='slide8'></div>
            <div class='slide9'></div>
            <div class='slide10'></div>
        </div>
        
        <!-- Image Slider -->
        
        <!-- Search -->
        
        <div class="container">
            <br><br><br><br>
            <div id="table_body">
                <div class="row">
                    <div class="container">
                        <div align="center" style="font-family:'Julius Sans One';color:white;">           <h1>Restaurant</h1><br>
                        </div>
                            <table align="center" style="border:none;border:1px solid white" class="table">
                            <?php if(mysqli_num_rows($result_restaurent) > 0)
                            { ?>
                            <thead style="font-size:20px;">
                                <tr style="background:rgba(255,255,255,0.5);">
                                    <th>Name</th>     
                                    <th>Address</th>
                                    <th>Year</th>
                                    <th></th>
                                    <th>Features</th>
                                    <th>Website</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_assoc($result_restaurent)) { ?>
                                <tr>
                                    <td><?php echo $row['rest_name'] ?></td>
                                    <td><?php echo $row['rest_address'] ?></td>
                                    <td><?php echo $row['est_year'] ?></td>
                                    <td></td>
                                    <td><?php echo $row['rest_feature'] ?></td>
                                    <td><?php echo $row['rest_website'] ?></td>
                                    <td><?php echo $row['rest_email'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <?php  }
                            else
                            { ?>
                                <div align="center">
                                    <h3 style="font-family:'Julius Sans One';color:white;">-- No Result Found --</h3>
                                </div>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <br><br><br><br>
                    <div class="container">
                        <div align="center" style="font-family:'Julius Sans One';color:white;"><h1>Foods</h1><br></div>
                            <table align="center" style="border:none;border:1px solid white" class="table">
                            <?php if(mysqli_num_rows($result_food) > 0)
                            { ?>
                            <thead style="font-size:20px;">
                                <tr style="background:rgba(255,255,255,0.5);">
                                    <th>Name</th>     
                                    <th>Type</th>
                                    <th>Price</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_assoc($result_food)) { ?>
                                <tr>
                                    <td><?php echo $row['f_name'] ?></td>
                                    <td><?php echo $row['f_type'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                            <?php }
                            else
                            { ?>
                                <div align="center">
                                    <h3 style="font-family:'Julius Sans One';color:white;">-- No Result Found --</h3>
                                </div>
                            <?php } ?>
                        </table>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
        
        <!-- Search -->
        
        <!-- Food Body -->
        
        <br><br><br><br><br><br><br><br><br>
        
        <!-- Footer Body -->
        
        <div id="footer_body" align="center" class="row">
            <h1 style="margin-top:2%;margin-bottom:2%;">Piya Prue Marma - 011 142 138</h1>
        </div>
        
        <!-- Footer Body -->
        
    </body>

</html>