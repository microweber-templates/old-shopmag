<?php

/*

type: layout

name: Slider

position: 1

*/

?>

<div class="nodrop safe-mode edit" field="layout-skin-2-<?php print $params['id'] ?>" rel="module">
    <style>
        .magic-slider, .magic-slider .mw-ui-row-nodrop, .magic-slider .magic-rotator-slide {
            min-height: 650px !important;
        }
    </style>

    <module type="magicslider" />
</div>