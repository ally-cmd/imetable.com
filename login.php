<?php
  include("connection.php");
  if (isset($_POST ("submit"))) {
 $username = $_POST("user");
 $password = $_POST("pass");

 $sql= "select * from login where usernme  = "$username" and password = "$password"";
 $result = mysqli_query($conn,$sql );
 $row =  mysqli_fetch_array( $result, MYSQLI_ ASSOC);
 $count = mysqli_num_rows($result);

  }
 
  ?>