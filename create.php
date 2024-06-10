<?php 
include "connection.php";

$pic_name = "";
$company_name = "";
$email = "";
$phone_num = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pic_name = $_POST["pic_name"];
    $company_name = $_POST["company_name"];
    $email = $_POST["email"];
    $phone_num = $_POST["phone_num"];

    do{
        if(empty($pic_name) || empty($company_name) || empty($email) || empty($phone_num)){
            $errorMessage .= 'All the fields a equired';
            break;
    }

    //add new client to database
    
    $sql = "INSERT INTO customer_info (email, pic_name, company_name, phone_num) 
    VALUES ('$email', '$pic_name', '$company_name', '$phone_num')";
    $result = $connection->query($sql);

    if(!$result){
    $errorMessage = "Invalid query:" . $connection->error;
    break;
    }
    $pic_name = "";
    $company_name = "";
    $email = "";
    $phone_num = "";

    $successMessage = "Customer added correctly";

    header("location: /customerdatacollection/index.php");
    exit;
    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>JTSB Customer Data Listings</title>
</head>

<body>
<div class="container my-5">
<h2>Add New Customer Data</h2>
<br>

<?php
if( !empty($errorMessage)){
    echo "
    <div class='alert alert-warning' role='alert'>
        <strong>$errorMessage</strong>
    </div>
    ";
}
?>
<form method="post">

<div class="row">
  <div class="col">
    <label for="pic_name" class="form-label">Name of Person In Charge</label>
    <input type="text" class="form-control" name="pic_name" aria-label="Name of Person In Charge" value="<?php echo $pic_name; ?>">
  </div>
  <div class="col">
    <label for="company_name" class="form-label">Company Name</label>
    <input type="text" class="form-control" name="company_name" aria-label="Company Name" value="<?php echo $company_name; ?>">
  </div>
</div>
<br><br>
<div class="row">
  <div class="col">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" name="email" aria-label="Email Address" value="<?php echo $email; ?>">
  </div>
  <div class="col">
    <label for="phone_num" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="phone_num" aria-label="Phone Number" value="<?php echo $phone_num; ?>">
  </div>
</div>
<br><br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>