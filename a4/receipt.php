<?php
include 'tools.php';
receiptPage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>

    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link rel="stylesheet" type="text/css" href="receipt.css?t=<?php echo filemtime("style.css"); ?>" />
    <script src="tools.js?t=<?php echo filemtime("tools.js"); ?>"></script>
    <script src='../wireframe.js'></script>
</head>

<body>

    <header>
        <div>LUNARDO</div>
    </header>

    <nav id="navbar">
        <a href="./index.php">Back to front page</a>
        <a href="" class="active">Receipt</a>
    </nav>

    <section class="invoice">
        <div class="inner">
            <div class="invoicePaper">
                <div class="content">
                    <div class="title">
                        <h1>LUNARDO</h1>
                    </div>
                    <div class="address">
                        <p>ABN: 00 123 456 789</p>
                        <p>2573 Lang Avenue, Portage,<br>UT, Utah, 84331</p>
                        <p>435-866-0270</p>
                        <p>lunardo_cinemas@gmail.com</p>
                    </div>

                    <div class="custInfo">
                        <?php echo  $_SESSION['cust']['name'] ?><br>
                        <?php echo  $_SESSION['cust']['email'] ?><br>
                        <?php echo  $_SESSION['cust']['mobile'] ?><br><br>
                        <div class="movie-name"><?php echo getMovieName($_SESSION['movie']['id']); ?></div>
                        <div class="day">DAY: <?php echo $_SESSION['movie']['day'] ?></div>
                        <div class="hour">TIME: <?php echo getTime($_SESSION['movie']['hour']); ?></div>
                    </div>

                    <div class="tax-invoice">
                        <h1>Tax Invoice</h1>
                        <p>Issued on: <?php echo date("d/m/Y"); ?></p>
                    </div>

                    <div class="seat">
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
                                <td>GST:</td>
                                <td>$<?php echo getGST($_SESSION['seats']['totalPrice']); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td>$<?php echo $_SESSION['seats']['totalPrice'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ticket">
        <div class="inner">
            <div class="tickets-container">
                <?= generateTickets(); ?>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <div class="inner">
            <div id="head" class="verticle_block">
                <h1>LUNARDO</h1>
                <p>We make connections.<br> This is your Future Cinematic.</p>
            </div>
            <div id="explore" class="verticle_block">
                <h3>Explore</h3>
                <a href="#home">Home</a>
                <a href="#about_us">About Us</a>
                <a href="#price">Prices</a>
                <a href="#now_showing">Now Showing</a>
            </div>
            <div id="contact_details" class="verticle_block">
                <h3>Visit</h3>
                <p>2573 Lang Avenue, Portage,<br>UT, Utah, 84331</p>
                <h3>Contact</h3>
                <p>435-866-0270</p>
                <p>lunardo_cinemas@gmail.com</p>
            </div>
            <div id="follow" class="verticle_block">
                <h3>Follow</h3>
                <a>Instagram</a>
                <a>Facebook</a>
                <a>Twitter</a>
            </div>
            <div id="legal" class="verticle_block">
                <h3>Legal</h3>
                <a>Terms</a>
                <a>Privacy</a>
            </div>

            <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
            <div id="personal_details" class="foot">&copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Teoh Jie Sheng (s3744010), Choong Wan Si (s3733738) | A2-s3744010-s3733738. Last modified
                <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
            <div class="foot">Disclaimer: This website is not a real website and is being developed as part of a School of
                Science Web
                Programming course at RMIT University in Melbourne, Australia.</div>
        </div>
    </footer>

    <?php session_destroy(); ?>

</body>

</html>