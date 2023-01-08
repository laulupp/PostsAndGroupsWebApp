<div class="w3-col l3 m2 s1"><br></div>
<div class="w3-col l6 m8 s10">
    <div id="123" class="w3-container  w3-pale-blue w3-border w3-border-light-blue w3-round-large w3-display-container" style="margin:auto;margin-top:20px;margin-bottom:10px; border-width:5px !important;">
        <h1 class="w3-center w3-margin w3-text-dark-gray"><b>Join a group</b></h1>
        <form method="POST" action="/index.php?page=tryJoinGroup">
            <div class="w3-container w3-center">
                <h3 class="w3-text-gray"><b>Please input the group code here :</b></h3>
                <input type="number" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" style="width:200px; margin:auto;" name="groupid" required>
            </div>
            <div class="w3-container w3-center" style="margin-top:30px;margin-bottom:20px;">
                <button class="w3-round-large w3-button w3-light-blue w3-hover-gray w3-border w3-border-light-blue w3-hover-border-dark-gray"  type="submit" style="font-size:20px; border-width: 3px !important;"><b>Join group</b></button>
            </div>
            <?php if($message !== null && $message !== ""){ ?>
                <div class="w3-container w3-margin w3-center">
                    <h4 class="w3-text-red"><b><?php echo $message; ?></b></h4>
                </div>
            <?php } ?>
        </form>

    </div>
</div>