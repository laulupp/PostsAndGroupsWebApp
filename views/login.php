<div class="w3-container w3-border w3-border-blue w3-pale-blue w3-round-large w3-col s10 m6 l4 w3-display-middle" style="border-width: 3px !important;">
     <form class="w3-container w3-margin" method="POST" action="/">
        <div class="w3-container">
            <h1 class="w3-center w3-text-blue" ><b>Log in</b></h1>
        </div>
        <div class="w3-container w3-margin">
            <h3 class="w3-text-blue"><b>Username</b></h3>
            <input name="username" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" type="text">
        </div>
        <div class="w3-container w3-margin">
            <h3 class="w3-text-blue"><b>Password</b></h3>
            <input name="password" class="w3-input w3-border w3-border-blue w3-round-large w3-opacity" type="password">
            <input type="hidden" name="tryLogin">
        </div>
        <?php if($message !== null && $message !== ""){ ?>
            <div class="w3-container w3-margin w3-center">
                <h4 class="w3-text-red"><b><?php echo $message; ?></b></h4>
            </div>
        <?php } ?>
        <div class="w3-container w3-center" style="margin-top:30px;margin-bottom:20px;">
            <button class="w3-round-large w3-button w3-blue w3-hover-light-blue w3-border w3-border-blue"  type="submit" style="font-size:20px; border-width: 3px !important;"><b>Login</b></button>
        </div>
    </form>
</div>
