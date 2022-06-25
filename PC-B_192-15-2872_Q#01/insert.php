<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page</title>
</head>
 
<body>
    <center>
        <?php
 
        $servername='localhost';
        $username='root';
        $password='';
        $dbname='data';
        $conn = mysqli_connect("localhost", "root", "", "data");
         
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        $name =  $_REQUEST['name'];
        $id = $_REQUEST['id'];
        $age =  $_REQUEST['age'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
         
        $sql = "INSERT INTO basicdata  VALUES ('$name',
            '$id','$age','$username','$password')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
 
            echo nl2br("\n$name\n $id\n "
                . "$age\n $username\n $password");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        if ($user) { // if user exists
            if ($user['username'] === $username) {
              array_push($errors, "Username already exists");
            }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>