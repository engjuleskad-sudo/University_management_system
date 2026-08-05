<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>👨 Add New Student</h1>

<form method="POST"
action="?page=store-student"
enctype="multipart/form-data">
<label >University</label>
<select name="university_id" required>
    <option value="">---Select---</option>
    <?php foreach($universities as $university): ?>
        <option value="<?= $university['id']; ?>">
           <?= htmlspecialchars($university['name']); ?>
        </option>
    <?php endforeach; ?>

</select>
<label>Regitration Number</label>
<input type="text" name="registration_number" required>

<label>First Name</label>
<input type="text" name="first_name" required>

<label >Last Name</label>
<input type="text" name="last_name" required>

<label>Gender</label>
<select name="gender" required>
    <option value="">Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
<label>Date Of Birth</label>
<input type="date" name="date_of_birth">

<label>Email</label>
<input type="email" name="email">

<label>Phone</label>
<input type="text" name="phone">

<label>Photo</label>
<input type="file" name="photo">

<label>Country</label>
<input type="text" name="country">

<label>Province</label>
<input type="text" name="province">

<label>City</label>
<input type="text" name="city">

<label>Address</label>
<textarea name="address"></textarea>

<br><br>

<button type="submit">💾 Save Student</button>

<a href="?page=students" class="btn btn-secondary">
    Cancel
</a>


</form>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>