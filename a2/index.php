<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 2</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link rel="stylesheet" type="text/css" href="style.css?t=<?php echo filemtime("style.css"); ?>" />
  <script src="tools.js?t=<?php echo filemtime("tools.js"); ?>"></script>
  <script src='../wireframe.js'></script>
</head>

<body>
  <a id="home"></a>
  <header>
    <div>LUNARDO</div>
  </header>

  <nav id="navbar">
    <a href="#home">Home</a>
    <a href="#about_us">About Us</a>
    <a href="#price">Prices</a>
    <a href="#now_showing">Now Showing</a>
  </nav>

  <div class="intro">
    <div class="inner">
      <div class="content">
        <h1>Welcome</h1>
        <h2>Future Cinematic</h2>
        <button onclick="scrollFunction">Now Showing</button>
      </div>
    </div>
  </div>

  <main>
    <a id="about_us" class="section_anchors"></a>
    <section class="about_us">
      <div class="inner">
        <div class="gridContainer">
          <div class="header">
            <h1>About Us</h1>
          </div>
          <div class="main1">
            <p>After taking into consideration your valuable feedback, we have finally reopened. The cinema has gone
              through extensive renovations and countless improvements, and is now equipped with state of the art
              projection and sound systems - 3D Dolby Vision projection and Dolby Atmos sound
              Cinemas are now also furnished with brand new chairs, with the choice for an upgrade.
            </p>
          </div>
          <div class="video">
            <video controls>
              <source src="../../media/dolby-atmos-overview.mp4" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>
          </div>
          <div class="main2">
            <p>Introducing the new First Class seating - fully reclinable with automated footrests. Available for twin
              and single seating. Our new range of standard seating also comes with contoured backrests and fully
              leathered headrests.</p>
          </div>
          <div class="stdClass">
            <div class="inner">
              <div class="content">
                <h2>Standard</h2>
              </div>
            </div>
          </div>

          <div class="fstClass">
            <div class="inner">
              <div class="content">
                <h2>First Class</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <a id="price" class="section_anchors"></a>
    <section class="price">
      <div class="inner">
        <div class="content">
          <div class="heading">
            <h1>PRICE</h1>
            <p>We offers discounted pricing weekday afternoons,and all day on Mondays and Wednesdays!</p>
          </div>
          <table>
            <tr>
              <th>Seat Type</th>
              <th>Seat Code</th>
              <th>Discounted</th>
              <th>Standard Price</th>
            </tr>
            <tr>
              <td>Standard Adult</td>
              <td>STA</td>
              <td>14.00</td>
              <td>19.80</td>
            </tr>
            <tr>
              <td>Standard Consession</td>
              <td>STP</td>
              <td>12.50</td>
              <td>17.50</td>
            </tr>
            <tr>
              <td>Standard Child</td>
              <td>STC</td>
              <td>11.00</td>
              <td>15.30</td>
            </tr>
            <tr>
              <td>First Class Adult</td>
              <td>FCA</td>
              <td>24.00</td>
              <td>30.00</td>
            </tr>
            <tr>
              <td>First Class Consession</td>
              <td>FCP</td>
              <td>22.50</td>
              <td>27.00</td>
            </tr>
            <tr>
              <td>First Class Child</td>
              <td>FCC</td>
              <td>21.00</td>
              <td>24.00</td>
            </tr>
          </table>
        </div>
      </div>
    </section>

    <a id="now_showing" class="section_anchors"></a>
    <section class="now_showing">
      <div class="inner">

        <h1>Now Showing</h1>
        <div class="movie-container">

          <div class="movie">
            <div class="poster">
              <div class="img">
                <img src="../../media/avengers.jpg" alt="Image 1">
              </div>
            </div>
            <div class="title">
              <p>Avengers: End Game</p>
            </div>
            <div class="time">
              <div class="inner">
                <div>Wed - 9PM </div>
                <div>Thurs - 9PM </div>
                <div>Fri - 9PM </div>
                <div>Sat - 6PM </div>
                <div>Sun - 6PM </div>
              </div>

            </div>
          </div>
          <div class="movie">
            <div class="poster">
              <div class="img">
                <img src="../../media/top-end-wedding.jpeg" alt="Image 2">
              </div>
            </div>
            <div class="title">
              <p>Top End Wedding</p>
            </div>
            <div class="time">
              <div class="inner">
                <div>Mon - 6PM </div>
                <div>Tues - 6PM </div>
                <div>Sat - 3PM </div>
                <div>Sun - 3PM </div>
              </div>

            </div>
          </div>
          <div class="movie">
            <div class="poster">
              <div class="img">
                <img src="../../media/dumbo.jpg" alt="Image 3">
              </div>
            </div>
            <div class="title">
              <p>Dumbo</p>
            </div>
            <div class="time">
              <div class="inner">
                <div>Mon - 12PM </div>
                <div>Tues - 12PM </div>
                <div>Wed - 6PM </div>
                <div>Thurs - 6PM </div>
                <div>Fri - 6PM </div>
                <div>Sat - 12PM </div>
                <div>Sun - 12PM </div>
              </div>
            </div>
          </div>
          <div class="movie">
            <div class="poster">
              <div class="img">
                <img src="../../media/theHappyPrince.jpg" alt="Image 4">
              </div>
            </div>
            <div class="title">
              <p>The Happy Prince</p>
            </div>
            <div class="time">
              <div class="inner">
                <div>Wed - 12PM </div>
                <div>Thurs - 12PM </div>
                <div>Fri - 12PM </div>
                <div>Sat - 9PM </div>
                <div>Sun - 9PM </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="synopsis">
      <div class="inner">
        <div class="synoposis-container">
          <div class="endgame">
            <h1>Avengers: End Game</h1>
            <div class="plot">
              <h2>Plot Description</h2>
              <p>
                Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply
                starts to dwindle.
                Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure
                out a way to bring back
                their vanquished allies for an epic showdown with Thanos --
                the evil demigod who decimated the planet and the universe.
              </p>
            </div>
            <div class="trailer">
              <iframe frameBorder="0" src="https://www.youtube.com/embed/TcMBFSGVi1c">
              </iframe>
            </div>
          </div>

          <div class="booking">
            <p>Make A Booking:</p>
            <div class="time">
              <div>Wed - 9PM </div>
              <div>Thurs - 9PM </div>
              <div>Fri - 9PM </div>
              <div>Sat - 6PM </div>
              <div>Sun - 6PM </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

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
        <a href="#">Book A Ticket</a>
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
        <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div class="foot">Disclaimer: This website is not a real website and is being developed as part of a School of
        Science Web
        Programming course at RMIT University in Melbourne, Australia.</div>
    </div>
  </footer>

  <script src="script.js"></script>
  <script>
    window.onscroll = function () {
      scrollFunction();
    };
  </script>

</body>

</html>