<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>👩‍🏫 Lecturers</h1>

<p>
    <a href="?page=add-lecturer" class="btn btn-primary">
        ➕ Add New Lecturer 
    </a>

    <table cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Staff Number</th>
            <th>Name</th>
            <th>University</th>
            <th>Department</th>
            <th>Qualification</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php if(count($lecturers) >0): ?>
        <?php foreach($lecturers as $lecturer): ?>
            <tr>
                <td>
                    <?= $lecturer['id']; ?>
                </td>
                <td>
                    <?php if(!empty($lecturer['photo'])): ?>
                        <img 
                        src="assets/uploads/lecturers/<?= htmlspecialchars($lecturer['photo']); ?>"
                         alt="Lecturer Photo"
                         width="50"
                         height="50"
                         style="object-fit: cover; border-radius: 50%;">
                         <?php else: ?>
                            <span>No Photo</span>
                        <?php endif; ?>
                </td>
                <td>
                    <?= htmlspecialchars($lecturer['staff_number']); ?>
                </td>
                <td>
                    <?= htmlspecialchars(
                        $lecturer['first_name']  . '' . $lecturer['last_name']); ?>
                   
                </td>
                
                <td>
                    <?= htmlspecialchars($lecturer['university_name']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($lecturer['department'] ?? ''); ?>
                </td>
                <td>
                    <?= htmlspecialchars($lecturer['qualification'] ?? ''); ?>
                </td>
                <td>
                    <?php if($lecturer['status']=== 'Active'): ?>
                        <span class="badge bg-success">
                            Active
                        </span>
                        <?php else: ?>
                            <span class="badge bg-danger">
                                Inactive

                            </span>
                        <?php endif; ?>

                </td>
                <td>
                    <a href="?page=view-lecturer&id=<?= $lecturer['id']; ?>"
                    class="btn btn-info">
                         👁  View 
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center;">
                        No lecturer found.

                    </td>
                </tr>
            <?php endif; ?>
        

    </table>
</p>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
