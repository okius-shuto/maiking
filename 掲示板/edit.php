<?php
	// DB接続設定
	$dsn = 'mysql:dbname="databasename";host=localhost';
	$user = '"username"';
	$password = '"password"';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	$id = $_POST["edit_post"];//変更する投稿番号
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$comment = $_POST["comment"]; //変更したい名前、変更したいコメントは自分で決めること
	$sql = 'UPDATE bulletin SET name=:name,comment=:comment WHERE id=:id and pass=:pass';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':pass', $pass, PDO::PARAM_INT);	
	$stmt->execute();	
	
	$sql = 'SELECT * FROM bulletin';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
        echo "番号:".$row['id'].'<br>';
		echo "名前:".$row['name'].'<br>';
		echo "コメント:".$row['comment'].'<br>';
		echo "パスワード:".$row['pass'].'<br>';
	echo "<hr>";
    }
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset = "UTF-8">
        <title>"title"</title>
</head>
    <body>
        
<form method="post" action="db.php">
    <input type="text" name="name" placeholder="名前" value=""><br>
    <input type="text" name="comment"  value=""><br>
    <input type="text" name="pass" placeholder="パスワード" value="">
    <input type="submit" value="送信">
</form>    

<form method="post" action="delete_form.php">    
    <input type="submit" name="delete" value="削除"></p>
</form>   

<form method="post" action="edit_form.php"> 
    <input type="" name="edit_post" placeholder="編集番号"value=""><br>
    <input type="text" name="pass" placeholder="パスワード" value=""><br>    
    <input type="submit" value="編集">
</form>
    
 </body>
</html>
