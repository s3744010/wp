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

    .invoice {
        display: block;
        background: white;
        border: 1px solid black;
        height: auto;
        width: auto;
        padding: 100px;
        margin: 80px;

    }

    .invoice .inner {
        display: block;
        width: 100%;
        color: black;
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

        font-size: 20px;

    }

    .ticket {

        height: 100%;
        width: 80%;
        padding: 100px;



    }

    .ticket .container {
        display: block;
        background: #f8de7e;
        height: 280px;
        width: 600px;

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
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="./index.php">Back to front page</a>
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
                </table>
            </div>
        </div>
    </section>

    <section class="ticket">
        <h1>Ticket</h1>
        <div class="container">

            <!-- <div class="ticket-style">
                <img src="../../media/ticketbg.png" alt="ticket">
                <h2>LUNARDO</h2>
                <br>
                <div class="movie-name">DUMBO</div>
                <br>
                <div class="ticket-type"> ADULT STANDARD </div>

                <div class="details">
                    <table>
                        <tr>
                            <th>PRICE</th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>RATING</th>
                        </tr>
                        <tr>
                            <td>$10</td>
                            <td><?php echo  $_SESSION['movie']['day'] ?></td>
                            <td><?php echo  $_SESSION['movie']['hour'] ?></td>
                            <td>R</td>
                        </tr>
                    </table>
                </div>
            </div> -->
            <?= generateTickets(); ?>
        </div>
    </section>
</body>

</html>