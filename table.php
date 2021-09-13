<?php
include 'connect.php';
//mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname, email, phone FROM person ORDER BY id ASC";
$content = "";
echo '<H1>Member list</H1>';
echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Firstname</td> 
        <td>Lastname</td> 
        <td>Email</td> 
        <td>Phone number</td>
      </tr>';
      if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_firstname = $row["firstname"];
            $row_lastname = $row["lastname"];
            $row_email = $row["email"];
            $row_phone = $row["phone"]; 
          
            echo '<tr> 
                    <td>' . $row_id . '</td> 
                    <td>' . $row_firstname . '</td> 
                    <td>' . $row_lastname . '</td> 
                    <td>' . $row_email . '</td> 
                    <td>' . $row_phone . '</td>
                  </tr>';
                
        }
        $result->free();
        echo '</table>';
        echo '<a href="from.html"><button type="button">Add</button></a>';  
    }
    
    $conn->close();
?> 
