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
        


<form method="post" action="delete.php">    
    <p><input type="text" name="deleteNo" placeholder="削除対象番号">
    <input type="text" name="pass" placeholder="パスワード" value=""><br>      
    <input type="submit" name="delete" value="削除"></p>
</form>   


    
 </body>
</html>
