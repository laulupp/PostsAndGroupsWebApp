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
</head>
<body>
    <div class="w3-bar w3-border w3-light-grey">
    <a href="#" class="w3-bar-item w3-button">Home</a>
    <a href="#" class="w3-bar-item w3-button">Link 1</a>
    <a href="#" class="w3-bar-item w3-button">Link 2</a>
    <form method="POST" action="/">
        <input type="hidden" name="page" value="logout">
        <button type="submit" class="w3-bar-item w3-button w3-green w3-right">Logout</button>
    </form>
    </div>