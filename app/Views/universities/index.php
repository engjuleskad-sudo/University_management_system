
<?php
require_once __DIR__ . '/../layouts/header.php';
?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

     <!-- flash message  -->
      <?php if(isset($_SESSION['success'])): ?>

        <div class="alert alert-success">
            <?= $_SESSION['success']; ?>

        </div>
        
        <?php unset($_SESSION['success']); ?>

        <?php endif; ?>
        
        </div>

    <h1>Universities</h1>
    <p>
        <a href="?page=add-university" class="btn btn-primary">
            ➕ Add New University
        </a>
    </p>

    <table border="1" cellapadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Short Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Status</th>
            <th>Actions</th>
            


        </tr>

        <?php foreach($universities as $university): ?>
            <tr>
                <td><?= $university['id']; ?></td>
                <td><?= $university['name']; ?></td>
                <td><?= $university['short_name']; ?></td>
                <td><?= $university['email']; ?></td>
                <td><?= $university['city']; ?></td>
                <td>
                    <?php if($university['status']=='Active'): ?>
                        <span class="badge bg-success">Active</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Inactive</span>
                    <?php endif; ?>
                </td>
             <td>

                <a class="btn btn-success" href="?page=edit-university&id=<?= $university['id']; ?>">
                   ✏ Edit 
                </a>
                <?php if($university['status']== 'Active'): ?>

                <a class="btn btn-danger" href="?page=deactivate-university&id=<?= $university['id']; ?>" 
                onclick="return confirm('Are you sure you want to delete this university?');">
                🚫 Deactivate  
            
             </a>
             <?php else: ?>
                <a class="btn btn-primary"
                href="?page=activate-university&id=<?= $university['id']; ?>">
            ✅ Activate
            </a>
            <?php endif; ?>
             
                
            
              </td>
            </tr>
           
        <?php endforeach; ?>
    </table>

<?php require_once __DIR__ .'/../layouts/footer.php'; ?>