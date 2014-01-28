<?php
session_start();
require_once("../includes/db_connection.php");
require_once("../includes/article.php");

$article = new Article();
$articles = $article->fetch_all();

?>

<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="index.php" id="logo">CMS</a>
		
			<h4><small>Select an article to edit</small></h4>

			<ol>
				<?php foreach ($articles as $article) { ?>
				<li>
					<a href="edit_article.php?id=<?php echo $article["article_id"]; ?>">
						<?php echo $article["article_title"]; ?>
					</a> - 
					<small>
						posted <?php echo date("l, M jS", $article['article_timestamp']); ?>
					</small>
				</li>
				<?php } ?>
			</ol>
			<br>
			<small><a href="index.php">admin</a></small>

	</body>
</html>


