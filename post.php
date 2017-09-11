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
table{
	color:white;
	background-image: url('11.jpg');
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
			    <form method="POST"  action="post.php" enctype="multipart/form-data">
<table  width="800px" height="650px"  border="1" align="center" >

<tr align= "center">
<td colspan="2" height=80px><h1>SELL YOUR BOOK</h1></td>
</tr>
<tr>
<td align="right" ><b>Book Title</b></td>
<td ><input type="text" name="book_title" size="50"/></td>
</tr>

<tr>
<td align="right" ><b>Book Author</b></td>
<td ><input type="text" name="book_author" size="50"/></td>
</tr>

<tr>
<td align="right"><b>Book category</b></td>
<td><select name="book_cat"/>
<option>Select a Category</option>
<?php
			   
			   $get_cats = "select * from categories";
			   $run_cats = mysqli_query($con, $get_cats);
			   while($row_cats = mysqli_fetch_array($run_cats))
			   {   
			   $cat_id= $row_cats['cat_id']; 
			   $cat_title=$row_cats['cat_title'];
			   echo "<option value='$cat_id'>$cat_title</option>";
			   
			   }
			   
			   ?>
</select></td>
</tr>



<tr>
<td align="right"><b>Book's Front Image </b></td>
<td align="right"><input type="file" name="book_img1"/>*Max. Image Size = 1MB</td>
</tr>

<tr>
<td align="right"><b>Book's Back Image</b></td>
<td align="right"><input type="file" name="book_img2"/>*Max. Image Size = 1MB</td>
</tr>

<tr>
<td align="right"><b>Book Cost</b></td>
<td><input type="text" name="book_cost" size="50" /></td>
</tr>

<tr>
<td id="td1" align="right"><b>Book Description</b></td>
<td><textarea name="book_desc" cols="50" rows="8"></textarea></td>
</tr>


<tr>
<td align="right"><b>Book Keywords</b></td>
<td><textarea name="book_keywords" cols="50" rows="5" placeholder="WRITE KEYWORDS WHICH HELPS BUYER TO SEARCH YOUR BOOK eg(book name, author name etc.)."></textarea></td>
</tr>


<tr align= "center">
<td colspan="2" height=80px><h1>SELLER's INFORMATION</h1></td>
</tr>
<tr>
<td align="right" ><b>Seller's Name</b></td>
<td ><input type="text" name="s_name" size="50"/></td>
</tr>

<tr></br>
<td align="right" ><b>Seller's Phone No.</b></td>
<td ><input type="text" name="s_number" size="50"/></td>
</tr>

<tr></br>
<td align="right" ><b>Seller's City</b></td>
<td ><input type="text" name="s_city" size="50"/></td>
</tr>

<tr align="center">
<td colspan="2"><input type="submit" name="sell" value="SELL IT NOW!!!"/></td>
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




<?php
if(isset($_POST['sell']))
{
	$book_title =$_POST['book_title'];
	$book_author=$_POST['book_author'];
    $book_cat   =$_POST['book_cat'];
	$book_cost  =$_POST['book_cost'];
	$book_desc  =$_POST['book_desc'];
	$book_keywords=$_POST['book_keywords'];
    $s_name     =$_POST['s_name'];
	$s_no       =$_POST['s_number'];
    $s_city     =$_POST['s_city'];
	
	//image_names
	$book_img1 = $_FILES['book_img1']['name'] ;
	$book_img2 = $_FILES['book_img2']['name'] ;
	
	//image temp names
	$temp_name1 = $_FILES['book_img1']['tmp_name'] ;
	$temp_name2 = $_FILES['book_img2']['tmp_name'] ;
	
	
	
	
	if($book_title=='' OR $book_author=='' OR $book_cat=='' OR $book_cost=='' OR $book_desc=='' OR $book_keywords=='' OR $book_img1=='' OR $book_img2=='' OR $s_name=='' OR $s_no==''OR $s_city=='')
	{
		echo "<script>alert('please fill all the fields')</script>";
	    exit();
	}
	else
	{   
           //uploading images to its folder
		   move_uploaded_file($temp_name1,"images/$book_img1");
		   move_uploaded_file($temp_name2,"images/$book_img2");
	
		$insert_book = "insert into books (cat_id,date,book_title,book_author,book_img1,book_img2,book_cost,book_desc,book_keywords,s_name,s_no,s_city)
		   values ('$book_cat',NOW(),'$book_title','$book_author','$book_img1','$book_img2','$book_cost','$book_desc','$book_keywords','$s_name','$s_no','$s_city')" ;
	
	    $run_book = mysqli_query($con, $insert_book);
		
		if($run_book)
		{
			echo "<script> alert('Book inserted successfully') </script>";
		}
	}
}

?> 


 











