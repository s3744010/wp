<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 2</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="./style.css">
  <script src='../wireframe.js'></script>
</head>

<body>
  <header>
    <div>LUNARDO</div>
  </header>

  <nav id="navbar">
    <a href="#home">Home</a>
    <a href="#about_us">About Us</a>
    <a href="#prices">Prices</a>
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
    <a id="about_us" class="about_us"></a>
    <section class="about_us">
      <div class="improvements_container">
        <div class="inner">
          <h1>About Us</h1>
          <div class="content_container">
            <div class="content">
              <p>The cinema has reopened after extensive improvements and renovations. The projection and sound
                systems are upgraded with 3D Dolby Vision projection and Dolby Atmos sound.</p>
            </div>
            <video controls>
              <source src="../../media/dolby-atmos-overview.mp4" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>
          </div>
        </div>
      </div>
      <div class="seats_container">
        <div class="inner">
          <p>We have made improvements to the seats.</p>
          <div class="standard_class">
            <img src="../../media/standard_class.png" alt="Standard Class Seat">
            <div class="content">
              <h2>Standard</h2>
            </div>
          </div>
          <div class="first_class">
            <img src="../../media/first_class.png" alt="First Class Seat">
            <div class="content">
              <h2>First Class</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="prices">

    </section>
  </main>

  <footer>
    <div>&copy;
      <script>
        document.write(new Date().getFullYear());
      </script> Teoh Jie Sheng (s3744010), Choong Wan Si (s3733738) and group name here. Last modified
      <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
      Programming course at RMIT University in Melbourne, Australia.</div>
    <!-- <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div> -->
  </footer>

  <script src="script.js"></script>
  <script>
    window.onscroll = function () {
      scrollFunction();
    };
  </script>

</body>

</html>