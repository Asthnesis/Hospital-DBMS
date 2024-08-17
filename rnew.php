<style>
  .header {
    display: flex;
    justify-content: space-around;
    background: cadetblue;
    padding: 10px;
    margin: auto;
    width: 620px;
    margin-bottom: 5px;
  }

  body {
    background-color: lightblue;
    font-family: Arial, sans-serif;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    margin: 0;
  }

  .container {
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 600px;
  }


  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    width: 300px;
  }
.form-group input,label,button{
font-weight: bold;
height: 25px;
}

  .form-group input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
  }
</style>

<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
if (mysqli_connect_errno()) {
  echo 'Could not connect ', mysqli_connect_error();
}

?>

<body>
  <div class="header">
  <a href="receptionHome.php">Home</a>
    <a href="rnew.php">New Patient</a>
    <a href="rretrieve.php">Records</a>
  </div>

  <form method="post" action="rinsert.php">
    <div class="container">
    <h2>Saint James Park Hospital</h2>
    <img src="/logo.png" alt="" height="100px" width="100px">
      <div class="form-group">
        <label for="patientName">Full Name:</label>
        <input type="text" id="patientName" name="patientName" required>
      </div>
      <div class="form-group">
        <label for="patientAge">Age:</label>
        <input type="text" id="patientAge" name="patientAge" required>
      </div>
      <div class="form-group">
        <label for=""> Gender:</label>
        <input type="text" id="gender" name="gender" required>
      </div>
      <div class="form-group">
        <label for="phoneNo">Phone No:</label>
        <input type="text" id="phoneNo" name="phoneNo" required>
      </div>
      <div class="form-group">
        <label for="address">Address :</label>
        <input type="text" id="address" name="address" required>
      </div>
      <div class="form-group">
        <label for="next of kin">Next of kin name:</label>
        <input type="text" id="nok" name="nok" required>
      </div>
      <div class="form-group">
        <label for="next of kin phone">Next of kin Phone number :</label>
        <input type="text" id="nok_phone" name="nok_phone" required>
      </div>
      
      <div class="form-group">
        <label for="">Doctor Administering :</label>
        <input type="text" id="doctor" name="doctor" required>
      </div>
      
      <div class="form-group">
        <label for="">Ward Number :</label>
        <input type="text" id="ward" name="ward" placeholder="Optional" >
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </div>
  </form>
  </div>

</body>