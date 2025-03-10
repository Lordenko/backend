<hr>
<div>
    <?php
        $file = fopen("comments.txt", "r");
        $comments = fread($file, filesize("comments.txt"));
        $comments_split = array_slice(explode("\n", $comments), 0, -1);
        fclose($file);
    ?>

    <table>
        <?php
        foreach ($comments_split as $comment):
            $comment_split = explode("::", $comment);
            $name = $comment_split[0];
            $comment = $comment_split[1];
        ?>

        <tr>
            <td><?php echo $name ?></td>
            <td><?php echo $comment ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
</div>