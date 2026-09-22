<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>
<h1>👩‍🏫 Add New Lecturer</h1>

<form action="?page=store-lecturer" method="POST" enctype="multipart/form-data">
    <div>
        <label>Univerity</label>
        <select name="university_id" required>
            <option value="">---Select University---</option>
            <?php foreach($universities as $university): ?>
                <option value="<?= $university['id']; ?>">
                    <?= htmlspecialchars($university['name']); ?>

                </option>
                <?php endforeach; ?>
        </select>
    </div>
    <br>

    <div>
        <label >Staff Number</label>
        <input type="text" name="staff_number" required>
    </div>
    <br>
    <div>
        <label >First Name</label>
        <input type="text" name="first_name" required>
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" required>
    </div>
    <div>
        <label>Gender</label>
        <select name="gender" required>
            <option value="">---select Gender---</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        </select>
    </div>
    <br>
    <div>
        <label>Date Of Birth</label>
        <input type="date" name="date_of_birth" >
    </div>
    <br>
    <div>
        <label >Email</label>
        <input type="email" name="email" required>
    </div>
    <br>
    <div>
        <label>Phone</label>
        <input type="text" name="phone">
    </div>
    <br>
    <div>
        <label >Photo</label>
        <input type="file" name="photo" accept="image/*">
    </div>
    <br>
    <div>
        <label >Department</label>
    <input type="text" name="department">
    </div>
    <br>
    <div>
        <label >Specialization</label>
        <input type="text" name="specialization">
    </div>
    <br>
    <div>
        <label>Qualification</label>
        <input type="text" name="qualification">

    </div>
    <br>
    <div>
        <label >Employment type</label>
        <select name="employment_type">
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Visitting">Visitting</option>
        </select>

    </div>
    <br>
    <div>
        <label >Country</label>
        <input type="text" name="country">
    </div>
    <br>
    <div>
        <label>Province</label>
        <input type="text" name="province">
    </div>
    <br>
    <div>
        <label >City</label>
        <input type="text" name="city">
    </div>
    <br>
    <div>
        <label >Address</label>
        <input type="text" name="address">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">
         💾 Save Lecturer
    </button>
    <a href="?page=lecturers" class="btn btn-primary">
        Cancel
    </a>
    

</form>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

