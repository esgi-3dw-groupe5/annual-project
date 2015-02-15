
<?php

require('../config.php');
$source = $config['include_path'];

require_once($source."/controller/accessControl.php");
require_once($source."/pp_admin/controller/adminController.php");
require_once($source."/controller/articleController.php");
require_once($source."/controller/corePHP.php");


secure_admin();

$comment = get_param('comment', '');
$category = get_param('category', '');
$article = get_param('article', '');
$id = get_param('id', '');
$edit = get_param('edit', '');
$update = get_param('update', '');
$delete = get_param('delete', '');

require_once($source."/pp_admin/template/index.tpl");
if($category != '');
{	
	echo  $category;
    render_contents('articlesbytag'); 
}
if($article != '' &&  $update == "true")
{
     render_contents('updatearticle'); 
}
if($comment != '' && $delete  == "delete")
{	
    render_contents('deletecomment'); 
}
else if($article != '' && $delete  == "delete")
{	
    render_contents('deletearticle'); 
}
else if( $delete == 'delete' && $id != '')
{	
    render_contents('deleteuser');                         
} 
else if( $edit == "edit" && $id != '')
{	
    render_contents('editusers');                        
}
else if($article != '' &&  $edit == "edit")
{
     render_contents('editarticle');
}else include($source."/pp_admin/template/content.tpl");



?>
