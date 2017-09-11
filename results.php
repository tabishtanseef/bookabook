<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Book A Book</title>
<link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>

<style type="text/css">
body{
	background-image: url('images/2.jpg');
    background-size: cover;
}
</style>


</head>
<body>


<!--MAIN CONTAINER Starts-->
<div class="main_wrapper">



<!--header starts here-->
        <div class="header_wrapper"> 
	    <a href="index.php"><img id="img1" src="book1.png"></a>
		<img id="img2" src="book2.jpg">
		</div>
<!--header ends here-->	
       


	   <div id="slim">
	  <marquee behavior="alternate" style="color:white;"> <a href="post.php" style="color:#FDEE00;">SELL</a> or <a href="all_books.php" style="color:#FDEE00;">BUY</a> OPTION IS YOURS!!!!</marquee>
	   </div>	
		
		<!--navigation bar starts-->
		<div id="navbar">
		<ul id="menu">
		<li><a href="index.php"> HOME</a></li>
		<li><a href="all_books.php">ALL BOOKS</a></li>
		
		<li><a href="post.php">SELL YOUR BOOK</a></li>
		<li><a href="contact.php">CONTACT US</a></li>
		<li><a href="feed.php">FEEDBACK</a></li>
		</ul>
		<div id="form">
		<form action="results.php" method="get" enctype="multipart/form-data">
		<input type="text" name="user_query" placeholder="Search here"/>
		<input type="submit" name="search" value="search"/>
		</form>
		</div>
		
		</div>
		<!--navigation bar ends-->
		
		
		
        <div class="content_wrapper"> 
		    <div id="left_sidebar">
			   <div id="sidebar_title" align="center">Categories</div>
			   <ul id="cats">
			   <?php getCats(); ?>
			   </ul>
			   
			   
			</div>
		    
			
			
			
			<div id="right_content">
			
			 
			
			  <div id="products_box">
			    <?php
				if(isset($_GET['search'])){
					
					$user_query = $_GET['user_query'];
				
				$get_books="select * from books where book_keywords like '%$user_query%'";
				$run_books= mysqli_query($con, $get_books);
				 
				while($row_books=mysqli_fetch_array($run_books))
				{
					$book_id = $row_books['book_id'];
					$book_title = $row_books['book_title'];
					$book_cat = $row_books['cat_id'];
					$book_author = $row_books['book_author'];
					$book_desc = $row_books['book_desc'];
					$book_cost = $row_books['book_cost'];
					$book_image1 = $row_books['book_img1'];
					$book_image2 = $row_books['book_img2'];
					
					 echo "
				    <div id='single_product'>
				       <h3 style='color:brown; text-decoration:none;'>$book_title</h3></br>
				    <img src='images/$book_image1' width='205px' height='205px'/></br>
				    <p><b style='float:left; text-decoration:none; color: White;'>Price: Rs. $book_cost </b></p>
					
					
					<a href=details.php?book_id=$book_id style='float:Right; text-decoration:none; color: Black;'>EXPLORE</a>
					
					</div>
					";
				}  
				}
				
				?>
			  
			  </div>
			
			
			
			
			
			</div>
		
		
		
		
		</div>
		
		
		
		
		
		
		<div class="footer">
          <h1 style="color:white; padding-top:20px; text-decoration:none; text-align:center; ">&copy; 2016 - all rights reserved</h1> 
 </div>

























</div>
<!--MAIN CONTAINER ends-->

</body>


</html>