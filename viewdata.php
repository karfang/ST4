<?php
//create short variable name
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Carbon Footprints Data</title>
</head>
<body>
<h1>Carbon Footprint Data</h1>
<h3>Only for references</h3>
<?php
$carbon= file("$DOCUMENT_ROOT/st4/carbon/carbon.txt"); 

$number_of_data = count($carbon);
if ($number_of_data == 0) 
{
echo "<p><strong>No data yet.
Please try again later.</strong></p>";
}
echo"All data are calculated on montly basis.";
echo "<table>";
echo "<tr>
<th bgcolor=\"#CCCCFF\">Postcode</th>
<th bgcolor=\"#CCCCFF\">Household</th>
<th bgcolor=\"#CCCCFF\">Electricity</th>
<th bgcolor=\"#CCCCFF\">Gas Consumption</th>
<th bgcolor=\"#CCCCFF\">Petrol Consumption by car</th>
<th bgcolor=\"#CCCCFF\">Distance Travelled by car</th>
<th bgcolor=\"#CCCCFF\">Distance Travelled by bus</th>
<th bgcolor=\"#CCCCFF\">Distance Travelled by motor</th>
<th bgcolor=\"#CCCCFF\">Distance Travelled by flight</th>
<th bgcolor=\"#CCCCFF\">Organic Food Consumption</th>
<th bgcolor=\"#CCCCFF\">Packaging Food Consumption</th><
<th bgcolor=\"#CCCCFF\">Total</th>
<tr>";
for ($i=0; $i<$number_of_data; $i++) {

$line = explode("\t", $carbon[$i]);
$line[1] = intval($line[1]);
$line[2] = intval($line[2]);
$line[3] = intval($line[3]);
$line[4] = intval($line[4]);
$line[5] = intval($line[5]);
$line[6] = intval($line[6]);
$line[7] = intval($line[7]);
$line[8] = intval($line[8]);
$line[9] = intval($line[9]);
$line[10] = intval($line[10]);
$line[11] = intval($line[11]);
$line[12] = intval($line[12]);

// output each order
echo "<tr>
<td>".$line[0]."</td>
<td align=\"right\">".$line[1]."</td>
<td align=\"right\">".$line[2]."</td>
<td align=\"right\">".$line[3]."</td>
<td align=\"right\">".$line[4]."</td>
<td align=\"right\">".$line[5]."</td>
<td align=\"right\">".$line[6]."</td>
<td align=\"right\">".$line[7]."</td>
<td align=\"right\">".$line[8]."</td>
<td align=\"right\">".$line[9]."</td>
<td align=\"right\">".$line[10]."</td>
<td align=\"right\">".$line[11]."</td>
<td>".$line[12]."</td>
</tr>";
}
echo "</table>";
?>
</body>
</html>
