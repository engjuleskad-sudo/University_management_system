<?php __DIR__ . '/../layouts/header.php'; ?>
<?php __DIR__ . '/../layouts/sidebar.php'; ?>
<div class="content">
    <div class="page-header">
        <h1>👩‍🏫  Lecture Details</h1>
        <a href="?page=lecturers" class="btn btn-secondary">
    ← Back to Lecturers 
</a>
    </div>
    <div class="Lecturer-profile">
        // lecturer photo
        <div class="profile-photo">
            <?php if(!empty($lecturer['photo'])): ?>
                <img 
                src="assets/uploads/lecturers/<?=htmlspecialchars($lecturer['photo']); ?>" 
                alt="Lecturer photo">
            <?php else: ?>
                <div class="no-photo">
                    👤 
                    <span>No Photo</span>
                </div>
            <?php endif; ?>
        </div>
        //Basic information 
        <div class="profile-info">
            <h2>
            <?=    htmlspecialchars(
            $lecturer['first_name'] . '' . $lecturer['last_name']
            ); ?>
            </h2>
            <h2>
        <p class="staff-number">
            Staff Number:
            <strong><?= htmlspecialchars($lecturer['staff_number']); ?></strong>
        </p>
        <span class="status-badge">
            <?= htmlspecialchars($lecturer['status']); ?>
        </span>
            </h2>
        </div>
    


    </div>
     <!-- personal information  -->
      <div class="info-card">
        <h1>👤 Personal Information </h1>
        <div class="info-grid">
            <div>
                <strong>Gender</strong>
                <span><?= htmlspecialchars($lecturer['gender']); ?></span>
            </div>
            <div>
                <strong>Date Of Birth</strong>
                <span><?= htmlspecialchars($lecturer['date_of_birth'] ?? 'N/A'); ?></span>
            </div>
            <div>
                <strong>Email</strong>
                <span><?= htmlspecialchars($lecturer['email'] ?? 'N/A'); ?></span>
            </div>
            <div>
                <strong>Phone</strong>
                <span><?= htmlspecialchars($lecturer['phone'] ?? 'N/A'); ?></span>
            </div>
            

        </div>
        <!-- Academic Information -->

        <div class="info-grid">
            <div>
                <strong>University</strong>
                <span><?= htmlspecialchars($lecturer['university_name']); ?></span>
            </div>
            <div>
                <strong>Department</strong>
                <span><?= htmlspecialchars($lecturer['department'] ?? 'N/A'); ?></span>
            </div>
            <div>
                <strong>Specialization</strong>
                <span><?= htmlspecialchars($lecturer['specialization'] ?? 'N/A'); ?></span>
            </div>
             <div> 
                 <strong>Qualification</strong>
                 <span><?= htmlspecialchars($lecturer['qualification'] ?? 'N/A'); ?></span>

            </div>
            <div>
                <strong>Employment Type</strong>
                <span><?= htmlspecialchars($lecturer['employment_type'] ?? 'N/A'); ?></span>
            </div>


        </div>
      </div>
      <!-- Address Information -->
      <div class="info-card">
        <h2>🌍 Addres Information</h2>
        <div class="info-grid">
            <div>
                <strong>Country</strong>
                <span><?= htmlspecialchars($lecturer['country'] ?? 'N/A'); ?></span>
            </div>
            <div>
                <strong>Province</strong>
                <span><?= htmlspecialchars($lecturer['province']); ?></span>
            </div>
            <div>
                <strong>City</strong>
                <span><?= htmlspecialchars($lecturer['city']); ?></span>
            </div>
            <div>
                <strong>Addres</strong>
                <span><?= htmlspecialchars($lecturer['address']); ?></span>
            </div>
        </div>

      </div>

 
</div>

<pre>
    <?php print_r($lecturer); ?>
</pre>


<?php require_once __DIR__ . '/../layouts/footer.php'; ?>