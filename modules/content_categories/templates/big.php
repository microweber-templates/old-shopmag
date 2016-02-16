<?php

/*

  type: layout

  name: Big

  description: Big



*/

?>
<?php if($show_category_header){ ?>
<module type="categories/header" category-id="<?php print $parent ?>" />
<?php } ?>

<div class="categories-posts categories-posts-big mw-open-module-settings">
  <?php
if($cats != false){
foreach($cats as $cat){
    $latest_product = get_content("order_by=position desc&category=".$cat['id']);
    if(isset($latest_product[0]) == false) { continue; }
    $latest_product = $latest_product[0];
	
	$pic = get_picture($cat['id'],'categories');
	
	if(!$pic){
	$pic = get_picture($latest_product['id']);

	}
	
	
	 
	
?>
  <a href="<?php print category_link($cat['id']);;  ?>"> <span class="bgimg" style="background-image: url(<?php print thumbnail($pic, 1100, 1100); ?>);"></span> <strong><?php print $cat['title']; ?></strong> </a>
  <?php }} else{  print lnotif ('Select category'); } ?>
</div>
