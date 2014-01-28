<?php
session_start();
require_once("../includes/db_connection.php");
require_once("../includes/article.php");
require_once("../includes/functions.php");
article_id();


if (isset($_SESSION["logged_in"])) {
	if (isset($_POST["title"], $_POST["content"])) {
		$id 	 = $article_id["article_id"];
		$title 	 = $_POST["title"];
		$content = $_POST["content"];

		$query = $pdo->prepare("UPDATE articles SET article_title = ?, article_content = ? 
								WHERE article_id = ? LIMIT 1");
		$query->bindValue(1, $title);
		$query->bindValue(2, $content);
		$query->bindValue(3, $id);
		$query->execute();
	
		header("Location: index.php") ;
	}

?>

<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="index.php" id="logo">CMS</a>
			<br>
			
			<h4>Edit Article</h4>

			<?php if (isset($error)) { ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small><br><br>
			<?php } ?>
			<form action="edit_article.php?id=<?php echo $article_id["article_id"]; ?>" method="post">
				<input type="text" name="title" value="<?php echo $article_id["article_title"]; ?>"><br><br>
				<textarea rows="15" cols="50" name="content"><?php echo $article_id["article_content"]; ?></textarea><br><br>
				<input type="submit" name="submit" value="Edit Article">
			</form>

		</div>	
	</body>
</html>

<?php

} else {

	header("Location: index.php");

}

?>
