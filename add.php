<html>
	<head>
		<meta charset="UTF-8">
		<title>Add Data</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>
	<body>
		<?php $ind = "start" ?>
		<br>
		<br>
		<table  style = "margin-left:auto;margin-right:auto;">
			<form class="" action ="/addnewbook.php" method = "post">
				<tr>
					<th >
						<label class="pb-3 m-2" for="title">Title of the book: </label>
					</th>
					<td> 
						<input placeholder="Title" class="form-control" type="text" id="title" name="title" required><br>
					</td>
				</tr>
				<tr>
					<th>
						<label class="pb-3 m-2" for="author">Author:</label>
					</th>
					<td> 
						<input placeholder="Author Name" class="form-control" type="text" id="author" name="author" required>
					</td>
				</tr>
				<tr>
					<th>
						<label class="pb-3 m-2" for="pages">Pages:</label>
					</th>
					<td> 
						<input placeholder="Enter number of Pages" class="form-control" type="number" id="pages" name="pages" required>
					</td>
				</tr>
				<tr>
					<th>
						<label class="pb-3 m-2" for="isbn">ISBN:</label>
					</th>
					<td> 
						<input placeholder="Enter number of Pages" class="form-control" type="number" id="isbn" name="isbn" required>
					</td>
				</tr>
				<tr>
					<th>
						<label class="pb-3 m-2" for="isbn">Availability:</label>
					</th>
					<td> 
						<input type="radio" id="avialable" name="avialable" value="available" required>
						<label for="availabe">Available</label>
						<input type="radio" id="not avialable" name="avialable" value="not avialable" required>
						<label for="not avialable">Not Avialable</label>
					</td>
				</tr>

				<tr>
					<td> 
						<input type="hidden" id="adding" name="adding" value=<?php echo $ind?>>
						<input class="btn-success" type="submit" id="submit" name="Submit" required>
					</td>
				</tr>

			</form>
		</table>
		<?php exit(); ?>
	</body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
