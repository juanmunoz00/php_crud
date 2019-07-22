<!DOCTYPE html>
<? include 'db.php';
$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ((int)$_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
//$sql =  "select * from tasks order by id desc";
$sql =  "select * from tasks order by id desc limit ".$start." , ".$perPage." ";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total / $perPage);
$rows = $db->query($sql);
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
				ul {text-align:center;}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<center><h1>Todo list</h1></center>
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-hover">
						<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">Add Task</button>
						<button type="button" class="btn btn-default pull-right" onclick="print();">Print</button>
						<hr><br>
						<div class="col-md-12 text-center">
							<p>Search</p>
							<form action="search.php" method="post" class="form-group">
								<input type="text" placeholder="Search" name="search" class="form-control">
							</form>
							<br>
							<h2>Search results</h2>
						</div>
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Task</h4>
									</div>
									<div class="modal-body">
										<form method="post" action="add.php">
											<div class="form-group">
												<label>Task Name</label>
												<input type="text" required name="task" class="form-control">
											</div>
											<input type="submit" name="send" value="send" class="btn btn-success">
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!--    -->
					<thead>
						<tr>
							<th scope="col">Task ID</th>
							<th scope="col">Name</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<? $rowCount=0; while ($row = $rows->fetch_assoc()): ?>
							<th scope="row"><? echo $row['id']; ?></th>
							<td class="col-md-10"><? echo $row['name']; ?></td>
							<td><a href="update.php?id=<? echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
							<td><a href="delete.php?id=<? echo $row['id']; ?>" class="btn btn-danger">Remove</a></td>
							<? $rowCount+=1; ?>
						</tr>
						<? endwhile; ?>
						<?
						if($rowCount==0){
						echo '<h2>No records found</h2> <br><br>';
						}
						?>
					</tbody>
				</table>
				<ul class="pagination">
					<? for($i = 1 ; $i <= $pages; $i++): ?>
					<li>
						<a href="?page=<? echo $i;?>per-page=<? echo $perPage;?>"><? echo $i; ?></a>
					</li>
					<? endfor; ?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>