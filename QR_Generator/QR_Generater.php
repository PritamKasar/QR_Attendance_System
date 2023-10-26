<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>QR Code Generator in JavaScript</title>
  <link rel="stylesheet" href="QR_Gen_Style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <nav>
    <div class="logo">
      <P> Attendance </P>
    </div>
    <ul>
      <li><a href="First.html">Home</a></li>
      <li><a href="QR_Generater.html">Student Registration</a></li>
      <li><a href="QR_Attendance.html">Take Attendance</a></li>
      <li><a href="#">Log-Out</a></li>
    </ul>
  </nav>
  <div class="middle-image">
    <!-- <img src="img/3.jpg" alt=""> -->
  </div>
  <div class="qr">
    <header>
      <h1>Generator QR Code </h1>
    </header>
    <div class="form">
      <div class="i1"><input class="d1" type="text" spellcheck="false" required>
        <span></span>
        <label>Enter Full Name</label>
      </div>
      <div class="i1">
        <input class="d2" type="number" required>
        <span></span>
        <label>PRN</label>
      </div>
      <div class="i1">
        <input class="d3" type="email" required>
        <span></span>
        <label>Email</label>
      </div>
      <div class="i1">
        <input class="d4" type="number" required>
        <span></span>
        <label>Mobile Number</label>
      </div>
      <button class="btn">Generate QR Code</button>
      <button class="dbtn" disabled="disabled">Download QR Code</button>
    </div>
    <div class="qr-code">
      <img src="" alt="qr-code">
    </div>
  </div>
  <footer>
    <p class="bott">Svkm's Institude Of Technology Dhule</p>

  </footer>


  <script type="text/JavaScript" src="QR_Gen_Script.js"></script>



</body>

</html>