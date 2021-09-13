<?php
    include 'connect.php';
    //print_r($_POST);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phones = $_POST['phone'];
    $id = $_POST['id'];

    $sql = "UPDATE person SET firstname='$first_name', lastname='$last_name', email='$email', phone='$phones' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Update member successfully</p>";
        echo "<a href='index.php'>Back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

?>