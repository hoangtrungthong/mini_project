<div>
    <form action="" method="post">
        <h1>Login Account</h1>
        <div>
            <img src="assets/images/email.png">
            <input type="email" name="email" placeholder="Email Address" value="<?php echo $_POST['email'] ?>" >
            <p class="highlight"><?php echo $users['email'] ?></p>
        </div>
        <div>
            <img src="assets/images/unauthorized-person.png">
            <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password'] ?>" >
            <p class="highlight"><?php echo $users['password'] ?></p>
        </div>
        <div id="keep">
            <input type="checkbox" name="remember" id="remember" value="<?php echo $_POST['password'] ?>">
            <label for="remember">Remember Me</label>
        </div>
        <p class="highlight"><?php echo $users['error'] ?></p>
        <button class="btn" type="submit" name="login">Login</button>
        <p>Don't have a account? <a href="index.php?page=users&action=register">Register &raquo;</a></p>
    </form>
</div>
