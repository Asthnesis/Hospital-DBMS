<a href="new.php"> < Back</a>
<h2>Saint James Park Hospital</h2>
    <img src="/logo.png" alt="" height="100px" width="100px">
  <div class="container">
<?php
  $name = $_POST['patientName'];
  $adm = $_POST['admissionNo'];
  $age = $_POST['patientAge'];
  $phone = $_POST['phoneNo'];
  $diagnostics = $_POST['patientDiagnosis'];

$connection = mysqli_connect('127.0.0.1','root','','hospital');
if(mysqli_connect_errno()){
  echo 'Could not connect ',mysqli_connect_error();
}

$query = "INSERT INTO patients(name,adm,age,phone,diagnostics) VALUES('$name','$adm','$age','$phone','$diagnostics')";
$result = mysqli_query($connection, $query);
echo "<script>alert('Details added successfully');</script>"
?>