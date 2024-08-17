<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<style>
  body {
    background-color: #f2a1e4;
    font-family: Arial, sans-serif;
    margin: auto;
    width: 700px;
  }

  .header {
    display: flex;
    padding: 10px;
    justify-content: space-around;
    background: #e97dc8;
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
    background-color: #f6e8e7;
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
    background-color: #f6e8e7;
    color: white;
  }
</style>


<body>
  <div class="header">
    <a href="nhome.php">Home</a>
    <a href="nnew.php">New Info</a>
    <a href="nrecord.php">Records</a>
  </div>

  <div class="container">
    <h2>Saint James Park Hospital</h2>
    <img src="/logo.png" alt="" height="100px" width="100px">
    <p>Search the records</p>
    <form action="" method="post">
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

    $query = mysqli_query($connection, "SELECT *
    FROM nurse, receptionist
    WHERE nurse.id = receptionist.id AND (nurse.id LIKE '%$pname%' OR receptionist.name LIKE '%$pname%')
    ");
    $numRows = mysqli_num_rows($query);
    if ($numRows > 0) {
  ?>
  </div>
      <div class="container">
        <table>
          <thead>
            <td>ID</td>
            <td>name</td>
            <td>Age</td>
            <td>Blood Presssure</td>
            <td>Observations</td>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['bloodpressure']; ?></td>
                <td><?php echo $row['observations']; ?></td>
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