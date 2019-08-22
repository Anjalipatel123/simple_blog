<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="btn btn-success ml-auto"><a style="color:white" href="admin/login.php"> Login </a></button>
    
    <div class="navbar">
		<ul class="navbar-nav text-right">
		<li class="nav-item active">
		<a class="nav-link">
		</a>
		</li>
		
		</ul>
    </div>
	</nav>
		</br> 
<center><h1 class="badge badge-secondary"> <label class="fa fa-search"> </label> Search for an article</h1></center>
<center> <div style="width:50%">
<input type="text" onkeyup="showResult(this.value)" class="form-control" placeholder="Type Keywords" aria-label="Recipient's username" aria-describedby="basic-addon2"><div id="livesearch"> </div>
		
</div> </center>

	<div id="wrapper">
	</br>
		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div class="container">';
						echo '<h3 class="alert alert-dark"> <a style="color:#000000" href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h3>';
						echo '<p class="badge badge-pill badge-info">Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p class="badge badge-pill badge-danger"><a style="color:white" href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>
	<script> 

function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
	  //document.getElementById("livesearch").createElement("li");
	  document.getElementById("livesearch").style.backgroundColor = "#ffff";
	  //document.getElementById("livesearch").style.Color = "#ffff";
      document.getElementById("livesearch").innerHTML=this.responseText;
      
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}

</script>
	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>