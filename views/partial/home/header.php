<!DOCTYPE html>
<head>
    <title>
    <?php
    if(isset($_POST['currentPage'])){
        echo $_POST['currentPage'];
    }
    else{
        echo "App"; 
    }
    ?>
    </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     .hide {
       display: none;
     }
   </style>
    <script>
        function open() {
            document.getElementById("sidebar").style.display = "block";
        }

        function close() {
            document.getElementById("sidebar").style.display = "none";
        }
    </script>
</head>
<body class="w3-light-gray">
    <div class="w3-bar w3-light-blue w3-large w3-border-bottom w3-border-blue">

        <form method="POST" action="/">
            <input type="hidden" name="page" value="home">
            <button type="submit" style="height:64px; vertical-align:center;"; class="w3-left w3-text-white w3-bar-item w3-button w3-light-blue w3-hover-blue"><b>Home</b></button>
        </form>
        <form method="POST" action="/">
            <input type="hidden" name="page" value="addpost">
            <button type="submit" style="height:64px; vertical-align:center;"; class="w3-left w3-text-white w3-bar-item w3-button w3-light-blue w3-hover-blue"><b>Add Post</b></button>
        </form>
        <form method="POST" action="">
            <input type="hidden" name="page" value="myposts">
            <button type="submit" style="height:64px; vertical-align:center;"; class="w3-left w3-text-white w3-bar-item w3-button w3-light-blue w3-hover-blue"><b>My Posts</b></button>
        </form>
        <form method="POST" action="/">
            <input type="hidden" name="page" value="logout">
            <button type="submit"  class="w3-round-large w3-bar-item w3-right w3-button w3-margin w3-blue w3-hover-light-blue w3-border w3-border-blue" style="margin-top:7px !important; margin-bottom: 7px !important; border-width: 3px !important;"><b>Logout</b></button>
        </form>

        <div class="w3-hide-small 3-bar-item w3-right w3-text-white w3-container w3-display-container" style="height:64px; margin-right:20px;">
            <a class="w3-display-middle" style=""><b><?php echo strtoupper($_SESSION['user'][0]); echo substr($_SESSION['user'], 1); ?></b></a>
        </div>
    </div>