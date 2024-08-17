<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
if (mysqli_connect_errno()) {
  echo 'Could not connect ', mysqli_connect_error();
}

$query = mysqli_query($connection, "SELECT * FROM receptionist");
?>

<style>
  body {
    background-image: url('/logo.png');
    background-size: 100%;
    background-color: #3d6db9;
    font-family: Arial, sans-serif;
    margin: auto;
    width: max-content;
  }

  .header {
    display: flex;
    padding: 10px;
    justify-content: space-around;
    background: #43d9e7;
    margin-bottom: 10px;
  }

  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 5px;
    padding: 2px;
    background-color: #f6e8e7;
    border-radius: 2px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .container {
    border-collapse: collapse;
    width: 600px;
    background-color: #f6e8e7;
    color: black;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    border: 2px solid cadetblue;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: cadetblue;
    color: black;
  }

  form {
    display: flex;
    flex-direction: column;
    font-weight: bold;
  }
</style>

<body>
  <div class="header">
    <a href="dhome.php">Home</a>
    <a href="dnew.php">New patient</a>
  </div>
  <i>Click on a patient to add or update their information</i>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Patient ID</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($query as $row) : ?>
          <tr class="expandable-row">
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['phone'] ?></td>
          </tr>
          <tr class="form-row" style="display: none;">
            <td colspan="5">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <label>Date</label>
                <input type="date" name="date" required>
                <label>Medicine name</label>
                <input type="text" name="medicinename" placeholder="medicine A">
                <label>Dosage</label>
                <input type="text" name="dosage" placeholder="1 tablet" required>
                <label>Duration</label>
                <input type="text" name="duration" placeholder="1 day" required>
                <label>Frequency</label>
                <input type="text" name="frequency" placeholder="Twice daily" required>
                <label>Referral</label>
                <input type="text" name="referral" required>
                <label>Notes</label>
                <textarea name="notes" cols="30" rows="10" required></textarea>
                <button>Submit</button>

              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

</body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $medicinename = $_POST['medicinename'];
  $dosage = $_POST['dosage'];
  $duration = $_POST['duration'];
  $frequency = $_POST['frequency'];
  $referral = $_POST['referral'];
  $notes = $_POST['notes'];
  $connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
  if (mysqli_connect_errno()) {
    echo 'Could not connect ', mysqli_connect_error();
  }
  $query = mysqli_query(
    $connection,
    "UPDATE doctor
SET id = '$id',
medicinename = '$medicinename',
    dosage = '$dosage',
    duration = '$duration',
    frequency = '$frequency',
    referral = '$referral',
    notes = '$notes'
WHERE id = '$id';
"
  );
  echo '<script>alert("Success")</script>';
}
?>
<script>
  const expandableRows = document.querySelectorAll('.expandable-row');
  expandableRows.forEach(row => {
    row.addEventListener('click', () => {
      const formRow = row.nextElementSibling;
      formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
    });
  });
</script>