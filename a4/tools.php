<?php

session_start();

function indexPage()
{
  if (!empty($_POST)) {
    $_SESSION['seats'] = $_POST['seats'];
    $_SESSION['movie'] = $_POST['movie'];
    $_SESSION['cust'] = $_POST['cust'];

    $date = date("Y/m/d");
    $name = $_POST['cust']['name'];
    $email = $_POST['cust']['email'];
    $mobile = $_POST['cust']['mobile'];
    $movieID = $_POST['movie']['id'];
    $day = $_POST['movie']['day'];
    $hour = $_POST['movie']['hour'];
    $STA = $_POST['seats']['STA'];
    $STP = $_POST['seats']['STP'];
    $STC = $_POST['seats']['STC'];
    $FCA = $_POST['seats']['FCA'];
    $FCP = $_POST['seats']['FCP'];
    $FCC = $_POST['seats']['FCC'];
    $total = $_POST['seats']['totalPrice'];

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $_POST = array();
      exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_POST = array();
      exit();
    }

    if (!preg_match("/^[0-9]{10}+$/", $mobile)) {
      $_POST = array();
      exit();
    }

    if ($total < 0) {
      $_POST = array();
      exit();
    }

    $file_open = fopen("bookings.csv", "a");
    $form_data = array(
      'Date'  => $date,
      'Name'  => $name,
      'Email' => $email,
      'Mobile' => $mobile,
      'MovieID' => $movieID,
      'Day' => $day,
      'Hour' => $hour,
      'STA' => $STA,
      'STP' => $STP,
      'STC' => $STC,
      'FCA' => $FCA,
      'FCP' => $FCP,
      'FCC' => $FCC,
      'Total' => $total
    );
    fputcsv($file_open, $form_data);
    $date = '';
    $name = '';
    $email = '';
    $mobile = '';
    header("Location: ./receipt.php");
    exit();
  }
}

function receiptPage()
{
  if (!$_SESSION) {
    header("Location: ./index.php");
    exit();
  } else {
    $_POST = array();
  }
}

function generateTickets()
{
  $seats = $_SESSION['seats'];
  foreach ($seats as $seatType => $value) {
    for ($index = 0; $index < $value && $seatType != "totalPrice"; $index++) {

      echo  '<div class="ticket-style">
                <img src="../../media/ticketbg.png" alt="ticket">
                <h2>LUNARDO</h2>
                <br>
                <div class="movie-name">'. getMovieName($_SESSION['movie']['id']) .'</div>
                <br>
                <div class="ticket-type">'. getSeatType($seatType) .'</div>

                <div class="details">
                    <table>
                        <tr>
                            <th>PRICE</th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>RATING</th>
                        </tr>
                        <tr>
                            <td>$'. getSeatPrice('STA') .'</td>
                            <td>'. $_SESSION['movie']['day'] .'</td>
                            <td>'. getTime($_SESSION['movie']['hour']) .'</td>
                            <td>R</td>
                        </tr>
                    </table>
                </div>
            </div>';
    }
  }
}

function generateTaxInvoiceRows()
{
  $seats = $_SESSION['seats'];

  foreach ($seats as $seatType => $value) {
    if ($value > 0 && $seatType != "totalPrice") {
      echo '<tr>
              <td>'. $value .'</td>
              <td>'. getSeatType($seatType) .'</td>
              <td>'. getSeatPrice($seatType) .'</td>
              <td>'. $value * getSeatPrice($seatType) .'</td>
            </tr>';
    }
  }
}

function isFullOrDiscount($day, $hour)
{
  $ret = "full";
  if ($day != "Sat" && $day != "Sun")
    $ret = "discount";
  if ($hour != "T12" && $day != "Mon" && $day != "Wed")
    $ret = "full";
  return $ret;
}

function getSeatPrice($seat)
{
  $ret = isFullOrDiscount($_SESSION['movie']['day'], $_SESSION['movie']['hour']);

  $prices = [
    'full' => [
      'STA' => 19.8,
      'STP' => 17.5,
      'STC' => 15.30,
      'FCA' => 30.00,
      'FCP' => 27.00,
      'FCC' => 24.00

    ],
    'discount' => [
      'FCA' => 24.00,
      'FCP' => 22.50,
      'FCC' => 21.00,
      'STA' => 14.00,
      'STP' => 12.50,
      'STC' => 11.00
    ]
  ];

  foreach ($prices[strval($ret)] as $index => $price) {
    if ($index == $seat) {
      return $price;
    }
  }
}

function getSeatType($seat)
{
  $seatType = [
    'STA' => "STANDARD ADULT",
    'STP' => "STANDARD CONCESSION",
    'STC' => "STANDARD CHILD",
    'FCA' => "FIRST CLASS ADULT",
    'FCP' => "FIRST CLASS CONSESSION",
    'FCC' => "FIRST CLASS CHILD"
  ];

  foreach ($seatType as $shortform => $fullname) {
    if ($shortform == $seat) {
      return $fullname;
    }
  }
}

function getMovieName($movieID)
{
  $movieList = [
    'ACT' => "Avengers: Endgame",
    'RMC' => "Top End Wedding",
    'ANM' => "Dumbo",
    'AHF' => "The Happy Prince",
  ];

  foreach ($movieList as $shortform => $fullname) {
    if ($shortform == $movieID) {
      return $fullname;
    }
  }
}

function getTime($timecode)
{
  $time = filter_var($timecode, FILTER_SANITIZE_NUMBER_INT);
  if ($time > 12) {
    $time = $time - 12;
  }
  return $time . "PM";
}

function preShow($arr, $returnAsString = false)
{
  $ret = "<pre>" . print_r($arr, true) . "</pre>";
  if ($returnAsString)
    return $ret;
  else
    echo $ret;
}

function printMyCode()
{
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line) {
    echo '<li>' . rtrim(htmlentities($line)) . '</li>';
  }

  echo '</ol></pre>';
}

// preShow($_POST);​
// ​// ie echo a string  preShow($_SESSION);
// $aaarg = preShow($my_bad_array, true);
// ​// ie return as a string
// echo "Why is \n $aaarg \n not working?";

function php2js($arr, $arrName)
{
  $lineEnd = "";
  echo "<script>\n";
  echo "/* Generated with A4's php2js() function */";
  echo "  var $arrName = " . json_encode($arr, JSON_PRETTY_PRINT);
  echo "</script>\n\n";
}

//$pricesArrayPHP = array ( ... );  
//php2js($pricesArrayPHP, 'pricesArrayJS');​ ​// ie echos javascript equivalent code  
