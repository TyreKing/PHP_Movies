
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
            "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<title>uMovies :: Movie</title>
<style type="text/css">
@import url(uMovies.css);
</style>
</head>
<body>

<div id="links">
<a href="./">Home<span> Access the database of movies, actors and directors. Free to all!</span></a>
<a href="admin.html">Administrator<span> Administrator access. Password required.</span></a>
</div>


<div id="content">
<h1>uMovies&trade;</h1>
<p>
Welcome to <em>uMovies</em>, your destination for information on <a href="movies.php" title="access movies information">movies</a>, <a href="actors.php" title="access actors information">actors</a> and <a href="directors.php" title="access directors information">directors</a>.
</p>

<h2>Deleting Information</h2>

<p>
<?php
$db =new mysqli('localhost','uMoviesRoot','anonymous','uMovies');
if($db-> connect_error){
	die("connection failed: ". $db -> connect_error);
};

$sql = "DELETE FROM `movies` WHERE 1";
if($db -> query($sql) === True){
	echo "<strong> ALL DATA DELETED!</strong>";
	}else{
				
		echo "too bad it didnt work";
			
		}
		$sql = "DELETE FROM `actors` WHERE 1";
if($db -> query($sql) === True){
	
	}else{
				
		echo "too bad it didnt work";
			
		}
		$sql = "DELETE FROM `directors` WHERE 1";
if($db -> query($sql) === True){
	
	}else{
				
		echo "too bad it didnt work";
			
		}
		$sql = "DELETE FROM `performed_in` WHERE 1";
if($db -> query($sql) === True){
	}else{
				
		echo "too bad it didnt work";
			
		}
		$sql = "DELETE FROM `directed_by` WHERE 1";
if($db -> query($sql) === True){
	
	}else{
				
		echo "too bad it didnt work";
			
		}
	$db-> close();
?>
<p><copyright>Tyre King: Back End; 2017</copyright></p>
<p><a style = "text-decoration:none" href = "admin.html">
<input type = "submit" value=" Back to Upload"?></a></p>
</body></html>