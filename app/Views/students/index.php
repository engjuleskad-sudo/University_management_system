<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>👨 Student</h1>

<p>
    <a href="?page=add-student" class="btn btn-primary">
        ➕ Add New Student
    </a>
</p>
<table cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Registration No</th>
        <th>Name</th>
        <th>University</th>
        <th>Gender</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php if(count($students)>0): ?>

        <?php foreach($students as $student): ?>

            <tr>
                 <td><?= $student['id']; ?></td>
                <td>
                    <?php 
                    $photo=!empty($student['photo'])
                    ?"assets/uploads/students/". htmlspecialchars($student['photo'])
                    :"assets/images/default.png";
                     ?>
                     
                          <img src="<?= $photo; ?>"
                        width="60"
                        height="60"
                        style="border-radius:50%; object-fit:cover;">
                </td>
                <td> <?= htmlspecialchars($student['registration_number']); ?></td>
                <td>
                    <?= htmlspecialchars($student['first_name']); ?>
                    <?= htmlspecialchars($student['last_name']); ?>

                </td>
                <td><?= htmlspecialchars($student['university_name']); ?></td>
                <td><?= htmlspecialchars($student['gender']); ?></td>
                

                <td>
                    <?php if($student['status']=="Active"): ?>
                        <span class="badge bg-success">Active</span>
                        <?php else: ?>
                        <span class="badge bg-danger">Inactive</span>
                        <?php endif; ?>   
                </td>
                <td>
                    <a href="?page=show-student&id=<?=$student['id']; ?>" class="btn btn-info">
                        👁 View</a>
                    <a href="#" class="btn btn-success">✏ Edit</a>
                </td>
            </tr>
            
                <?php endforeach; ?>

                <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align:center;">
                        Not Found.

                    </td>

                </tr>

                <?php endif; ?>

</table>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>