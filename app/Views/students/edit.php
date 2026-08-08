<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>✏ Edit</h1>
<!-- <pre>
    <?php print_r($student); ?>
</pre> -->
<form method="POST" 
action="?page=edit-student&id=<?= $student['id']; ?>"
enctype="multipart/form-data">
<label >University</label>
<select name="university_id" required>
    <option value="">---select---</option>
    <?php foreach($universities as $university): ?>
    <option value="<?= $university['id']; ?>"
    <?= $student['university_id']== $university['id']? 'selected' : '' ?>>
    <?= htmlspecialchars($university['name']); ?>
    </option>
    <?php endforeach; ?>
</select>
 <label >Registration Number</label>
 <input type="text"
        name="registration_number" 
        value="<?= htmlspecialchars($student['registration_number']); ?>"
        required>
 <label >First Number</label>
 <input type="text"
        name="first_name" 
        value="<?= htmlspecialchars($student['first_name']); ?>"
        required>
 <label >Last Name</label>
 <input type="text"
        name="last_name" 
        value="<?= htmlspecialchars($student['last_name']); ?>"
        required>
<label>Gender</label>
<select name="gender">
    <option value="">---select---</option>
    <option value="Male">
        <?= $student['gender'] == 'Male' ? 'selected': ''; ?>
        Male
    </option>
    <option value="Female">
        <?= $student['gender']== 'Female' ? 'selected': ''; ?>
        Female
    </option>
</select>
 <label >Date Of Birth</label>
 <input type="date"
        name="date_of_birth" 
        value="<?= htmlspecialchars($student['date_of_birth']); ?>">
 <label >Email</label>
 <input type="email"
        name="email" 
        value="<?= htmlspecialchars($student['email']); ?>">
 <label >Phone</label>
 <input type="text"
        name="phone" 
        value="<?= htmlspecialchars($student['phone']); ?>">
<label>Current Photo</label>
<br>
<?php
$photo= !empty($student['photo'])
   ?"/assets/uploads/students/" . htmlspecialchars($student['photo'])
   :"/assets/images/default_user.png";
   ?>
   <img src="<?= $photo; ?>" 
   alt="student photo"
   width="100"
   height="100"
   style="border-radius:50%; object-fit:cover;">
   <br><br>

   <label>Change Photo</label>
   <input type="file" name="photo">

    <label >Contry</label>
 <input type="text"
        name="country" 
        value="<?= htmlspecialchars($student['country']); ?>">
 <label >Province</label>
 <input type="text"
        name="province" 
        value="<?= htmlspecialchars($student['province']); ?>">
 <label >City</label>
 <input type="text"
        name="city" 
        value="<?= htmlspecialchars($student['city']); ?>">
<label>Address</label>
<textarea name="address"><?= htmlspecialchars($student['address']); ?></textarea>

<br><br>
<button type="submit">
    💾 Update Student
</button>
<a href="?page=students" class="btn btn-secondary">
    Cancel
</a>
   
</form>


<?php require_once __DIR__ . '/../layouts/footer.php'; ?>