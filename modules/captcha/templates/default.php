<?php

/*

type: layout

name: Default

description: Default comments template

*/;


?>

<div class="mw-ui-col">
    <div class="mw-captcha-image-holder">
        <a href="javascript:;" class="tip" data-tip="Refresh captcha" data-tipposition="top-center">
            <img onclick="mw.tools.refresh_image(this);" class="mw-captcha-img" id="captcha-<?php print $form_id; ?>" src="<?php print api_link('captcha') ?>"/>
        </a>
    </div>
</div>

<div class="mw-ui-col">
    <input type="text" placeholder="<?php _e("Enter the text"); ?>" class="mw-ui-field" autocomplete="off" name="captcha">
</div>