<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>


<div class="card-details">
<h1>🏫 University Details</h1>
</div>


<div class="card-details">

<div class="logo-section">
    <?php if(!empty($university['logo'])): ?>

        <img src="assets/uploads/logos/<?= htmlspecialchars($university['logo']); ?>" 
        alt="University Logo"
        width="120">
   <?php else: ?>
   <p>No Logo</p>

   <?php endif; ?>
</div>
<table class="details-table">
    <tr>
        <th>Name</th>
        <td><?= htmlspecialchars($university['name']); ?></td>
    </tr>
    <tr>
        <th>short_name</th>
        <td><?= htmlspecialchars($university['short_name']); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><a href="mailo:<?= htmlspecialchars($university['email']); ?>">
            <?= htmlspecialchars($university['email']); ?>
        </a></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><a href="tel:<?= htmlspecialchars($university['phone']); ?>"
        <?= htmlspecialchars($university['phone']); ?>
        ></a></td>
    </tr>
    <tr>
        <th>Website</th>
       <td> <a href="<?= htmlspecialchars($university['website']); ?>"
       target="_blank">

       <?= htmlspecialchars($university['website']); ?>
     </a></td>
    </tr>
    <tr>
        <th>Country</th>
        <td><?= htmlspecialchars($university['country']); ?></td>
    </tr>
    <tr>
        <th>Province</th>
        <td><?= htmlspecialchars($university['province']); ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?= htmlspecialchars($university['city']); ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?= htmlspecialchars($university['address']); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php if($university['status']== "Active"): ?>
        <span class="badge bg-success">🟢 Active</span>
        <?php else: ?>
            <span class="badge bg-danger">🔴 Inactive</span>
        <?php endif; ?>

    </td>
    </tr>

</table>

<a href="?page=universities" class="btn btn-secondary" >
    ⬅ Back
</a>
<a href="?page=edit-university&id=<?= $university['id']; ?> " class="btn btn-success">
    ✏ Edit
</a>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php';  ?>