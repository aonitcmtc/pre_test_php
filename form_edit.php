<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Member</title>

    <style>
        label{
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
    </style>

</head>
<body>
    <?php
        include "connect.php";
        $id = $_GET['id'];
        //echo $id;
        $query = "SELECT * FROM person WHERE id = $id";
        $result = mysqli_query($conn, $query) or die ("Error in sql : $query".
        mysqli_error($query));
        $row = mysqli_fetch_array($result);
        //print_r($row);
    ?>

    <h1>Add Member</h1>
    <a href="index.php"><button type="button">teble</button></a><br><br>

    <form action="edit.php" method="post">
        <label> ID</label>
        <input type="text" name="id" value="<?php echo $row['id'];?>" readonly><br>
        <label> First name</label>
        <input type="text" name="first_name" value="<?php echo $row['firstname'];?>"><br>
        <label> last name</label>
        <input type="text" name="last_name" value="<?php echo $row['lastname'];?>"><br>
        <label> Email</label>
        <input type="text" name="email" value="<?php echo $row['email'];?>"><br>
        <label> Phone number</label>
        <input type="text" name="phone" value="<?php echo $row['phone'];?>"><br>
        <input type="submit" value="Update member">

    </form>
    
    

</body>
</html>