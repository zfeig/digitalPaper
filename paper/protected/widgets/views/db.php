<?php if (!empty($users)): ?>
    <table>
        <tr>
            <th>文章ID</th>
            <th>文章名</th>
        </tr>
        <?php foreach ($users as $k => $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['title']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    没有用户信息
<?php endif; ?>