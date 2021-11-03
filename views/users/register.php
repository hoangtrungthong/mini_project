 <div>
 <form action="" method="post">
     <h1>Register Account</h1>
     <div>
         <img src="assets/images/man.png">
         <input type="text" name="username" placeholder="Username" value="<?php echo $_POST['username'] ?>" >
         <p class="highlight"><?php echo $users['name'] ?></p>
     </div>
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
     <div>
         <img src="assets/images/unauthorized-person.png">
         <input type="password" name="Re_password" placeholder="Confirm password" value="<?php echo $_POST['Re_password'] ?>" >
         <p class="highlight"><?php echo $users['rePassword'] ?></p>
     </div>
     <p class="highlight"><?php echo $users['used'] ?></p>
     <p class="highlight"><?php echo $users['fail'] ?></p>
     <button class="btn" type="submit" name="register">Register</button>
     <p>Have a account? <a href="index.php?page=users&action=login">Login &raquo;</a></p>
 </form>
</div>
