<div class="w3-col l3 m2 s1"><br></div>
<div class="w3-col l6 m8 s10">
    <h1 class="w3-center"><b>Group <?php echo $_POST['groupId']?></b></h1>
    <div class="w3-row">
        <div class="w3-col l1 m1 s0"><br></div>
        <div class="w3-col l10 m10 s12">
            <div class="w3-container w3-round-large w3-light-gray w3-border w3-border-gray" style="border-width: 6px !important;margin-top:20px;">
                
                <?php 
                    include_once $_SERVER["DOCUMENT_ROOT"]."./func/groups.php";
                    showMessages();
                ?>
                
            </div>
            <div class="w3-container w3-round-large w3-pale-blue w3-border w3-border-light-blue" style="border-width: 6px !important;margin-top:20px;margin-bottom:20px;">
                <form method="POST" action="/index.php?page=joinChat">
                    <input type="hidden" name="groupId" value="<?php echo $_POST['groupId']; ?>">
                    <input type="hidden" name="sendMessage" value="true">
                    <h3 class="w3-center w3-margin"><b>Send a message</b></h3>
                    <div class="w3-container w3-margin">
                        <textarea style="resize: none;" name="message" rows="3" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" required type="text"></textarea>
                    </div>
                    <div class="w3-container w3-center" style="margin-top:30px;margin-bottom:20px;">
                        <button class="w3-round-large w3-button w3-light-blue w3-hover-gray w3-border w3-border-light-blue w3-hover-border-dark-gray"  type="submit" style="font-size:17px; border-width: 3px !important;"><b>Send</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>