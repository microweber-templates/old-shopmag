<?php

/*

type: layout

name: Latest products

position: 5

*/

?>

<div class="nodrop safe-mode edit" field="layout-skin-5-<?php print $params['id'] ?>" rel="module">
    <div class="mw-wrapper content-holder">
        <p class="element"><br></p>

        <div class="mw-row heading-row">
            <div class="mw-col">
                <div class="mw-col-container">
                    <hr>
                </div>
            </div>

            <div class="mw-col">
                <div class="mw-col-container">
                    <h2>Latest products</h2>
                </div>
            </div>

            <div class="mw-col">
                <div class="mw-col-container">
                    <hr>
                </div>
            </div>
        </div>

        <div class="item-box pad">
            <module type="shop/products" hide_paging="true" data-show="thumbnail,title,price"/>
        </div>
    </div>
</div>