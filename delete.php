<?php
    include 'connect.php';
    //print_r($_GET);
    $id = $_GET['id'];

    $sql = "DELETE FROM person WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>DELETE member id $id successfully</p>";
        echo "<a href='index.php'>Back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

?>