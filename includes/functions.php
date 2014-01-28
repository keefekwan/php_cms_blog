<?php

function article_id() {
global $article_id;
global $id;

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$article = new Article();
		$article_id = $article->fetch_data($id);
	} 
}
?>
