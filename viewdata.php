<?php
//create short variable name
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Carbon Footprint - Calculator</title>
	<link rel="stylesheet" href="st4.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .data-display{
            padding:15px;
        }
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
     }
    </style>
</head>
</head>
<body>
	<section class="sub-header">
		<nav>
			<a href="index.html"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-close" onclick="hideMenu()"></i>
				<ul>
					<li><a href="index.html">HOME</a></li>
					<li><a href="about.html">ABOUT US</a></li>
					<li><a href="calculator.html">CALCULATOR</a></li>
                    <li><a href="viewdata.php">DATA DISPLAY</a></li>
					<li><a href="privacy.html">PRIVACY POLICY</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="showMenu()"></i>
		</nav>
			<h1>Data Display Page</h1>
            <p>only for references</p>
	</section>

<section class="data-display">
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
<th>Postcode</th>
<th>Household</th>
<th>Electricity</th>
<th>Gas Consumption</th>
<th>Petrol Consumption by car</th>
<th>Distance Travelled by car</th>
<th>Distance Travelled by bus</th>
<th>Distance Travelled by motor</th>
<th>Distance Travelled by flight</th>
<th>Total</th>
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
<td>".$line[9]."</td>
</tr>";
}
echo "</table>";
?>
</section>
<section class="footer">
		<h4>Data Display</h4>
		<div class="icons">
				<i class="fa fa-facebook"></i>
				<i class="fa fa-instagram"></i>
				<i class="fa fa-twitter"></i>
				<i class="fa fa-linkedin"></i>
		</div>
		<p>Made with <i class="fa fa-heart-o"> </i> by me</p>
	</section>

	<script>
		var navLinks = document.getElementById('navLinks');
		function showMenu() {
			navLinks.style.right = "0";
		}
		function hideMenu() {
			navLinks.style.right = "-200px";
		}
	</script>
</body>
</html>
