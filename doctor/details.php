<style>
  body {
    background-color: #3d6db9;
    font-family: Arial, sans-serif;
    margin: auto;
    width: auto;
    max-width: 800px;
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
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pname = $_GET['id'];
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'hospital');
    if (mysqli_connect_errno()) {
      echo 'Could not connect ', mysqli_connect_error();
    }
    $query = mysqli_query($connection, "SELECT * FROM doctor,nurse,receptionist WHERE doctor.id = receptionist.id AND doctor.id = nurse.id AND doctor.id LIKE '%$pname%'");
        $rows = mysqli_num_rows($query);
        if ($rows > 0) { 
  ?>
<body>
    <div class="header">
        <a href="/doctor/home.php"> < Back</a>
    </div>
    <div class="container">
        <table>
            <thead>
                <h1>Basic Information</h1>
                <td>Name</td>
                <td>ID</td>
                <td>Gender</td>
                <td>Age</td>
                <td>Ward Number</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Next of Kin</td>
                <td>Next of Kin Contact</td>
                </thead>
                <tbody>
                <?php
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                    <th><?php echo $row['name'] ?></th>
                    <th><?php echo $row['id'] ?></th>
                    <th><?php echo $row['gender'] ?></th>
                    <th><?php echo $row['age'] ?></th>
                    <th><?php echo $row['ward'] ?></th>
                    <th><?php echo $row['phone'] ?></th>
                    <th><?php echo $row['address'] ?></th>
                    <th><?php echo $row['nok'] ?></th>
                    <th><?php echo $row['nok_phone'] ?></th>
                </tbody>
                </table>
                <table>
                <h1>Medical Data</h1>
                <th>Allergies</th>
                <th>Blood pressure</th>
                <th>Temperature</th>
                <th>height</th>
                <th>Weight</th>
                <th>Nurse Notes</th>
                <tbody>
                    <td><?php echo $row['allergies'] ?></td>
                    <td><?php echo $row['bloodpressure'] ?></td>
                    <td><?php echo $row['temperature'] ?></td>
                    <td><?php echo $row['height'] ?></td>
                    <td><?php echo $row['weight'] ?></td>
                    <td><?php echo $row['observations'] ?></td>
                </tbody>
            </table>
            <table>
                <h1>Diagnostics</h1>
                <th>Doctor In-charge</th>
                <th>Doctor Notes</th>
                <th>Temperature</th>
                <th>height</th>
                <th>Weight</th>
                <th>Nurse Notes</th>
                <tbody>
                    <td><?php echo $row['doctor'] ?></td>
                    <td><?php echo $row['progress'] ?></td>
                    <td><?php echo $row['temperature'] ?></td>
                    <td><?php echo $row['height'] ?></td>
                    <td><?php echo $row['weight'] ?></td>
                    <td><?php echo $row['observations'] ?></td>
                </tbody> 
            </table>
    </div>


<?php }}} ?>
</body>