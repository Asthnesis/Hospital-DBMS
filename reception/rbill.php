<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
if (mysqli_connect_errno()) {
  echo 'Could not connect ', mysqli_connect_error();
}

$query = mysqli_query($connection, "SELECT * FROM receptionist");
?>
<a href="receptionHome.php"> < Back</a>
<form action="">
<input type="hidden" name="id" value="<?php echo $id ?>">
    <label for="service">Service fee <label>
    <input type="text" name="service" id=""><br>
    <label for="appointment">Appointment fee <label>
    <input type="text" name="appointment" id=""><br>
    <label for="consultation">Consultation fee <label>
    <input type="text" name="consultation" id=""><br>
    <label for="laboratory">Laboratory charges <label>
    <input type="text" name="laboratory" id=""><br>
    <label for="room">Room charges <label>
    <input type="text" name="room" id=""><br>
    <button>Submit</button>
</form>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $service = $_POST['service'];
  $appointment = $_POST['appointment'];
  $consultation = $_POST['consultation'];
  $laboratory = $_POST['laboratory'];
  $room = $_POST['room'];
  

$query = mysqli_query($connection,"UPDATE bills(
SET service = '$service',
appointment = '$appointment',
consultation = '$consultation',
laboratory = '$laboratory',
medications = NULL,
room = '$room'
WHERE id = '$id'");
echo "Success";
mysqli_close($connection);
  }
?>