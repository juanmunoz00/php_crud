<?
include 'db.php'; 


if(isset($_POST['send'])){
	$name = htmlspecialchars($_POST['task']);

	$sql =  "insert into tasks (name) values ('$name')";
	$val = $db->query($sql);

	//echo $sql;

	if($val){
		//echo '<h1>Succesfully inserted</h1>';
		header('location: index.php');
	}

}
	

?>