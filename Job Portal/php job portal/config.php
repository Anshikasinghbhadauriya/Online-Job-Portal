<?php


$server="localhost";
$username="root";
$password="";
$database="jobs";

$conn=mysqli_connect($server,$username,$password,$database);

if($conn-> connect_error){
   die("Connection failed:".$conn->connect_error);

}
echo"";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['phone_no'];
    $password=$_POST['password'];
}
    
    $sql="INSERT INTO "users"("Name", "email", "password", "phone_no")VALUES ('$name','$email','$password','$number')";
    if(mysql_query($conn,$sql)){

      echo "Records inserted successfully.";
} else{
      echo"ERROR:Could not able to execute $sql.". mysqli_error($conn);

}

session_start();
if(isset($_POST["Login"])){
    $email=$_POST["email"];
    $password=$_POST["password"];

    $query="SELECT"FROM users WHERE "email"="$email" AND "password"="$password";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($conn,$query);
    if(mysqli_num_rows($result)==1){
        header("location:index.php");
    
    }
    else{
        $error="emailid or password is incorrect";

    }

}

mysqli_close($conn);
?>
