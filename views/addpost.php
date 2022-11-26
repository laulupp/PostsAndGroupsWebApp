<div class="w3-container w3-display-middle w3-col l4 m6 s10 w3-round-large w3-blue w3-border w3-border-light-blue" style="border-width: 6px !important">
    <form method="POST" action="/">
        <h1 class="w3-center w3-margin"><b>Create a Post</b></h1>
        <div class="w3-container w3-margin">
            <h3 class="w3-text-white"><b>Title</b></h3>
            <input name="title" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" type="text">
        </div>
        <div class="w3-container w3-margin">
            <h3 class="w3-text-white"><b>Short description</b></h3>
            <input name="shortd" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" type="text">
        </div>
        <div class="w3-container w3-margin">
            <h3 class="w3-text-white"><b>Content</b></h3>
            <textarea name="longd" rows="5" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" type="text"></textarea>
            <input type="hidden" name="page" value="tryCreatePost">
        </div>
        <?php if($message !== null && $message !== ""){ ?>
            <div class="w3-container w3-margin w3-center">
                <h4 class="w3-text-red"><b><?php echo $message; ?></b></h4>
            </div>
        <?php } ?>
        <div class="w3-container w3-center" style="margin-top:30px;margin-bottom:20px;">
            <button class="w3-round-large w3-button w3-light-blue w3-hover-gray w3-border w3-border-light-blue w3-hover-border-dark-gray"  type="submit" style="font-size:20px; border-width: 3px !important;"><b>Create Post</b></button>
        </div>
    </form>
</div>