<?php
include 'connect.php';


//mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
//$sql = "SELECT id, firstname, lastname, email, phone FROM person ORDER BY id ASC";
$sql = "SELECT * FROM person";
$content = "";

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_firstname = $row["firstname"];
            $row_lastname = $row["lastname"];
            $row_email = $row["email"];
            $row_phone = $row["phone"]; 

            $content .= '
                <tr style="border:1px solid #000;padding:4px;> 
                    <td style="border:1px solid #000;padding:3px;text-align:center;">' . $row_id . '</td> 
                    <td style="border:1px solid #000;padding:3px;text-align:center;">' . $row_firstname . '</td> 
                    <td style="border:1px solid #000;padding:3px;text-align:center;">' . $row_lastname . '</td> 
                    <td style="border:1px solid #000;padding:3px;text-align:center;">' . $row_email . '</td> 
                    <td style="border:1px solid #000;padding:3px;text-align:center;">' . $row_phone . '</td>
                </tr>';
   
                
        }
        $result->free();        
    }
 
$head = '
<style>
    body{
        font-family: "Garuda";
    }
</style>
 
<h2 style="text-align:center">Member</h2>
 
<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ID</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="25%">Firstname</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="25%">Lastname</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="30%">Email</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">Phone number</td>
    </tr>
 
</thead>
    <tbody>';
    
$end = "</tbody>
</table>";

$mpdf->WriteHTML($head); 
$mpdf->WriteHTML($content); 
$mpdf->WriteHTML($end); 
$mpdf->Output();
    
$conn->close();
?> 
