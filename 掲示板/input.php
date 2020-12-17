<?php
	// DB接続設定
	$dsn = 'mysql:dbname="databasename";host=localhost';
	$user = '"username"';
	$password = '"password"';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	$sql = "CREATE TABLE IF NOT EXISTS bulletin"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT,"
	. "pass INT"	
	.");";
	$stmt = $pdo->query($sql);

	
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
