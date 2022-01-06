
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>Books Database</title>
	<link rel="stylesheet" href="/CSS/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>
	<body>
		<?php
			$booksJson = file_get_contents('books.json');
			$book_array = json_decode($booksJson, true);
			$booksTempJson = file_get_contents('book_temp.json');
			$book_temp = json_decode($booksTempJson, true);

		?>
	<div>
		<div>
			<h1 class="text-center">Books Available<h1>
		</div>
		<br>
		<div>
		<table class="d-flex justify-content-center">
	      	<tr>
				<td> 
					<form action = "/add.php">
							<input class="btn-success rounded" type="submit" name="Add" value="Add a Book"/> 
					</form> 
				</td>

				<td>
					 
				</td>
			</tr>	
		</table>
		<br>
		<div style="text-align:center">
			<h3 >Search Result</h3>
		</div>

		</div>
		<table class="border border-light " style = "margin-left:auto;margin-right:auto;">
			<tr class="text-center text-white">
				<th class="p-3 bg-secondary border">Index</th>
				<th class="p-3 bg-secondary border"> ISBN </th>
				<th class="p-3 bg-secondary border"> Title </th>
				<th class="p-3 bg-secondary border"> Author </th>
				<th class="p-3 bg-secondary border"> Pages </th>
				<th class="p-3 bg-secondary border"> Availability </th>
				<th class="p-3 bg-secondary border"> Operation </th>
			</tr>
			<?php
				$ind = 0;
				if(!empty($book_array)){
					$new_book_array = $book_array;
				}
				else{
					$new_book_array = $book_temp;
				}

			?>
			
			<?php foreach ($new_book_array as $book){ ?>
				<tr class="">
					<td class="p-3 bg-light border-left border-top border-right">
						<?php echo $ind+1;?>
					</td>	
					<td class="p-3 bg-light border-left border-top border-right">
						<?php echo $book['isbn']; ?>
					</td>
					<td class="p-3 bg-light border-left border-top border-right">
						<?php echo $book['title']; ?>
					</td>
					<td class="p-3 bg-light border-left border-top border-right">
						<?php echo $book['author']; ?>
					</td>
					<td class="p-3 bg-light border-left border-top border-right">
						<?php echo $book['pages']; ?>
					</td>
					<td class="p-3 bg-light border-left border-top border-right">
						<?php
							if($book['available']){
								echo 'Available'; 
							}
							else{
								echo 'Not Available';
							}
							
						?>
					</td>
					<td class="p-3 bg-light border-left border-top border-right">
						<form action = "/delete.php" method = "post" onclick="return confirm('Are you sure you want to delete this item?');">
							<input type="hidden" id="custId" name="custId" value=<?php echo $ind?>>
							<input type="submit" name="Delete" class="btn btn-danger"
									value="Delete"/> 
						</form> 
					</td> 
					<?php $ind++; ?>
				</tr>
			<?php } ?>
		</table>
	</div>
	<br>
		<div class="d-flex justify-content-center">
			<form method = "post">
								<label for="fname"></label>
								<input type="text" id="fname" name="fname" >
								<input class="btn-success rounded" type="submit" name="search" value="Search"/> 
			</form>
		</div>
			<br>
			<table class="d-flex justify-content-center">
				<tr>
					<td >
						<?php
										$key = "";	
										if (isset($_POST["fname"])){
											$key = $_POST["fname"];
										}
										$ind = 0; 
										$sw = 3;
										foreach($book_array as $bk){  
												if($sw != 1){
													$sw = 2;
												}
												if($bk['isbn'] == $key){
														$ind += 1;
														$sw = 1;
														echo "$ind:";
														echo ("<br>");
														echo "ISBN: "; 
														echo $bk['isbn'];
														echo ("<br>");
														echo "Title: "; 
														echo $bk['title'];
														echo ("<br>");
														echo "Author: "; 
														echo $bk['author'];
														echo ("<br>");
														echo "Availability: "; 
														if($bk['available']){
															echo 'Available'; 
														}
														else{
															echo 'Not Available';
														}
														echo ("<br>");

												}
													elseif ($bk['title'] == $key) {
														$sw = 1;
														$ind += 1;

														echo "$ind:";
														echo ("<br>");
														$sw = 1;
														echo "ISBN: "; 
														echo $bk['isbn'];
														echo ("<br>");
														echo "Title: "; 
														echo $bk['title'];
														echo ("<br>");
														echo "Author: "; 
														echo $bk['author'];
														echo ("<br>");
														echo "Availability: "; 
														if($bk['available']){
															echo 'Available'; 
														}
														else{
															echo 'Not Available';
														}
														echo ("<br>");
		
													}
													elseif($bk['author'] == $key){
														$ind += 1;
														$sw = 1;
														echo "$ind:";
														echo ("<br>");
														echo "ISBN: "; 
														echo $bk['isbn'];
														echo ("<br>");
														echo "Title: "; 
														echo $bk['title'];
														echo ("<br>");
														echo "Author: "; 
														echo $bk['author'];
														echo ("<br>");
														echo "Availability: "; 
														if($bk['available']){
															echo 'Available'; 
														}
														else{
															echo 'Not Available';
														}
														echo ("<br>");
		
													}
												
											}
											if($sw == 2){
												if(!empty($key)){
													echo '"'; 
													echo $key;
													echo '"'; 
													echo ' is not found at the Book Store';
													$sw = 1;
												}
												else{
													echo "Search Results are shown here.";
												}
											}
										?>
									</td>
									
				</tr>
			</table>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>