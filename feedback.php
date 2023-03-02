<?php include 'includes/header.php'; ?>

<?php
// $feedback = [
//   [
//     'id' => '1',
//     'name' => 'Ed',
//     'email' => 'ed@yahoo.com',
//     'body' => 'Watch out for the reef!'
//   ],
//   [
//     'id' => '2',
//     'name' => 'Ra',
//     'email' => 'ra@gmail.com',
//     'body' => 'Watch this space'
//   ],
//   [
//     'id' => '3',
//     'name' => 'Ja',
//     'email' => 'ja@outlook.com',
//     'body' => 'YeAhhhh'
//   ],
//   ];

// fetch data from database
$sql = 'SELECT * FROM feeds';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Feedback</h2>

<?php if(empty($feedback)): ?>
  <p class="lead mt3">There is no feedback</p>
  <?php endif; ?>

<?php foreach($feedback as $item): ?>
<div class="card my-3 w-75">
  <div class="card-body text-center">
  <?php echo $item['body']; ?>
  <div class="text-secondary mt-2">
    By: <?php echo $item['name']; ?>
  </div>
</div>
</div>
  <?php endforeach; ?>

<?php include 'includes/footer.php'; ?>