<?php include 'includes/header.php'; ?>


<?php 
  $name = $email = $body = '';
  $nameError = $emailError = $bodyError = '';

  // form submission
  if(isset($_POST['submit'])) 
  {
    // validate name
    if(empty($_POST['name']))
    {
      $nameError = 'Name is necessary';
    }
    else
    {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // validate email
    if(empty($_POST['email']))
    {
      $emailError = 'email is necessary';
    }
    else
    {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    // validate body
    if(empty($_POST['body']))
    {
      $bodyError = 'Feedback is necessary';
    }
    else
    {
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($nameError) && empty($emailError) && empty($bodyError) && empty($emailError))
    {
      // inserting into database
      $sql = "INSERT INTO feeds (name, email, body) VALUES ('$name', '$email', '$body')";

      if(mysqli_query($conn, $sql))
      {
        // success
        header('Location: feedback.php');
      }
      else
      {
        // error
        echo 'Error' . mysqli_error($conn);
      }
    }
  }

?>
<p class="lead text-center">Got a feeback for us?</p>
<form action="" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST" class="mt-4 w-75">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control <?php echo empty($nameError) ?: 'is-invalid' ?>" id="name" name="name" placeholder="Enter your name" />
    <div class="invalid-feedback"><?php echo $nameError ?></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control <?php echo !$emailError ?: 'is-invalid' ?>" id="email" name="email" placeholder="Enter your email" />
    <div class="invalid-feedback"><?php echo $emailError ?></div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control <?php echo !$bodyError ?: 'is-invalid' ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
    <div class="invalid-feedback"><?php echo $bodyError ?></div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100" />
  </div>
</form>
<?php include 'includes/footer.php'; ?>