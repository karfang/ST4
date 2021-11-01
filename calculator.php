<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carbon Footprint Results</title>
  <link rel="stylesheet" href="st4.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
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
          <li><a href="privacy.html">PRIVACY POLICY</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
      <h1>Results</h1>
  </section>
  <section class="about-us">
  <div class="row">
    <div class="about-col"> 
<h1>Your Carbon Footprint Results</h1>
<?php
  $name = $postcode = $email = $numberOfHousehold = $kWh = $tank = $fuel = $km = $bus_distance = $motor_distance = $distance = $organic_food =$package_food =$carbon = $carbon_tonnes ="";

  $name = $_POST['name'];
  $postcode = $_POST['postcode'];
  $email = $_POST['email'];
  $numberOfHousehold = $_POST['numberOfHousehold'];
  $kwh = $_POST['kwh'];
  $tank = $_POST['tank'];
  $fuel = $_POST['fuel'];
  $km = $_POST['km'];
  $bus_distance = $_POST['bus_distance'];
  $motor_distance = $_POST['motor_distance'];
  $distance = $_POST['distance'];
  $organic_food = $_POST['organic_food'];
  $package_food = $_POST['package_food'];
  $gas = $_POST['gas'];
  $vehicle_litres = $_POST['vehicle_litres'];
  $vehicle_distance = $_POST['vehicle_distance'];
  $motor = $_POST['motor'];
  $travel = $_POST['travel'];
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  
  //calculation
  if ($gas == "small"){
    $result_gas = $tank * 19.6 * 1.665;
  }
  else if ($gas == "medium"){
    $result_gas = $tank * 23.52 * 1.665;
  }
  else if ($gas == "big"){
    $result_gas = $tank * 27.44 * 1.665;
  }

  $result_elec = ($kWh / $numberOfHousehold) * 0.741;

  if ($vehicle_litres == "petrol"){
    $result_vehicle_litres = $fuel * 2.392;
  }
  else if ($vehicle_litres == "diesel"){
    $result_vehicle_litres = $fuel * 2.64;
  }

  if ($vehicle_distance == "petrol_distance"){
    $result_vehicle_distance = $km * 0.1201;
  }
  else if ($vehicle_distance == "diesel_distance"){
    $result_vehicle_distance = $km * 0.132;
  }

  $result_bus = $bus_distance * 0.089;

  if ($motor == "below250"){
    $result_motor = $motor_distance * 0.08306;
  }
  else if ($motor == "250to500"){
    $result_motor = 0.1009 * ($motor_distance - 200);
  }
  else if ($motor == "above500"){
    $result_motor = $motor_distance * 0.13245;
  }

  if ($travel == "less"){
    $result_flight = $distance * 0.275 * 0.14;
  }
  else if ($travel == "average"){
    $result_flight = 55 + 0.105 * ($distance - 200);
  }
  else if ($travel == "many"){
    $result_flight = $distance * 0.139;
  }

  if ($organic_food == "none"){
    $result_organic_food = 700;
  }
  else if ($organic_food == "some"){
    $result_organic_food = 500;
  }
  else if ($organic_food == "most"){
    $result_organic_food = 200;
  }
  else if ($organic_food == "all"){
    $result_organic_food = 0;
  }

  if ($package_food == "very_little"){
    $result_package_food = 500;
  }
  else if ($package_food == "average"){
    $result_package_food = 300;
  }
  else if ($package_food == "above_average"){
    $result_package_food = 200;
  }
  else if ($package_food == "almost_all"){
    $result_package_food = 100;
  }

  $result_trash = 26.157;
            
  $carbon = $result_gas + $result_elec + $result_vehicle_litres + $result_vehicle_distance + $result_bus + $result_motor + $result_flight + $result_organic_food + $result_package_food+ $result_trash;     

  echo "Your Name : ".$name.".<br/>";
  echo "Your Postcode : ".$postcode.".<br/>";
  echo "Your Email : ".$email.".<br/>";
  echo "Your carbon footprints result: ".$carbon.".<br/>";

  if ($carbon == 0) {
    echo "Please fill up the data.<br/>";
   }
    if ($carbon < 0) {

    echo "Please fill up again with correct data.<br />";

  } else {

    echo $numberOfHousehold." people.<br />";
    echo $kwh." kWh.<br />";
    echo $tank." barrels.<br />";
    echo $fuel." litres.<br />";
    echo $km." km.<br />";
    echo $bus_distance." km.<br />";
    echo $motor_distance." km.<br />";
    echo $distance." km. <br />";
    echo $organic_food." consumed.<br />";
    echo $package_food." consumed.<br />";
  }

  $outputstring = $postcode."\t".$numberOfHousehold." people\t" .$kwh." kWh\t". $tank." barrel\t".$fuel." litres \t".$km." km\t" .$bus_distance." km\t".$motor_distance ." km\t". $distance." km\t" .$carbon."kg/month\n";


  @$fp =fopen("$DOCUMENT_ROOT/st4/carbon/carbon.txt", 'ab');

  flock($fp, LOCK_EX);

  if (!$fp) {
    echo "<p><strong> Something went wrong. Please try again later.</strong></p></body></html>";
    exit;
  }
       
      // write the file
  fwrite($fp, $outputstring, strlen($outputstring));
  flock($fp, LOCK_UN);
  fclose($fp);

  echo "<p>Carbon Footprint Calculated.</p>";
?>
</div>
</div>
</section>

</body>
</html>
