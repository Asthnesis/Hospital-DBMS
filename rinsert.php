<a href="rnew.php"> < Back</a>
<h2>Saint James Park Hospital</h2>
    <img src="/logo.png" alt="" height="100px" width="100px">
  <div class="container">
<?php
  $name = $_POST['patientName'];
  $age = $_POST['patientAge'];
  $gender = $_POST['gender'];
  $phone = $_POST['phoneNo'];
  $address = $_POST['address'];
  $nok = $_POST['nok'];
  $nok_phone = $_POST['nok_phone'];
  $doctor = $_POST['doctor'];
  $ward = $_POST['ward'];

$connection = mysqli_connect('127.0.0.1','root','','hospital');
if(mysqli_connect_errno()){
  echo 'Could not connect ',mysqli_connect_error();
}

$query = "INSERT INTO receptionist(name,age,gender,phone,address,nok,nok_phone,doctor, ward) VALUES('$name','$age','$gender','$phone','$address','$nok','$nok_phone','$doctor','$ward')";

$result = mysqli_query($connection, $query);
echo "Details added successfully";
echo  "'$name','$age','$gender','$phone','$address','$nok','$nok_phone','$doctor','$ward'";

$id = mysqli_insert_id($connection);
$nquery = mysqli_query($connection, "INSERT INTO nurse(id) VALUES($id)");
mysqli_close($connection);
?>