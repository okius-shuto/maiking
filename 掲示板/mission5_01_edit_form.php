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
        <title>mission5_01</title>
</head>
<body>
        
<form method="post" action="mission5_01_edit.php">
    <input type="text" name="name" placeholder="名前" value="">
    <input type="" name="edit_post" placeholder="編集番号"value="<?php echo $_POST["edit_post"] ?>"><br>
    <input type="text" name="comment"  value="">
    <input type="text" name="pass" placeholder="パスワード" value="<?php echo $_POST["pass"] ?>">
    <input type="submit" value="送信">
</form>  

</body>
</html>