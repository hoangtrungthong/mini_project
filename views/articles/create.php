<?php
parse_str($_COOKIE['auth'], $get_user);
if (!isset($_SESSION['username']) && (!isset($_COOKIE['auth']) || !isset($get_user['user']) || !isset($get_user['pw']) || $get_user['user'] !== $user['username'] || $get_user['pw'] !== $user['password'])) {
    header("location: index.php?page=home");
}
?>

<div class="articles">
    <form action="" method="post">
        <h1>Create articles</h1>
        <div>
            <label for="title">Title:</label>
            <input id="title" type="text" name="title" value="<?php echo $_POST['title'] ?>">
        </div>
        <p class="highlight"><?php echo $articles['title'] ?></p>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" cols="30" rows="10"><?php echo $_POST['content'] ?></textarea>
        </div>
        <p class="highlight"><?php echo $articles['content'] ?></p>
        <a class="btn" href="index.php?page=articles">Back to list</a>
        <button class="btn" type="submit" name="create">Create</button>
    </form>
</div>