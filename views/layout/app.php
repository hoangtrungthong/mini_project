<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <ul>
      <?php
      parse_str($_COOKIE['auth'], $get_user);
      if (isset($_SESSION['username'])) {
      ?>
        <div>
          <li>Hello, <?php echo $_SESSION['username']; ?></li>
          <li>
            <a href="index.php?page=home">Home</a>
          </li>
          <li>
            <a href="index.php?page=articles">Your Articles</a>
          </li>
        </div>
        <li>
          <a href="index.php?page=users&action=logout">Logout</a>
        </li>
      <?php
      } else if (isset($get_user['user']) && isset($get_user['pw']) && $get_user['user'] === $user['username'] && $get_user['pw'] === $user['password']) {
      ?>
        <div>
          <li>Hello, <?php echo $get_user['user']; ?></li>
          <li>
            <a href="index.php?page=home">Home</a>
          </li>
          <li>
            <a href="index.php?page=articles">Your Articles</a>
          </li>
        </div>
        <li>
          <a href="index.php?page=users&action=logout">Logout</a>
        </li>
      <?php
      } else {
      ?>
        <div>
          <li>
            <a href="index.php?page=users&action=register">Register</a>
          </li>
          <li>
            <a href="index.php?page=users&action=login">Login</a>
          </li>
        </div>
      <?php } ?>
    </ul>
  </header>

  <?php echo $content ?>
</body>
<script src="assets/js/script.js"></script>

</html>
