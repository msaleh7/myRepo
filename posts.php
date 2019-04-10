<?php

session_start();
include("connect.php");

if (isset($_POST['post']))
{

   
   // $title = strip_tags($_POST['title']);
   $title = $_POST['title'];
   $content = $_POST['content'];
   
   // $content = strip_tags($_POST['content']);

    //$title = mysqli_real_escape_string($dbconn,$title);
    //$content = mysqli_real_escape_string($dbconn,$content);
    
    //$date = date('l js \of F Y h:i:s A');
    
    $sql = "INSERT INTO posts (Title,Content, Date) VALUES ('$title','$content',now())";
    
    if ($title == "" || $content = "")
    {
        echo "please complete your post!";
        return;
    }
    
  //  $results = mysqli_query($dbconn, $sql) or die(mysqli_errno());
  
    mysqli_query($dbconn, $sql);
   
  // header("Location:index.html");
    
    
    
    
}


?>

<DOCTTYPE html>
<html>

<head>
<title>Blogs Page</title>
</head>


<body>



	<form action = "posts.php" method = "POST">
	
		<input placeholder="Title" name ="title" type = "text" autofocus size = "48"><br /><br />
		<textarea placeholder="Content" name ="content" rows = "20" cols ="50" ></textarea><br />
		<input name = "post" type = "submit" value = "Post">
		
	
	</form>

	<?php 
	$sql = "SELECT * FROM posts ORDER BY ID DESC";
	$results = mysqli_query($dbconn, $sql) or die(mysqli_errno());
	
	$posts = "";
	
	if (mysqli_num_rows($results) > 0){
	    while ($rows = mysqli_fetch_assoc($results))
	    {
	        $ID = $rows['ID'];
	        $title = $rows['Title'];
	        $Content = $rows['Content'];
	        $Date = $rows['Date'];
	        
	        
	       $posts .= "<div><h2><a href = 'view_post.php?pid=$ID'>$title</a></h2><h3>$Date</h3><p>$Content</p></div>";
	    }
	    echo $posts;
	} else 
	{"There are no posts to display";}
	
	?>
	
	
	
</body>

</html>
