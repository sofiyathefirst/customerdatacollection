<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>JTSB Customer Data Listings</title>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="/customerdatacollectionariani/index.php">
      <img src="ariani.png" alt="Avatar Logo" style="width:150px;" class="rounded-pill"> 
    </a>
    <h2>Ariani Customer Data Listings</h2>
</nav>
    <div class="container my-5">
        <a type="button" class="btn btn-primary btn-lg" href="/customerdatacollectionariani/create.php"> <strong>Add New Customer Data</strong></a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="h4"><strong>Name of Company's PIC</strong></th>
                    <th class="h4"><strong>Company Name</strong></th>
                    <th class="h4"><strong>Company Email Address</strong></th>
                    <th class="h4"><strong>Phone Number</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "connection.php";
                $sql="select * from customer_ariani";
                $result = $connection->query($sql);
                if(!$result){
                    die("Incalid query!");
                }
                while($row=$result->fetch_assoc()){
                    echo"
                    <tr>
                    <td class='h5'>$row[pic_name]</td>
                    <td class='h5'>$row[company_name]</td>
                    <td class='h5'>$row[email]</td>
                    <td class='h5'>$row[phone_num]</td>
                </tr>";
                }                
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>