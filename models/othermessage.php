<div style="width:100%;" class="w3-container w3-display-container">
    <div class="w3-display-topleft" style="margin-top:30px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="w3-text-gray bi bi-caret-right-fill " viewBox="0 0 16 16">
           <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
        </svg>
    </div>
    <p class="w3-right w3-margin w3-text-gray" style="font-size:12px; margin-top:30px !important;"><?php echo $timestmp;?></p>   
    <div class="w3-container w3-col l5 m8 s9 w3-border w3-border-gray w3-margin w3-round" style="border-width: 4px !important;">
        <p><b><?php echo $messageowner;?></b> wrote :</p>              
        
        <p class="w3-text-gray"><?php echo $message;?></p>
     </div>
</div>