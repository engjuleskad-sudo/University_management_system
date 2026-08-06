<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>👨 Student Details </h1>

<div class="cards-details">

<div class="text-align:center; margin-bottom:20px;">

<?php
   $photo=!empty($student['photo'])
?"assets/uploads/students/" . htmlspecialchars($student['photo'])
:"assets/images/default_user.png";

?>
    <img src="<?= $photo; ?>"
  width="150"
  height="150"
  style="border-radius:50%; objet-fit:cover; border:3px solid #ddd;">
    </div>
  <table class="details-table">
    <tr>
        <th>Registration Number</th>
        <td><?= htmlspecialchars($student['registration_number']); ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($student['first_name']); ?></td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($student['last_name']); ?></td>
    </tr>
    <tr>
        <th>University</th>
        <td><?= htmlspecialchars($student['university_name']); ?></td>
    </tr>
    <tr>
        <th>Gender</th>
        <td><?= htmlspecialchars($student['gender']); ?></td>
    </tr>
    <tr>
        <th>Date Of Birth</th>
        <td><?= htmlspecialchars($student['date_of_birth']); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($student['email']); ?></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><?= htmlspecialchars($student['phone']); ?></td>

    </tr>
    <tr>
        <th>Country</th>
        <td><?= htmlspecialchars($student['country']); ?></td>
    </tr>
    <tr>
        <th>Province</th>
        <td><?= htmlspecialchars($student['province']); ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?= htmlspecialchars($student['city']); ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?= htmlspecialchars($student['address']); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if($student['status']=="Active"): ?>
            <span class="badge bg-success">Active</span>
            <?php else: ?>
            <span class="badge bg-danger">Inactive</span>
            <?php endif; ?>
        </td>
    </tr>

  </table>
  <br>
  <a href="?page=students" class="btn btn-secondary">
    ⬅ Back
  </a>
  <a href="?page=edit-student&id=<?= $student['id']; ?>" class="btn btn-success">
    ✏ Edit
  </a>


</div>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>