<?
include 'db.php';

$idTask = (int)$_GET['id'];
//echo $idTask;
	
	$sql =  "delete from tasks where id = '$idTask'";
	$val = $db->query($sql);

	//echo $sql;

	if($val){
		//echo '<h1>Succesfully inserted</h1>';
		header('location: index.php');
	}
	

?>