<?php
include "config/db.php";
include "config/config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `person` WHERE pid = $id";
$result = mysqli_query($conn, $sql);
$person = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    

    $sql = "UPDATE `person` SET `lastname`='$lastname',`firstname`='$firstname',  `address`='$address'
    WHERE pid =$id";

    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: guestbook-list.php");
        exit;
    } else {
        echo "Failed: Error" . mysqli_error($conn);
    }
}
include('inc/header.php');
?>


<div class="container">

<br/>
  <h2>Registration</h2>
  
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="was-validated">
    <div class="form-group">
      <label for="uname">Last name:</label>
      <input type="text" class="form-control" id="lastname" 
        value="<?php echo $person['lastname'] ?>" name="lastname" required>
        
    </div>
    <div class="form-group">
      <label for="uname">First name:</label>
      <input type="text" class="form-control" id="firstname" 
        value="<?php echo $person['firstname'] ?>" name="firstname" required name="firstname" required>
      
    </div>
    <div class="form-group">
      <label for="uname">Address:</label>
      <input type="text" class="form-control" id="address" 
      value="<?php echo $person['address'] ?>" name="address" required name="address" required>
      
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php include('inc/footer.php'); ?>

