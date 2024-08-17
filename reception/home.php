<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<style>
  body {
    background-color: lightblue;
    font-family: Arial, sans-serif;
    margin: auto;
    min-width: 700px;
    max-width: fit-content;
  }

  .header {
    display: flex;
    padding: 10px;
    justify-content: space-around;
    background: cadetblue;
    margin-bottom: 10px;
  }

  .outside {
    display: flex;
    flex-direction: row;
    text-align: center;
    justify-content: space-between;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .container {
    text-align: center;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    min-width: 700px;
    max-width: max-content;
  }

  .container h1 {
    text-align: center;
    text-transform: uppercase;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  .form-group input {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
  }

  .form-group input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
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
    color: white;
  }
</style>


<body>
  <div class="header">
    <a href="/reception/home.php">Home</a>
    <a href="/reception/new.php">New Patient</a>
    <a href="/reception/records.php">Records</a>
  </div>

  <div class="container">
    <h2>Saint James Park Hospital</h2>
    <img src="/res/logo.png" alt="" height="100px" width="100px">
    <p>Search the records</p>
    <form action="" method="post">
      <label>Patient name</label>
      <input type="text" name="pname" placeholder="Search by name or id" required>
      <button>Search</button>
    </form>
    <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];

    $connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
    if (mysqli_connect_errno()) {
      echo 'Could not connect ', mysqli_connect_error();
    }

    $query = mysqli_query($connection, "SELECT * FROM receptionist WHERE name LIKE '%$pname%' OR id LIKE '%$pname%'");
    $numRows  = mysqli_fetch_array($query);
    if ($numRows > 0) {
  ?>
  </div>
      <div class="container">
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
          <!-- <td><a href="rbill.php?id=<?php echo $id; ?>">Bill</a></td> -->
          <th>Patient class</th>
          <th>Ward Number</th>
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
            <!-- <td><?php echo $row['hospbill'] ?></td> -->
            <td><?php echo $row['doctor'] ?></td>
            <td><?php echo $row['ward'] ?></td>
          </tr>
          <?php
        }
        ?>
          </tbody>
        </table>
        <?php
    }
        else{
          if ($numRows == 0){
          echo '<script>  alert("No matching records"); </script>';
          }
        }
      }
        ?>
      </div>
</body>
</html>