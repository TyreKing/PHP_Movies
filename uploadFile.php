
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

<h2>Upload</h2>

<p>
<?php
set_time_limit(0);

$okay = true;
$db =new mysqli('localhost','uMoviesRoot','anonymous','uMovies');
if($db-> connect_error){
	die("connection failed: ". $db -> connect_error);
}
echo "Connect successfully  &";

$filename = 'uMovies.txt';
if($okay){
	echo 'File uploaded successfully.';
	$file = fopen($filename, 'r');
	
	//maybe i can use a counter to to get the rest of the file.
	while(!feof($file)){
		$line = fgetcsv($file, 0,"\t");
		if($line[0] == 'movie'){		
		$name = mysqli_real_escape_string($db,$line[1]);
		$year = mysqli_real_escape_string($db,$line[2]);		
		$sql = "INSERT INTO `movies` (`name`, `year`) VALUES ('$name','$year')"; 		
			if($db -> query($sql) === TRUE){
				
			}else{
				echo "dude you suck";
			}
			
		}
		 if($line[0] == 'director'){
			$name = mysqli_real_escape_string($db,$line[2]);
			$year = mysqli_real_escape_string($db,$line[3]);
			$director = mysqli_real_escape_string($db,$line[1]);
			$sql = "INSERT INTO `directors` (`name`) VALUES ('$line[1]')";
			$m = "INSERT INTO `directed_by` (`movie`, `year`, `director`) VALUES('$name' , '$year', '$director')";
			if($db -> query($sql) === TRUE){
				
			}else{
				
				echo "Directors failed";
			}
			if($db -> query($m) === TRUE){
				
			}else{
				
				echo "Directed by";
			}
		}
		 if($line[0] == 'actress'){
			$name = mysqli_real_escape_string($db,$line[1]);
			$movie = mysqli_real_escape_string($db,$line[2]);
			$year = mysqli_real_escape_string($db,$line[3]);
			$role = mysqli_real_escape_string($db,$line[4]);
			
			
			$sql = "INSERT INTO  `actors`(`name`,`gender`) VALUES('$name', 'Female')";
			$m = "INSERT INTO `performed_in`(`actor`, `movie`, `year`, `role`) VALUES ('$name', '$movie', '$year', '$role')";
			if($db -> query($sql) === TRUE){
				
			}else{
				
				echo "woman";
			}
			if($db -> query($m) === TRUE){
				
			}else{
				
				echo "performed_in";
			}
			
		}
		if($line[0] == 'actor'){
			$name = mysqli_real_escape_string($db,$line[1]);
			$movie = mysqli_real_escape_string($db,$line[2]);
			$year = mysqli_real_escape_string($db,$line[3]);
			$role = mysqli_real_escape_string($db,$line[4]);
			
			
			$sql = "INSERT INTO  `actors`(`name`,`gender`) VALUES('$name', 'Male')";
			$m = "INSERT INTO `performed_in`(`actor`, `movie`, `year`, `role`) VALUES ('$name', '$movie', '$year', '$role')";
			if($db -> query($sql) === TRUE){
				
			}else{
				
				echo "dude";
			
			}
			if($db -> query($m) === TRUE){
				
			}else{
				
				echo "maleperin";
			}
			
		}
		
		$fields = count($line);
		
	}
	
	$db->close();
	fclose($file);
	
	
}
?>

<p><a style = "text-decoration:none" href = "admin.html">
<input type = "submit" value=" Back to Upload"?></a></p>
</body></html>