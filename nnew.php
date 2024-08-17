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
    background-color: #f2a1e4;
    font-family: Arial, sans-serif;
    margin: auto;
    width: max-content;
  }

  .header {
    display: flex;
    padding: 10px;
    justify-content: space-around;
    background: #e97dc8;
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
    color: white;
  }

  th {
    border: 2px solid white;
    padding: 8px;
  }

  thead {
    background-color: #e97dc8;
    color: white;
  }

  tbody {
    background-color: #e97dc8;
  }

  form {
    display: flex;
    flex-direction: column;
    color: #fff;
    font-weight: bold;
  }
</style>

<body>
  <div class="header">
    <a href="nhome.php">Home</a>
    <a href="nnew.php">New Info</a>
    <a href="nrecord.php">Records</a>
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
                <label>Allergies</label>
                <input type="text" name="allergies" required>
                <label>Blood pressure</label>
                <input type="text" name="bloodpressure" required>
                <label>Temperature</label>
                <input type="text" name="temperature" required>
                <label>Height</label>
                <input type="text" name="height" required>
                <label>Weight</label>
                <input type="text" name="weight" required>
                <label>Notes</label>
                <textarea name="observations" cols="30" rows="10" required></textarea>
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
  $allergies = $_POST['allergies'];
  $bloodpressure = $_POST['bloodpressure'];
  $temperature = $_POST['temperature'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $observations = $_POST['observations'];
  $connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
  if (mysqli_connect_errno()) {
    echo 'Could not connect ', mysqli_connect_error();
  }
  $query = mysqli_query(
    $connection,
    "UPDATE nurse
SET allergies = '$allergies',
    bloodpressure = '$bloodpressure',
    temperature = '$temperature',
    height = '$height',
    weight = '$weight',
    observations = '$observations'
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