<?php

/*

type: layout
content_type: dynamic
name: Shop
is_shop: y
description: Shop Layout
position: 3
*/


?>
<?php include TEMPLATE_DIR. "header.php"; ?>

<div class="mw-wrapper content-holder">
  <div class="edit" rel="page" field="content">
        <div class="mw-ui-row" style="width:100%;margin-bottom: 20px;">
            <div class="mw-ui-col" style="width: 50%;">
              <div class="mw-ui-col-container">
                  <div class="mw-breadcrumb-root"><module type="breadcrumb"></div>
              </div>
            </div>

            <div class="mw-ui-col" style="width: 50%" >
                <div class="mw-col-ui-container">
                    <module type="categories" template="dropdown" class="pull-right" />
                    <label class="mw-clabel">Categories</label>
                </div>
            </div>
        </div>
        <div class="item-box pad2"><module type="shop/products" template="shopmag" limit="18" description-length="70" data-show="thumbnail,title,add_to_cart,price" /></div>
  </div>
</div>



<?php include TEMPLATE_DIR. "footer.php"; ?>
