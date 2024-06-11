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
    
    $sql = "INSERT INTO customer_ariani (email, pic_name, company_name, phone_num) 
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

    header("location: /customerdatacollectionariani/index.php");
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="/customerdatacollectionariani/index.php">
      <img src="ariani.png" alt="Avatar Logo" style="width:150px;" class="rounded-pill"> 
    </a>
    <h2>Add New Customer Data</h2>
</nav>
<div class="container my-5">
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
    <label for="pic_name" class="form-label"><strong><h4>Name of Person In Charge</h4></strong></label>
    <input type="text" class="form-control form-control-lg" name="pic_name" placeholder = "Name of Person In Charge" aria-label="Name of Person In Charge" value="<?php echo $pic_name; ?>">
  </div>
  <div class="col">
    <label for="company_name" class="form-label"><strong><h4>Company Name</h4></strong></label>
    <input type="text" class="form-control form-control-lg" name="company_name" placeholder = "Company Name" aria-label="Company Name" value="<?php echo $company_name; ?>">
  </div>
</div>
<br><br>
<div class="row">
  <div class="col">
    <label for="email" class="form-label"><strong><h4>Email Address</h4></strong></label>
    <input type="email" class="form-control form-control-lg" name="email" placeholder = "Email Address" aria-label="Email Address" value="<?php echo $email; ?>">
  </div>
  <div class="col">
    <label for="phone_num" class="form-label"><strong><h4>Phone Number</h4></strong></label>
    <input type="text" class="form-control form-control-lg" name="phone_num" placeholder = "Phone Number" aria-label="Phone Number" value="<?php echo $phone_num; ?>">
  </div>
</div>
<br><br>
<button type="submit" class="btn btn-success btn-lg"> <strong>Submit</strong></button>
</form>
</div>
</body>
</html>