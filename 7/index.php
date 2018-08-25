<?php 

$host 	= "localhost";
$user 	= "root";
$pass 	= "";
$db 	= "blogs";

$conn	= mysqli_connect($host,$user,$pass,$db);

if ($conn) {
	
}else{
	
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Arka Bootcamp</title>
  </head>
  <body>
  <div class="jumbotron">
  <h1 class="display-4">Arkademy Blog </h1>
  <p class="lead">Hai selamat datang di arkademy , selamat bagi kalian yang telah bergabung</p>

</div>

<div class="container">
<div class="card">
  <div class="card-body">
  <?php 
		if(isset($_GET['id_post'])) {
			$sql = "SELECT `posts`.`id_posts`, `posts`.`title`, `posts`.`content`, `posts`.`createdBy`, `users`.`id_user`, `users`.`username` FROM `posts` LEFT JOIN `users` ON `posts`.`createdBy`=`users`.`id_user` WHERE `id_posts`='".$_GET['id_post']."' ";
			$run = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($run) > 0) {
				    ?>
				    <div class="row content">

				<?php while($row = mysqli_fetch_assoc($run)) {
				       ?>
				       
					    <div class="col-sm-12 text-left"> 
					      <h1><?php echo strtoupper($row['title']); ?></h1><hr>
					      <p><?php echo $row['content']; ?></p>
					      <br>
							<small style="float:right">Author : <b><?php echo $row['username']; ?></b></small>
					      <hr>
					    </div>
					    
				<?php } ?>
				
				<br><br><br>
				    <div class="col-sm-12 text-left">
				    	<div class="form-group">
						  <form method="POST">
							  <label for="comment">Komentar :</label>
							  <textarea class="form-control" name="komentar" rows="5" id="comment"></textarea>
							  <br>
							  <input type="submit" name="komentari" value="Komentari" class="btn btn-primary">
							  <?php 
							  	if (isset($_POST['komentari'])){
							  		$sql2 = "INSERT INTO comments(`id_comments`, `comment`, `postId`) VALUES(NULL, '".$_POST['komentar']."', '".$_GET['id_post']."')";
								    $run2 = mysqli_query($conn, $sql2);
								    if ($run2) {
								    	
								    }else{
								    	echo "<script>alert('Gagal Mengomentari')</script>";
								    }
							  	}
							  ?>
						  </form>
						  <br><br><br><br>
						  <div class="well" style="background: #ffffff">
							  	<?php 
							  		$sql1 = "SELECT count('postId') as 'tot' FROM `comments` WHERE `postId`=".$_GET['id_post']."";
								    $run1 = mysqli_query($conn, $sql1);
								    $row1 = mysqli_fetch_assoc($run1);
								    if ($run1) {
								    	echo $row1['tot']." Komentar<br>";
								    }else{
								    	echo "0 Komentar<br>";
								    }
					  			?>
                 <ul class="list-unstyled">
              <li class="media">
    <div class="media-body">
      <?php 
								    $sql0 = "SELECT * FROM `comments` WHERE `postId`='".$_GET['id_post']."' ";
								    $run0 = mysqli_query($conn, $sql0);

								    if (mysqli_num_rows($run0) > 0) {
								    	while($row0 = mysqli_fetch_assoc($run0)){
								    	?>
                      <div class="media">
                      <div class="align-self-start mr-3">
										      <img src="img/avatar.jpeg" class="media-object" style="width:80px">
										    </div>
										    <div class="media-body">
										      <h4 class="media-heading">USER</h4>
										      <p><?php echo $row0['comment']; ?></p>  
                          <br> 
										    </div>
                      </div>
								    	<?php	
								    	}
								    }else{
								    	echo "Belum ada komentar.";
								    }
								    ?>
    </div>
  </li>
</ul>
							  
							  </div>
							 </div>
						</div>
				    </div>
				  </div>				
			<?php
			} else {
			    echo "<h1>404 Not Found!! </h1>";
			}
		}else{
				$sql = "SELECT `posts`.`id_posts`, `posts`.`title`, `posts`.`content`, `posts`.`createdBy`, `users`.`id_user`, `users`.`username` FROM `posts` LEFT JOIN `users` ON `posts`.`createdBy`=`users`.`id_user`";
				$run = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($run) > 0) {
				    while($row = mysqli_fetch_assoc($run)) {
				       ?>
				       <br>
				       <h1><?php echo strtoupper($row['title']); ?></h1>
				       <p><?php echo substr($row['content'],0,250)."..."; ?></p>
				       <a class="btn btn-info" href="index.php?id_post=<?php echo $row['id_posts']; ?>">Readmore</a>
				       <hr>
				       
				       <?php 
				    }
				} else {
				    echo "0 results";
				}	
		}
	?>
		</div>
  </div>
</div>  
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>