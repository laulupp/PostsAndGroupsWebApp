<div class="w3-container  w3-pale-blue w3-border w3-border-light-blue w3-round-large w3-display-container" style="margin:auto;margin-top:20px;margin-bottom:10px; border-width:5px !important;">
    <h2 class="w3-center w3-margin w3-text-dark-gray"><b><?php echo $title; ?></b></h2>

    <?php if(strtoupper($_SESSION['user'])==strtoupper($owner)){ ?>
    <form method="POST" id="form<?php echo $postid;?>" action="/">
        <input type="hidden" name="page" value="tryDelete">
        <input type="hidden" name="nextpg" value="<?php echo $nextpg;?>">
        <input type="hidden" name="postID" value="<?php echo $postid; ?>">
        <a onclick="document.getElementById('form<?php echo $postid; ?>').submit();" class="fa fa-trash w3-right w3-text-red w3-display-topright w3-margin" style="cursor:pointer;font-size:35px;"></a>
    </form>
    <?php } ?>

    <h3 class="w3-center w3-margin w3-text-gray">Publisher: <b><?php echo $owner; ?></b></h3>
    <div style="width:80%;margin:auto;">
        <h4 class="w3-text-gray"><b>Short description</b></h4>
        <textarea readonly class="w3-container w3-light-gray w3-border w3-border-light-blue w3-round-large" style="font-size:17px; height:32px; width:100%; border-width:3px !important;resize:none;"><?php echo $shortd; ?></textarea>
    </div>
    <div style="width:80%;margin:auto; margin-bottom:20px;">
        <h4 class="w3-text-gray"><b>Content</b></h4>
        <textarea readonly class="w3-container w3-light-gray w3-border w3-border-light-blue w3-round-large" style="font-size:17px; width:100%; height:100px; border-width:3px !important;resize:none;"><?php echo $longd; ?></textarea>
    </div>
</div>
