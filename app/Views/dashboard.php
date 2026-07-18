<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
      <link rel="stylesheet" href="assets/css/style.css">       
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>UMS</h2>
            <ul>
                <li>🏠 Dashboard</li>
                <li>🏫 Universities</li>
                <li>👨‍🎓 Students</li>
                <li>👨‍🏫 Lecturers</li>
                <li>📚 Library</li>
                <li>💰 Finance</li>
                <li>⚙ Settings</li>
                <li><a href="?page=logout">🚪 Logout</a></li>
            </ul>

        </div>
        <div class="content">
             <h2>Welcome,
            <?php echo $_SESSION['first_name']; ?>! 
             </h2>

             <p>You have successfully loged in.</p>
             <hr>

             <h2>Dashboard Overview</h2>
             <div class="cards">
                <div class="card">
                    <h3>Universities</h3>
                    <p>1</p>

                </div>
                 <div class="card">
                    <h3>Students</h3>
                    <p>0</p>

                </div>
                 <div class="card">
                    <h3>Lecturers</h3>
                    <p>0</p>

                </div>
                 <div class="card">
                    <h3>Courses</h3>
                    <p>0</p>

                </div>

             </div>

        </div>

    </div>
    

   
    
</body>
</html> -->


<?php require_once __DIR__ . '/layouts/header.php'; ?>
<?php require_once __DIR__ . '/layouts/sidebar.php'; ?>

<h1>Dashboard</h1>

<p>Welcome,
    <strong>
        <?= $_SESSION['first_name']; ?>
        <?= $_SESSION['last_name']; ?>
    </strong>

</p>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>
