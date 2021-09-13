<!DOCTYPE html>
<html>
<body>

<?php 
    include 'connect.php'; 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT id, firstname, lastname, email, phone FROM person ORDER BY id ASC";

?>

<H1>Member list</H1>
<a href="from.php"><button type="button">Add</button></a> 
<a href="save_pdf.php"><button type="button">Download</button></a> 
<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Firstname</td> 
        <td>Lastname</td> 
        <td>Email</td> 
        <td>Phone number</td>
        <td>Edit</td>
        <td>Delete</td>

      </tr>

      <?php
      if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_firstname = $row["firstname"];
            $row_lastname = $row["lastname"];
            $row_email = $row["email"];
            $row_phone = $row["phone"]; 
      ?>      
          
        <tr> 
            <td> <?php echo "$row_id"; ?> </td> 
            <td> <?php echo "$row_firstname"; ?> </td> 
            <td> <?php echo "$row_lastname"; ?> </td> 
            <td> <?php echo "$row_email"; ?> </td> 
            <td> <?php echo "$row_phone"; ?> </td>
            <td> <a href="form_edit.php?id=<?php echo "$row_id"; ?>">edit</a> </td>
            <td> <a href="delete.php?id=<?php echo "$row_id"; ?>">delete</a> </td>
        </tr>
                
        <?php
        } // end while
        $result->free();
        ?>


    <?php 
      } //end if
    $conn->close();
    ?> 
</table>
</body>
</html>