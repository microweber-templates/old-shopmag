<?php

/*

type: layout

name: Dropdown

description: Dropdown skin

*/

?>
<?php
    $params['ul_class'] = '';
	$params['ul_class_deep'] = ' ';

    $val = 'Select';

    $cat = get_category_by_id(CATEGORY_ID);
    if($cat != false){
        $val = $cat['title'];
    }

?>
<div class="mw-dropdown mw-dropdown-default w100 categories-dropdown">
  <span class="mw-dropdown-value mw-ui-btn mw-ui-btn-big mw-dropdown-val"><?php print $val; ?></span>
  <div class="mw-dropdown-content">
        <?php  category_tree($params);  ?>
  </div>
</div>
