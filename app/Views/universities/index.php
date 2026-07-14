<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities</title>
</head>
<body>
    <h1>Universities</h1>

    <table border="1" cellapadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Short Name</th>
            <th>Email</th>
            <th>City</th>


        </tr>

        <?php foreach($universities as $university): ?>
            <tr>
                <td><?= $university['id']; ?></td>
                <td><?= $university['name']; ?></td>
                <td><?= $university['short_name']; ?></td>
                <td><?= $university['email']; ?></td>
                <td><?= $university['city']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>