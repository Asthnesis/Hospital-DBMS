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
    background-size: 100% 100%;
    background-color: lightblue;
    font-family: Arial, sans-serif;
    margin: auto;
    width: max-content;
  }
.header{
  display: flex;
  padding: 10px;
  justify-content: space-around;
  background:cadetblue ;
  margin-bottom: 10px;
}
  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    border: 2px solid cadetblue;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: cadetblue;
    color: white;
  }
</style>

<body>
<div class="header">
    <a href="receptionHome.php">Home</a>
    <a href="rnew.php">New Patient</a>
    <a href="rretrieve.php">Records</a>
  </div>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Patient ID</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Next of kin</th>
          <th>Next of kin Phone</th>
          <th>hospital bill</th>
          <th>Attending Doctor</th>
          <th>Ward Number</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($query as $row) {
          ?>
          <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['nok'] ?></td>
            <td><?php echo $row['nok_phone'] ?></td>
            <td><?php echo $row['hospbill'] ?></td>
            <td><?php echo $row['doctor'] ?></td>
            <td><?php echo $row['ward'] ?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
