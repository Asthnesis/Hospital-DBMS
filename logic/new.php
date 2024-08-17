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
    <a href="home.php">Home</a>
    <a href="new.php">New Patient</a>
    <a href="retrieve.php">Records</a>
  </div>

  <form method="post" action="insert.php">
    <div class="container">
    <h2>Saint James Park Hospital</h2>
    <img src="/logo.png" alt="" height="100px" width="100px">
      <div class="form-group">
        <label for="patientName">Patient Name:</label>
        <input type="text" id="patientName" name="patientName" required>
      </div>
      <div class="form-group">
        <label for="admissionNo">Admission No:</label>
        <input type="text" id="admissionNo" name="admissionNo" required>
      </div>
      <div class="form-group">
        <label for="patientAge">Patient Age:</label>
        <input type="text" id="patientAge" name="patientAge" required>
      </div>
      <div class="form-group">
        <label for="phoneNo">Phone No:</label>
        <input type="text" id="phoneNo" name="phoneNo" required>
      </div>
      <div class="form-group">
        <label for="patientDiagnosis">Patient Diagnosis:</label>
        <input type="text" id="patientDiagnosis" name="patientDiagnosis" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </div>
  </form>
  </div>

</body>