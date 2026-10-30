<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<h1>git --no-pager diff -- app/Core/Router.php app/Models/Lecturer.php app/Views/lecturers/index.php Edit Lecturer</h1>

<?php if (!empty($_SESSION['error'])): ?>
    <p class="error-message">
        <?= htmlspecialchars($_SESSION['error']); ?>
    </p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form
    action="?page=edit-lecturer&id=<?= (int) $lecturer['id']; ?>"
    method="POST"
    enctype="multipart/form-data"
>
    <div>
        <label>University</label>
        <select name="university_id" required>
            <option value="">--- Select University ---</option>

            <?php foreach ($universities as $university): ?>
                <option
                    value="<?= (int) $university['id']; ?>"
                    <?= (int) $lecturer['university_id'] ===
                        (int) $university['id'] ? 'selected' : ''; ?>
                >
                    <?= htmlspecialchars($university['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>

    <div>
        <label>Staff Number</label>
        <input
            type="text"
            name="staff_number"
            value="<?= htmlspecialchars($lecturer['staff_number'] ?? ''); ?>"
            required
        >
    </div>
    <br>

    <div>
        <label>First Name</label>
        <input
            type="text"
            name="first_name"
            value="<?= htmlspecialchars($lecturer['first_name'] ?? ''); ?>"
            required
        >
    </div>
    <br>

    <div>
        <label>Last Name</label>
        <input
            type="text"
            name="last_name"
            value="<?= htmlspecialchars($lecturer['last_name'] ?? ''); ?>"
            required
        >
    </div>
    <br>

    <div>
        <label>Gender</label>
        <select name="gender" required>
            <option value="">--- Select Gender ---</option>
            <option
                value="Male"
                <?= ($lecturer['gender'] ?? '') === 'Male' ? 'selected' : ''; ?>
            >Male</option>
            <option
                value="Female"
                <?= ($lecturer['gender'] ?? '') === 'Female' ? 'selected' : ''; ?>
            >Female</option>
        </select>
    </div>
    <br>

    <div>
        <label>Date of Birth</label>
        <input
            type="date"
            name="date_of_birth"
            value="<?= htmlspecialchars($lecturer['date_of_birth'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Email</label>
        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($lecturer['email'] ?? ''); ?>"
            required
        >
    </div>
    <br>

    <div>
        <label>Phone</label>
        <input
            type="text"
            name="phone"
            value="<?= htmlspecialchars($lecturer['phone'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Current Photo</label><br>

        <?php if (!empty($lecturer['photo'])): ?>
            <img
                src="assets/uploads/lecturers/<?= rawurlencode($lecturer['photo']); ?>"
                alt="Lecturer Photo"
                width="120"
            >
        <?php else: ?>
            <p>No photo available.</p>
        <?php endif; ?>
    </div>
    <br>

    <div>
        <label>Replace Photo (optional)</label>
        <input
            type="file"
            name="photo"
            accept=".jpg,.jpeg,.png,.gif,.webp"
        >
        <small>Leave empty to keep the current photo.</small>
    </div>
    <br>

    <div>
        <label>Department</label>
        <input
            type="text"
            name="department"
            value="<?= htmlspecialchars($lecturer['department'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Specialization</label>
        <input
            type="text"
            name="specialization"
            value="<?= htmlspecialchars($lecturer['specialization'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Qualification</label>
        <input
            type="text"
            name="qualification"
            value="<?= htmlspecialchars($lecturer['qualification'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Employment Type</label>
        <select name="employment_type">
            <?php $employmentTypes = ['Full-time', 'Part-time', 'Visitting']; ?>

            <option value="">--- Select Employment Type ---</option>

            <?php foreach ($employmentTypes as $type): ?>
                <option
                    value="<?= htmlspecialchars($type); ?>"
                    <?= ($lecturer['employment_type'] ?? '') === $type
                        ? 'selected' : ''; ?>
                >
                    <?= htmlspecialchars($type); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>

    <div>
        <label>Country</label>
        <input
            type="text"
            name="country"
            value="<?= htmlspecialchars($lecturer['country'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Province</label>
        <input
            type="text"
            name="province"
            value="<?= htmlspecialchars($lecturer['province'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>City</label>
        <input
            type="text"
            name="city"
            value="<?= htmlspecialchars($lecturer['city'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Address</label>
        <input
            type="text"
            name="address"
            value="<?= htmlspecialchars($lecturer['address'] ?? ''); ?>"
        >
    </div>
    <br>

    <div>
        <label>Status</label>
        <select name="status" required>
            <option
                value="Active"
                <?= ($lecturer['status'] ?? 'Active') === 'Active'
                    ? 'selected' : ''; ?>
            >Active</option>

            <option
                value="Inactive"
                <?= ($lecturer['status'] ?? '') === 'Inactive'
                    ? 'selected' : ''; ?>
            >Inactive</option>
        </select>
    </div>
    <br>

    <button type="submit" class="btn btn-primary">
        💾 Update Lecturer
    </button>

    <a
        href="?page=view-lecturer&id=<?= (int) $lecturer['id']; ?>"
        class="btn btn-primary"
    >
        Cancel
    </a>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>