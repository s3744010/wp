<?php

session_start();

function indexPage()
{
  if (!empty($_POST)) {
    $_SESSION['movie'] = $_POST['movie'];
    $_SESSION['cust'] = $_POST['cust'];
    $_SESSION['seats'] = $_POST['seats'];

    $_POST = array();

    $errors = 0;

    $name = $_SESSION['cust']['name'];
    $email = $_SESSION['cust']['email'];
    $mobile = $_SESSION['cust']['mobile'];
    $movieID = $_SESSION['movie']['id'];
    $day = $_SESSION['movie']['day'];
    $hour = $_SESSION['movie']['hour'];
    $total = $_SESSION['seats']['totalPrice'];

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $errors++;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors++;
    }

    if (!preg_match("/^[0-9]{10}+$/", $mobile)) {
      $errors++;
    }

    if ($total <= 0) {
      $errors++;
    }

    if ($errors > 0) {
      
      header("Location: ./index.php");
    } else {
      saveData();
      header("Location: ./receipt.php");
    }
  }
}

function saveData() {
  // $file_open = fopen("bookings.txt", "a");
    $form_data = array(
      'data' => array(
        'Date'  => date("Y/m/d"),
        'Name'  => $_SESSION['cust']['name'],
        'Email' => $_SESSION['cust']['email'],
        'Mobile' => $_SESSION['cust']['mobile'],
        'MovieID' => $_SESSION['movie']['id'],
        'Day' => $_SESSION['movie']['day'],
        'Hour' => $_SESSION['movie']['hour'],
        'STA' => $_SESSION['seats']['STA'],
        'STP' => $_SESSION['seats']['STP'],
        'STC' => $_SESSION['seats']['STC'],
        'FCA' => $_SESSION['seats']['FCA'],
        'FCP' => $_SESSION['seats']['FCP'],
        'FCC' => $_SESSION['seats']['FCC'],
        'Total' => $_SESSION['seats']['totalPrice']
      )
    );

    $filename = "bookings.txt";
    $file_open = fopen($filename,"a");
    flock($file_open, LOCK_EX);
    foreach ($form_data as $data)
        fputcsv($file_open, $data, "\t");
    flock($file_open, LOCK_UN);
    fclose($file_open);
}

function receiptPage()
{
  if (!$_SESSION) {
    header("Location: ./index.php");
  }
}

function generateTickets()
{
  $seats = $_SESSION['seats'];
  foreach ($seats as $seatType => $value) {
    for ($index = 0; $index < $value && $seatType != "totalPrice"; $index++) {

      echo '<div class="ticket-style">
              <div class="ticket-details">
                <div class="movie-name">'. getMovieName($_SESSION['movie']['id']) .'</div>
                <div class="title">LUNARDO</div>
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
                      <td>$'. getSeatPrice($seatType) .'</td>
                      <td>'. $_SESSION['movie']['day'] .'</td>
                      <td>'. getTime($_SESSION['movie']['hour']) .'</td>
                      <td>R</td>
                    </tr>
                  </table>
                </div>
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
              <td>$'. getSeatPrice($seatType) .'</td>
              <td>$'. number_format((float)($value * getSeatPrice($seatType)), 2, '.', '') .'</td>
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
      return number_format((float)$price, 2, '.', '');
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
  return null;
}

function getTime($timecode)
{
  $time = filter_var($timecode, FILTER_SANITIZE_NUMBER_INT);
  if ($time > 12) {
    $time = $time - 12;
  }
  return $time . "PM";
}

function getGST($price) {
  return number_format((float)($price / 11), 2, '.', '');
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
