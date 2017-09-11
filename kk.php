<?php
include("includes/db.php");
include("functions/functions.php");
?>
<html>
<head>
</head>
<body>
<ul>
                       <?php 
	           $get_dept = "select * from cat";
			   $run_dept = mysqli_query($con, $get_dept);
			   while($row_dept = mysqli_fetch_array($run_dept))
			   {   
			   $d_id= $row_dept['cat_id']; 
			   $d_name=$row_dept['cat_title'];
			   echo "<li><a href='category.php?cat=$d_id'>$d_name</a></li>";
			   }
			   ?>
                                              									  
                                          </ul>    
</body>
</html>