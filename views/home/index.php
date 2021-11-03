<div class="home">
    <h1>List Of Articles</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
        </tr>
        <?php
        foreach ($posts as $post) {
        ?>
            <tr>
                <td><?php echo $post['title'] ?></td>
                <td><?php echo $post['content'] ?></td>
                <td><?php echo $post['username'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
