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

    <h1>Add Member</h1>
    <a href="index.php"><button type="button">teble</button></a><br><br>

    <form action="add.php" method="post">
        <label> First name</label>
        <input type="text" name="first_name"><br>
        <label> last name</label>
        <input type="text" name="last_name"><br>
        <label> Email</label>
        <input type="text" name="email"><br>
        <label> Phone number</label>
        <input type="text" name="phone"><br>
        <input type="submit" value="addmember">

    </form>
    
    

</body>
</html>