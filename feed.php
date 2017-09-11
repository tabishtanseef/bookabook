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
			    <form method="POST"  action="feed.php" enctype="multipart/form-data">
<table  width="400px" height="400px"  border="1" align="center" >

<tr align= "center">
<td colspan="2" height=80px><h1>GIVE FEEDBACK</h1></td>
</tr>
<tr>
<td align="right" ><b>YOUR NAME</b></td>
<td ><input type="text" name="name" size="50"/></td>
</tr>

<tr>
<td align="right" ><b>FEEDBACK TITLE</b></td>
<td ><input type="text" name="f_title" size="50"/></td>
</tr>

<tr>
<td id="td1" align="right"><b>FEEDBACK</b></td>
<td><textarea name="feedback" cols="50" rows="8"></textarea></td>
</tr>

<tr align="center">
<td colspan="2"><input type="submit" name="sell" value="POST"/></td>
</tr>
</table>
</form>
			  
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