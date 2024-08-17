<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
if (mysqli_connect_errno()) {
  echo 'Could not connect ', mysqli_connect_error();
}

// $query=mysqli_query($connection, "SELECT * FROM receptionist");
$nquery  = mysqli_query($connection, "SELECT * FROM nurse,receptionist WHERE nurse.id = receptionist.id");
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
  .vital-signs{
    display: none;
  }
  .vital-signs td {
    border: 1px solid black;
    text-align: center;
}

</style>

<body>
  <div class="header">
    <a href="/nurse/home.php">Home</a>
    <a href="/nurse/new.php">New Info</a>
    <a href="/nurse/records.php">Records</a>
  </div>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($nquery as $row) : ?>
          <tr class="expandable-row">
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['phone'] ?></td>
          </tr>
          <tr class="vital-signs">
            <td colspan="5">
              <table>
                <thead>
                  <tr>
                    <td>Blood pressure</td>
                    <td>Body Temperature</td>
                    <td>Height</td>
                    <td>Weight</td>
                    <td>Allergies</td>
                    <td>Observations</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $row['bloodpressure'] ?></td>
                    <td><?php echo $row['temperature'] ?></td>
                    <td><?php echo $row['height'] ?></td>
                    <td><?php echo $row['weight'] ?></td>
                    <td><?php echo $row['allergies'] ?></td>
                    <td><?php echo $row['observations'] ?></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

</body>
<script>
  const expandableRows = document.querySelectorAll('.expandable-row');
  expandableRows.forEach(row => {
    row.addEventListener('click', () => {
      const formRow = row.nextElementSibling;
      formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
    });
  });
</script>