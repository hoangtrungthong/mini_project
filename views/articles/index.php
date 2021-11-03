<?php
parse_str($_COOKIE['auth'], $get_user);
if (!isset($_SESSION['username']) && (!isset($_COOKIE['auth']) || !isset($get_user['user']) || !isset($get_user['pw']) || $get_user['user'] !== $user['username'] || $get_user['pw'] !== $user['password'])) {
    header("location: index.php?page=home");
}
?>

<a class="create" href="index.php?page=articles&action=create">Create new</a>
<table>
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Activities</th>
    </tr>
    <?php
    if (!empty($articles)) {
        foreach ($articles as $article) {
    ?>
            <tr>
                <td><?php echo $article['title'] ?></td>
                <td><?php echo $article['content'] ?></td>
                <td>
                    <a href="index.php?page=articles&action=edit&items=<?php echo $article['article_id'] ?>">Edit |</a>
                    <a class="remove" href="index.php?page=articles&action=delete&items=<?php echo $article['article_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="3">Chưa có bài viết nào!</td>
        </tr>
    <?php
    }
    ?>

</table>