<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>👨 Student</h1>

<p>
    <a href="?page=add-student" class="btn btn-primary">
        ➕ Add New Student
    </a>
</p>
<form method="GET" action="">
    <input type="hidden" name="page" value="students">

    <label >Search Student</label>
    <input 
    type="text"
    name="search"
    placeholder="Registration number, name or email"
    value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>">

    <label for="">University</label>
    <select name="university_id">
        <option 
        value="">---All Universities---</option>
        <?php foreach($universities as $university): ?>
            <option 
            value="<?= $university['id']; ?>"
            <?=($_GET['university_id'] ?? '')==$university['id'] ? 'selected' : 'id'; ?>>
        <?= htmlspecialchars($university['name']); ?>
        </option>
        <?php endforeach; ?>

    </select>
    <label>Status</label>
    <select name="status">
        <option value="">---All Status---</option>
        <option value="Active"
        <?= ($_GET['status'] ?? '')== 'Active' ? 'selected' : ''; ?>>
        Active    
        </option>
        <option value="Inactive"
        <?= ($_GET['status'] ?? '')== 'Inactive' ? 'selected' : ''; ?>>
    Inactive</option>
    </select>
    <button type="submit" class="btn btn-primary">
        🔍 Search
    </button>
    <a href="?page=students" class="btn btn-secondary">
        🔄 Reset
    </a>
</form>
<br>
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
                    <a href="?page=show-student&id=<?=$student['id']; ?>"
                     class="btn btn-info">
                        👁 View</a>
                    <a href="?page=edit-student&id=<?= $student['id']; ?>" 
                    class="btn btn-success">✏ Edit</a>
                    <?php if($student['status']=="Active"): ?>
                        <a href="?page=deactivate-student&id=<?= $student['id']; ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Are sure you want to deactivate this student?');">
                        🔴 Deactivate 

                        </a>
                       <?php else: ?>

                     <a href="?page=activate-student&id=<?= $student['id']; ?>"
                      class="btn btn-success"
                           onclick="return confirm('Are you sure you want to activate this student?');">
                       🟢 Activate
                     </a>

                    <?php endif; ?>
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
<?php if($totalPages > 1): ?>
    <div style="margin-top: 20px;">
        <?php if($page > 1): ?>
            <a href="?page=students&page_number=<?= $page -1; ?>&search=<?= urlencode($search); ?>&university_id=<?= urlencode($university_id); ?>$status=<?= urlencode($status); ?>"
            class="btn btn-secondary">
               ⬅ Previous
        </a>
        <?php endif; ?>

        <?php for($i=1; $i<= $totalPages; $i++): ?>
            <a href="?page=students&page_number=<?= $i; ?>&search=<?= urlencode($search); ?>&university_id=<?= urlencode($university_id); ?>&status=<?= urlencode($status); ?>"
            class="btn <?= $i == $page ? 'btn-primary' : 'btn-secondary'; ?>">
        <?= $i; ?>
        </a>
        <?php endfor; ?>
        <?php if($page < $totalPages): ?>
            <a href="?page=students&page_number=<?= $page +1; ?>&search=<?= urlencode($search); ?>&university_id=<?= urlencode($university_id); ?>&status=<?= urlencode($status); ?>"
            class="btn btn-secondary">
           Next ➡
        </a>
        <?php endif; ?>

    </div>
    <?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>