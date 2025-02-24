<?php include './components/header.php' ?>

<?php
$name = $body = $email = '';
$nameErr = $bodyErr = $emailErr = '';

// form submit
if (isset($_POST['submit']))

  // validate name
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

// validate email
if (empty($_POST['email'])) {
  $emailErr = 'email is required';
} else {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// validate body
if (empty($_POST['body'])) {
  $bodyErr = 'grievance is required';
} else {
  $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}


if (empty($nameErr) && empty($bodyErr) && empty($emailErr)) {
  // add to database
  $sql = " INSERT INTO feedback(name, email, body) VALUES ('$name', '$email', '$body') ";

  if (mysqli_query($conn, $sql)) {
    //sucess
    header('Location:feedback.php');
  } else {
    echo 'ERROR';
  }
}



?>


<img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="">
<h2 class="text-primary t-shadow">Grievance</h2>
<p class="lead text-center">Leave Grievance for us.</p>
<form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>  " method="post" class="mt-4 w-75">
  <div class="mb-3">
    <label for="name" class="form-label text-primary fw-bold">Name</label>
    <input type="text" class="form-control  b-shadow <?php echo $nameErr ? 'is-invalid' : 'border-primary' ?> " id="name" name="name" placeholder="Enter your name">
    <div class="invalid-feedback">
      <?php echo $nameErr; ?>
    </div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label text-primary fw-bold">Email</label>
    <input type="email" class="form-control b-shadow <?php echo $emailErr ? 'is-invalid' : 'border-primary' ?>" id="email" name="email" placeholder="Enter your email">
    <div class="invalid-feedback">
      <?php echo $emailErr; ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label text-primary fw-bold">Grievance</label>
    <textarea class="form-control b-shadow <?php echo $bodyErr ? 'is-invalid' : 'border-primary' ?>" id="body" name="body" placeholder="Enter your Grievance">
    </textarea>
    <div class="invalid-feedback">
      <?php echo $bodyErr; ?>
    </div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-primary w-100 fw-bold b-shadow mt-4 <?php echo $nameErr || $bodyErr || $emailErr ? 'btn-warning' : 'btn-primary' ?>">
  </div>
</form>


<?php require './components/footer.php'
?>