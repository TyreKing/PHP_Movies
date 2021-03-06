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

<h2>Actor</h2>

<p>
<?php
$moviesdb = new mysqli('localhost','uMoviesUser','anonymous','uMovies');
$moviesdb->set_charset("utf8");

if ($moviesdb->connect_errno) {
    echo '<h3>Database Access Error!</h3>';
}
else {
    $select = 'select * from actors';
    if (@$_GET['name'] != "") {
        $select .= ' where name = "'.$_GET['name'].'"';
    }

    $result = $moviesdb->query( $select );
    $rows   = $result->num_rows;

    if ($rows == 0) {
        echo "<h3>No actor to Display</h3>";
    }
    else {
        $movie = $result->fetch_assoc();

        echo "<h3><span class=\"uTitle\">".$movie['name']."</span></h3>";
        echo "<strong>Gender: </strong>" .$movie['gender'];

        $select = 'select * from actors where actor="'.$movie['name'].'"';
        $result = $moviesdb->query( $select );
        $rows   = $result->num_rows;

        if ($rows == 0) {
           
        }
        else {
            echo "<span class=\"uActor\">";
            for ($i=$rows; $i>0; $i--) {
                $gender = $result->fetch_assoc();
                echo "<a href=\"actor.php?name=".$gender['movie']."\">".$gender['movie']."</a>";
                if ($i>1) {
                    echo ", ";
                }
            }
            echo "</span><br />";
        }

        echo"<strong>Filmography:</strong>\n";
        echo "<table class=\"uMovies\">\n";
        echo "<tr>\n";
        echo "<th></th>";
        echo "<th><a href=\"actor.php?name=".$movie['name']."&order=movie\">Movie</a></th>";
        echo "<th><a href=\"actor.php?name=".$movie['name']."&order=role\">Role</a></th>";
        echo "<tr>\n";

        $select = 'select * from performed_in where actor="'.$movie['name'].'"';
        switch (@$_GET['order']) {
            case 'movie':
            case 'role': $select .= ' order by '.$_GET['order'];
        }
        $result = $moviesdb->query( $select );
        $rows             = $result->num_rows;

        if ($rows == 0) {
            echo "<tr>\n";
            echo "<td colspan=\"3\">No Movies to Display</td>";
            echo "</tr>\n";
        }
        else {
            for ($i=0; $i<$rows; $i++) {
                $row = $result->fetch_assoc();
                echo "<tr class=\"highlight\">";
                echo "<td>".($i+1)."</td>";
                echo "<td><a href=\"movie.php?name=".$row['movie']."\" />".$row['movie']."</a></td>";
                echo "<td>".$row['role']."</td>";
                echo "</tr>\n";
            }
        }
        echo "</table>\n";

        $result->free();
        $moviesdb->close();
    }
}
?>
</p>

<p><copyright>Roberto A. Flores &copy; 2017</copyright></p>
<p><copyright>Tyre King: Back End; 2017</copyright></p>
</div>

</body>
</html>
