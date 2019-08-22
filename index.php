<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<div id="wrapper">	
	
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
    <a class="navbar-brand" href="#">Home</a>
    <button class="btn btn-success ml-auto"><a style="color:white" href="admin/login.php"> Login </a></button>
    
</nav>

	  <main role="main">
        <div class="jumbotron">
          <div class="col-sm-8 mx-auto">
            <center> <h1>Welcome </h1>
              <a class="btn btn-success" href="admin/login.php" role="button">Contribute Article</a>
              <a class="btn btn-primary" href="bolg.php" role="button">Browse Article</a>
            </center>
          </div>
        </div>
      </main>
	</div>
	<script> function showResult(str) {
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