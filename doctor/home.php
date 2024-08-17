<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<style>
  body {
    background-color: #3d6db9;
    font-family: Arial, sans-serif;
    margin: auto;
    min-width: 700px;
    max-width: fit-content;

  }

  .header {
    display: flex;
    padding: 10px;
    justify-content: space-around;
    background: #43d9e7;
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
    background-color:  #86a6de;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
    <a href="/doctor/home.php">Home</a>
    <a href="/doctor/new.php">Patients</a>
  </div>

  <div class="container">
    <h2>Saint James Park Hospital</h2>
    <img src="/res/logo.png" alt="" height="100px" width="100px">
    <p>Search the records</p>
    <form action=""  method="post">
      <label>Patient name</label>
      <input type="text" name="pname" required>
      <button>Search</button>
    </form>
    <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
    if (mysqli_connect_errno()) {
      echo 'Could not connect ', mysqli_connect_error();
    }

    $query = mysqli_query($connection,"SELECT * 
FROM doctor 
JOIN receptionist ON doctor.id = receptionist.id 
JOIN nurse ON doctor.id = nurse.id 
WHERE receptionist.name LIKE '%$pname%'; ");
    $numRows = mysqli_num_rows($query);
    if ($numRows > 0) {
  ?>
  </div>
      <div class="container">
        <form action="details.php">
        <table>
          <thead>
            <td>ID</td>
            <td>Name</td>
            <td>Age</td>
            <td>Allergies</td>
            <td>Progress</td>
            <td>Medicine name</td>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['allergies']; ?></td>
                <td><?php echo $row['progress']; ?></td>
                <td><?php echo $row['medicinename']; ?></td>
                <td><a href="details.php?id=<?php echo $row['id']; ?>">See more</a></td>

              </tr>
              
            <?php
            }
            ?>
          </tbody>
          </form>
        </table>
        <?php
    }
      }
     
        ?>
      </div>
</body>
</html>