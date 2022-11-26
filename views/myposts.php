<?php include_once $_SERVER["DOCUMENT_ROOT"]."/func/posts.php"; ?>
<?php 
if($message!=""){?>
<script>
    const alertHTML = '<div class="alert w3-center w3-padding w3-round-xlarge w3-green" style="width:400px; height:50px; margin:auto; margin-top:20px; font-size:20px;"><b><?php echo $message; ?></b></div>';
    document.body.insertAdjacentHTML('beforeend', alertHTML);
    setTimeout(() => document.querySelector('.alert').classList.add('hide'), 3000);   
</script>
<?php } ?>
<div>
    <div class="w3-col l3 m2 s1"><br></div>
    <div class="w3-col l6 m8 s10">
        <?php showUserPosts($dbC); ?>
    </div>
</div>