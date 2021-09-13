<?php
    include 'connect.php';
    //print_r($_POST);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phones = $_POST['phone'];

    $sql = "INSERT INTO person (firstname, lastname, email, phone)
            VALUES ('$first_name','$last_name','$email','$phones')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Add member successfully</p>";
        echo "<a href='from.php'>Back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

?>