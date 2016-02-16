<?php

    $parent = get_option('fromcategory', $params['id']);
	$show_category_header = get_option('show_category_header', $params['id']);

	if($parent == 'current'){
	$parent = CATEGORY_ID;	
	}
	
	 
	
    if(!isset($parent) or $parent == ''){
      $parent = 0;
    }
    $cats = get_categories('order_by=position asc&parent_id=' . $parent);
 

    $module_template = get_option('data-template', $params['id']);

if($module_template != false and $module_template != 'none'){
	$template_file = module_templates( $config['module'], $module_template);
} else {
	if(isset($params['template'])){
			$template_file = module_templates( $config['module'], $params['template']);
	} else {
			$template_file = module_templates( $config['module'], 'default');
	}

}
 $template_file_def = module_templates( $config['module'], 'default');

if(isset($template_file) and is_file($template_file) != false){
 	include($template_file);
} elseif(isset($template_file_def) and is_file($template_file_def) != false){
 	include($template_file_def);
} else {
	print 'No templates found';
}

?>