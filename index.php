<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>JTSB Customer Data Listings</title>
</head>

<body>

<nav class="navbar" style="background-color: #f69322">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/customerdatacollection/index.php">Home</a>
        </li>
    </div>
  </div>
</nav>
    <div class="container my-5">
        <h2>JTSB Customer Data Listings</h2>
        <br>
        <a type="button" class="btn btn-primary" href="/customerdatacollection/create.php">Add New Customer Data</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name of Company's PIC</th>
                    <th>Company Name</th>
                    <th>Company Email Address</th>
                    <th>Phone Number</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "connection.php";
                $sql="select * from customer_info";
                $result = $connection->query($sql);
                if(!$result){
                    die("Incalid query!");
                }
                while($row=$result->fetch_assoc()){
                    echo"
                    <tr>
                    <td>$row[pic_name]</td>
                    <td>$row[company_name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone_num]</td>
                    <td><a class='btn btn-danger' href='delete.php?id=$row[id]'> Delete </a></td>
                </tr>";
                }                
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>