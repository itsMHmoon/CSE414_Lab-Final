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

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    

    $name = (!empty($_POST['name'])) ? $_POST['name'] : '';
    $id = (!empty($_POST['id'])) ? $_POST['id'] : '';
    $age = (!empty($_POST['age'])) ? $_POST['age'] : '';
    $username = (!empty($_POST['username'])) ? $_POST['username'] : '';
    $password = (!empty($_POST['password'])) ? $_POST['password'] : '';
    

    if (!empty($name)) {
        // update the record
        $stu_query = "UPDATE `student` SET id='" . $id . "', age='" . $age . "', username= '" . $username . ' ",  password= '" . $password;
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `student` (id, age, username) VALUES ('" . $id . "', '" . $age . "', '" . $username . "')";
        $msg = "add";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/index.php?msg=' . $msg);
    }

}

if (isset($_GET['name']) && $_GET['name'] != '') {
    // require the db connection
    include 'connection.php'; 

    $name = $_GET['name'];
    $stu_query = "SELECT * FROM `student` WHERE name='" . $name . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $id = $results[1];
    $age = $results[2];
    $username = $results[3];
    

} else {
    $id = "";
    $age = "";
    $username = "";
    $name = "";
}

?>
