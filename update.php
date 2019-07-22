<!DOCTYPE html>
<?
	include 'db.php';
	$idTask = (int)$_GET['id'];
	$sql =  "select name from tasks where id = $idTask";
	$rows = $db->query($sql);
	$row = $rows->fetch_assoc();
	$taskname = $row['name'];
	//var_dump($row);

	if(isset($_POST['update'])){
		$updated_task = htmlspecialchars($_POST['task']);

		$sql =  "update tasks set name = '$updated_task' where id = $idTask";
		$rows = $db->query($sql);
		header('location: index.php');

	}

?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>CRUD App</title>
		<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">
		<!-- Bootstrap core CSS -->
		<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template
		<link href="starter-template.css" rel="stylesheet">
		-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="assets/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script
		src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
		integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
		crossorigin="anonymous">
			
		</script>
		<style type="text/css">
			h1 {text-align:center;}
				p {text-align:center;}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<center><h1>Update list</h1></center>
				<div class="col-md-10 col-md-offset-1">

					<hr><br>
					<form method="post" >
						<div class="form-group">
							<label>Task Name</label>
							<input type="text" required name="task" value = "<? echo $taskname; ?>" class="form-control">
						</div>
						<input type="submit" name="update" value="update" class="btn btn-success">&nbsp;
						<a href="index.php" class="btn btn-warning">Back</a>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>