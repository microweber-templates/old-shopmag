<?php 

$cat_id = CATEGORY_ID;

if(isset($params['category-id'])){
$cat_id = intval($params['category-id']);	
}

$category = get_category_by_id($cat_id);

if(!$category){
return;	
}
 

$pic = get_picture($category['id'],'categories');
	
 

?>

<div class="item-box category-header-item-box <?php if($pic) { ?> category-header-item-box-bg  <?php } ?>" <?php if($pic) { ?> style="background-image:url('<?php print $pic; ?>')" <?php } ?>>
<div class="category-header-item-box-text"><h2><a href="<?php print category_link($category['id']); ?>"><?php print $category['title']; ?></a></h2>
<p><?php print $category['description']; ?></p></div>
</div>
