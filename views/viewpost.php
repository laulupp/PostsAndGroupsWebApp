<?php include_once $_SERVER["DOCUMENT_ROOT"]."/func/posts.php"; ?>
<div class="w3-col l3 m2 s1"><br></div>

<div class="w3-col l6 m8 s10">
    <div >
        <?php
        showPostById($dbC, $_GET['postid']);
        ?>
        
    </div>

    <div class="w3-row">
        <div class="w3-col l1 m1 s0"><br></div>
        <div class="w3-container w3-col l10 m10 s12 w3-round-large w3-pale-blue w3-border w3-border-light-blue" style="border-width: 6px !important;margin-top:20px;">
            <form method="POST" action="/index.php?page=tryCreateComment&postid=<?php echo $_GET['postid']?>">
                <h3 class="w3-center w3-margin"><b>Add a comment to this post</b></h3>
                <div class="w3-container w3-margin">
                    <textarea name="comment" rows="3" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" required type="text"></textarea>
                </div>
                <div class="w3-container w3-center" style="margin-top:30px;margin-bottom:20px;">
                    <button class="w3-round-large w3-button w3-light-blue w3-hover-gray w3-border w3-border-light-blue w3-hover-border-dark-gray"  type="submit" style="font-size:17px; border-width: 3px !important;"><b>Add comment</b></button>
                </div>
            </form>
        </div>
    </div>
    <div class="w3-container w3-light-gray w3-round-large w3-border w3-border-gray" style="border-width: 6px !important;margin-top:20px;margin-bottom:20px;">
            <h3 class="w3-center w3-margin"><b>Comments</b></h3>
            <?php
                showCommentsWithId($dbC, $_GET['postid']);
            ?>
    </div>
</div>