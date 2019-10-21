<?php
include 'tools.php';
receiptPage();
?>
<!DOCTYPE html>
<html lang="en">

<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat");
    @import url("https://fonts.googleapis.com/css?family=Blinker&display=swap");
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    @font-face {
        src: url(../../fonts/Bebas_Neue.ttf);
        font-family: Bebas Neue;
    }

    :root {
        --main-bg-color: #0B0C10;
        --secondary-bg-color: #1F2833;
        --main-cont-color: #66FCF1;
        --secondary-cont-color: #45A29E;
        --main-font-color: #C5C6C7;
    }

    body{
        background-image: url(../../media/blue-movie.jpg);
        background-attachment: fixed;
        background-position: center;
     background-repeat: no-repeat;
    background-size: cover;
    }

    .invoice {
        display: block;
        background: rgba(0,0,0,.7);
        border: 1px solid var(--main-font-color);
        height: auto;
        width: auto;
        padding: 50px;
        margin-top: 50px;
        margin-left: 200px;
        margin-right:200px;
        margin-bottom: 50px;

    }

    @media print {
        *,
    *:before,
    *:after {
       
        color: #000 !important; // Black prints faster: h5bp.com/s
       
    }
        body{
            background:white;
        }
        .frontpagebtn {
            display: none;
        }

        .invoice {
            display: block;
            background: white;
            border: 1px solid black;
            margin: 0%;
            height: 50%;
            width: 50%;
            padding: 20px;
            position: relative;
            left: 20%;
            color:black;

        }

        .ticket .ticket-grid{
        display:grid;
        grid-template-columns: auto auto auto auto !important;
        grid-row-gap: 50px;
        grid-column-gap: 20px;
        margin: 10px;
    }
    }


    .invoice .inner {
        display: block;
        width: 100%;
        color: var(--main-font-color);
    }

    .invoice .h1 {
        display: grid;

    }

    .invoice .h2 {
        display: block;
        justify-content: left;
    }

    .invoice .inner table {
        border-collapse: collapse;
        width: 100%;
        height: 200px;
        margin-top:30px;
        box-shadow: 0 0 10px 2px #f5f5f5b2;
    }

    .invoice .inner table th,
    td {
        padding: 8px;
        text-align: left;
        font-family: "Montserrat", sans-serif;
        font-size: 15px;
    }

    .invoice .inner .top {

        display: inline-block;
        font-family: "Montserrat", sans-serif;
        font-size: 18px;


    }

    .invoice .inner .custInfo {


        display: inline-block;
        font-family: "Montserrat", sans-serif;
        font-size: 18px;
        padding-left: 45%;


    }

    .ticket {

        height: 100%;
        width: 60%;
        color:white;
        margin-left: 100px;
        margin-right:100px;

       

    }

    .ticket img{
        background: rgba(0,0,0,.7);
        border: 1px solid white;
    }
    .ticket .ticket-style {
        position: relative;
        font-family: "Montserrat", sans-serif;
    }

    .ticket .ticket-style h2 {
        position: absolute;
        top: 5px;
        left: 400px;
        padding: 20px;

    }

    .ticket .ticket-style .movie-name {
        position: absolute;
        top: 15px;
        left: 10px;
        padding: 30px;
        font-size: 35px;
    }

    .ticket .ticket-style .ticket-type {
        position: absolute;
        top: 60px;
        left: 10px;
        padding: 30px;
        font-size: 27px;

    }

    .ticket .ticket-style .details {
        position: absolute;
        top: 130px;
        left: 10px;
        padding: 30px;
        font-size: 25px;

    }

    .ticket .ticket-style .details th,
    td {
        margin: 0px;
        padding-left: 30px;
        text-align: left;

    }

    .ticket .ticket-grid{
        display:grid;
        grid-template-columns: auto auto;
        grid-row-gap: 50px;
        grid-column-gap: 20px;
        margin: 10px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="frontpagebtn"><a href="./index.php">Back to front page</a></div>
    <section class="invoice">
        <div class="inner">
            <h1>Tax Invoice</h1>
            <h2>LUNARDO</h2>
            <div class="top">
                <a>ABN: 00 123 456 789</a>
                <div class="movie-name"><?php echo getMovieName($_SESSION['movie']['id']); ?></div>
                <div class="day">DAY: <?php echo $_SESSION['movie']['day'] ?></div>
                <div class="hour">TIME: <?php echo getTime($_SESSION['movie']['hour']); ?></div>
            </div>
            <div class="custInfo">

                <?php echo  $_SESSION['cust']['name'] ?><br>
                <?php echo  $_SESSION['cust']['email'] ?><br>
                <?php echo  $_SESSION['cust']['mobile'] ?><br>
            </div>
            <div class="seat-deatails">
                <table>
                    <tr>
                        <th>QTY</th>
                        <th>ITEM</th>
                        <th>PRICE</th>
                        <th>SUBTOTAL</th>
                    </tr>
                    <?php generateTaxInvoiceRows(); ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td>Total:</td>
                    <td><?php echo $_SESSION['seats']['totalPrice']?></td>
                </table>
            </div>
          
        </div>
    </section>

    <section class="ticket">
        <h1>Ticket</h1>
        <div class="container">
           <div class="ticket-grid"><?= generateTickets(); ?></div>
        </div>

    </section>
</body>

</html>