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