<div class="w3-container  w3-pale-blue w3-border w3-border-light-blue w3-round-large w3-display-container" style="margin:auto;margin-top:20px;margin-bottom:10px; border-width:5px !important;">
    <h2 class="w3-center w3-margin w3-text-dark-gray"><b><?php echo $title; ?></b></h2>
    <a onclick="location.href='/viewpost?postid=<?php echo $postid;?>'" style="font-size:35px; cursor:pointer;" class="w3-margin w3-text-orange w3-margin w3-display-topleft fa fa-arrow-right"></a>
    <?php if(strtoupper($_SESSION['user'])==strtoupper($owner)){ ?>
    <div class="w3-display-topright w3-display-container w3-container w3-margin" style="height:30px;width:80px;">
        <form method="POST" id="form<?php echo $postid;?>" action="/">
            <input type="hidden" name="page" value="tryDelete">
            <input type="hidden" name="nextpg" value="<?php echo $nextpg;?>">
            <input type="hidden" name="postID" value="<?php echo $postid; ?>">
            <a onclick="document.getElementById('form<?php echo $postid; ?>').submit();" class="w3-display-right fa fa-trash w3-text-red" style="cursor:pointer;font-size:35px;"></a>
        </form>
        <!--<form method="POST" id="form<?php echo $postid;?>Edit" action="/">
            <input type="hidden" name="page" value="tryEdit">
            <input type="hidden" name="nextpg" value="<?php echo $nextpg;?>">
            <input type="hidden" name="postID" value="<?php echo $postid; ?>">
            <a onclick="document.getElementById('form<?php echo $postid; ?>Edit').submit();" class="w3-display-left fa fa-edit w3-text-orange" style="cursor:pointer;font-size:35px; padding-top:4px;"></a>
        </form>-->
    </div>
    <?php } ?>

    <h3 class="w3-center w3-margin w3-text-gray">Publisher: <b><?php echo $owner; ?></b></h3>
    <div style="width:80%;margin:auto;">
        <h4><b>Short description</b></h4>
        <!--<textarea readonly class="w3-container w3-light-gray w3-border w3-border-light-blue w3-round-large" style="font-size:17px; height:32px; width:100%; border-width:3px !important;resize:none;"></textarea>
    -->
        <p style="max-width:100%; text-align: justify;" class="w3-text-gray"><?php echo $shortd; ?></p>
    
    </div>
    <div style="width:80%; margin:auto; margin-bottom:20px;">
        <h4><b>Content</b></h4>
        <!--<textarea readonly class="w3-container w3-light-gray w3-border w3-border-light-blue w3-round-large" style="font-size:17px; width:100%; height:100px; border-width:3px !important;resize:none;"></textarea>
    -->
        <p style="max-width:100%; text-align: justify;" class="w3-text-gray"><?php echo $longd; ?></p>
    </div>
    <!--<div style="width:100%; height:70px;" class="w3-display-container">
        <button onclick="location.href='/viewpost?postid=<?php echo $postid;?>'" class="w3-button w3-round-large w3-border w3-khaki w3-border-orange w3-display-middle" style="margin: 0px auto;width:110px;cursor:pointer;border-width:3px !important;">
            View Post
        </button>
    </div>-->
</div>
