<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.less">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</head>
<body>

<?php
if (isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type'] ?>">
           
           <?php 
                echo $_SESSION['message'];
                unset($_SESSION['msg_type']);
            ?>

	</div>
<?php endif ?>


<?php 
       $mysqli = new mysqli('localhost', 'root', '', 'base') or die (mysqli_error($mysqli)); 
       $result = $mysqli->query("SELECT * FROM data") or die ($mysqli->error); 
      
 function pre_r( $array ) {
       echo '<pre>';
       print_r($array);
       echo '</pre>';
   }
?>

<div class="container">
	

<div class="row justify-content-center">
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th>Action</th>
			</tr>	
		</thead>	
		<?php  
           while ($row = $result->fetch_assoc()): ?>
           	<tr>
           		<td><?php echo $row['name'];?></td>
           		<td><?php echo $row['surname'];?></td>
           		<td><?php echo $row['email'];?></td>
           		<td>
           			<a class="btn btn-danger" href="Process.php?delete=<?php echo $row['id']?> " >Delete</a>
           		</td>
           	</tr>
		<?php endwhile; ?>
	</table>
</div>
<form action="Process.php" method="POST">
	<h1 style="text-align: center;font: 45px/3 sans-serif;margin-top: -10px;">Submit a Form</h1>
	<div style="margin-top: -40px;">
		
  <label for="fname"><h2>First name:</h2></label><br>
  <input type="text" id="fname" name="name"  placeholder="Enter Firstname"><br>

  <label for="lname"><h2>Last name:</h2></label><br>
  <input type="text" id="lname" name="surname"  placeholder="Enter Lastname"><br><br>

  <label for="lname"><h2>Email:</h2></label><br>
  <input type="Email" id="lname" name="email" placeholder="Enter Email"><br><br>

	</div>
  

  <button type="Sumbit" name="save">Sumbit</button>
</form> 
</div>
</body>
</html>