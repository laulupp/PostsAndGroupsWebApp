<div id="123" class="w3-container  w3-pale-blue w3-border w3-border-light-blue w3-round-large w3-display-container" style="margin:auto;margin-top:20px;margin-bottom:10px; border-width:5px !important;">
        
        <?php if($isowner) {?>
            <h3 class="w3-display-topright w3-text-pink" style="margin-right:15px;"><b>Owner</b></h3>
        <?php }?>

        <h1 class="w3-center w3-margin w3-text-dark-gray"><b>Group#<?php echo $groupid;?></b></h1>

        <h3 class="w3-center w3-margin w3-text-dark-gray"><b>Invite code : <?php echo $groupkey;?></b></h3>

        <form method="POST" action="/index.php?page=joinChat">
            <input type="hidden" name="groupId" value="<?php echo $groupid; ?>">
            <div class="w3-container w3-center" style="margin-top:30px;margin-bottom:20px;">
                <button class="w3-round-large w3-button w3-light-blue w3-hover-gray w3-border w3-border-light-blue w3-hover-border-dark-gray"  type="submit" style="font-size:20px; border-width: 3px !important;"><b>Click here to join the chat</b></button>
            </div>
        </form>

</div>