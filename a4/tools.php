<?php

session_start();

function indexPage()
{
  if ($_POST) {
    $_SESSION['seats'] = $_POST['seats'];
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
    preShow($_SESSION);
    $_POST = array();
  }
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
