<?php
    include "connect.php";
	require_once __DIR__ . '/vendor/autoload.php';
	mysqli_set_charset($conn, "utf8");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM person";
	
	$result = mysqli_query($conn, $sql);
	$content = "";
	if (mysqli_num_rows($result) > 0) {
		//$i = 1;
		while($row = mysqli_fetch_assoc($result)) {
			$content .= '<tr style="border:1px solid #000;">
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['id'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['firstname'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['lastname'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['email'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row['phone'].'</td>
			</tr>';
		}
	}
	
	mysqli_close($conn);
	
    $mpdf = new \Mpdf\Mpdf();

$head = '
<style>
	body{
		font-family: "Garuda";
	}
</style>

<h2 style="text-align:center">Member list</h2>

<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%">ID</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">Firstname</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="25%">Lastname</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="25%">Email</td>
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