<?php

$db = mysqli_connect("localhost","root","","bookabook");

function getIp(){
	$ip =$_SERVER['REMOTE_ADDR'];
	
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}








function getBooks()

{
	global $db;

	    if(!isset($_GET['cat'])){
	
              
				   
				   
				$get_books="select * from books order by rand() LIMIT 0,6";
				$run_books= mysqli_query($db, $get_books);
				 
				while($row_books=mysqli_fetch_array($run_books))
				{
					$book_id = $row_books['book_id'];
					$book_title = $row_books['book_title'];
					$book_cat = $row_books['cat_id'];
					$book_author = $row_books['book_author'];
					$book_desc = $row_books['book_desc'];
					$book_cost = $row_books['book_cost'];
					$book_image = $row_books['book_img1'];
					
					
				    echo "
				    <div id='single_product'>
				       <h3 style='color:white; text-decoration:none;'>$book_title</h3></br>
				    <img src='images/$book_image' width='205px' height='205px'/></br>
				    <p><b style='float:left; text-decoration:none; color: White;'>Price: Rs. $book_cost </b></p>
					
					
					<a href=details.php?book_id=$book_id style='float:Right; text-decoration:none; color: Black;'>EXPLORE</a>
				    
					
				
				
					
					</div>
					";
				   
				
				
				
			
			
			}	
		}	

	}
	
function getCatBooks()

{
	global $db;

	    if(isset($_GET['cat'])){
	
              
				$cat_id= $_GET['cat'];  
				   
				$get_cat_pro="select * from books where cat_id='$cat_id' order by rand()";
				$run_cat_pro= mysqli_query($db, $get_cat_pro);
				 
				 $count = mysqli_num_rows($run_cat_pro);
				 if($count==0){
					echo "<h1>No Books found in this category!</h1>" ;
				 }
				 
				 
				while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
				{
					$book_id = $row_cat_pro['book_id'];
					$book_title = $row_cat_pro['book_title'];
					
					$book_cat = $row_cat_pro['cat_id'];
					$book_author = $row_cat_pro['book_author'];
					$book_desc = $row_cat_pro['book_desc'];
					$book_cost = $row_cat_pro['book_cost'];
					$book_image = $row_cat_pro['book_img1'];
					
					
				    echo "
				    <div id='single_product'>
				       <h3 style='color:white; text-decoration:none;'>$book_title</h3></br>
				    <img src='images/$book_image' width='205px' height='205px'/></br>
				    <p><b style='float:left; text-decoration:none; color: White;'>Price: Rs. $book_cost </b></p>
					
					
					<a href=details.php?book_id=$book_id style='float:Right; text-decoration:none; color: Black;'>EXPLORE</a>
					
					</div>
					";
				   
				}
				
				
			
			
				
		}	
	
	}	
	
	
	
function getCats(){
	
			  global $db; 
			   $get_cats = "select * from categories ";
			   $run_cats = mysqli_query($db, $get_cats);
			   while($row_cats = mysqli_fetch_array($run_cats))
			   {   
			   $cat_id= $row_cats['cat_id']; 
			   $cat_title=$row_cats['cat_title'];
			   echo " <li></br></br><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
			   
			   }  
}






?>