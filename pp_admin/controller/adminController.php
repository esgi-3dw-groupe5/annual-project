<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/controller/common.php");
require_once(__ROOT__."/controller/accessControl.php");
require_once(__ROOT__."/controller/routeControl.php");
require_once(__ROOT__."/model/dbconnect.php");
require_once(__ROOT__."/model/dbusers.php");
require_once(__ROOT__."/model/dbarticle.php");
require_once(__ROOT__."/model/dbcomment.php");
require_once(__ROOT__."/model/dbcontent.php");
	function render_contents($content){
		$link = db_connect();
		switch ($content) {
			case 'users':
				$result = db_get_all_user($link);

				while ($data = $result -> fetch()) {
					require(__ROOT__.'/pp_admin/template/users.tpl');
				}

				break;
			case 'articles':
				$result =  db_get_articles($link);

				while ($data = $result -> fetch()) {
					require(__ROOT__.'/pp_admin/template/articles.tpl');
				}

				break;

			case 'commentaires':
				$result =  db_get_all_comments($link);

				while ($data = $result -> fetch()) {
					require(__ROOT__.'/pp_admin/template/commentaires.tpl');
				}

				break;

			case 'categories':
				$result =  db_get_articles($link);

				while ($data = $result -> fetch()) {
					require(__ROOT__.'/pp_admin/template/categories.tpl');
				}

				break;
			default:
				# code...
				break;
		}
	}
