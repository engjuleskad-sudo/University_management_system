
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
        

    
    <p>
       
    </p>
    <div class="page-header">
        <h1> 🏫Universities</h1>

         <a href="?page=add-university" class="btn btn-primary">
            ➕ Add New University
        </a>

    </div>
      <form method="GET" class="search-box">
        <input type="hidden" name="page" value="universities">
        <input 
        type="text"
        name="search"
        class="form-control"
        placeholder="Search by name,short name or by city..."
        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
        >


      
        <select name="status">
            <option value="">All Status</option>

            <option value="Active"
                <?= (($_GET['status'] ?? '')== 'Active') ? 'selected' : '' ?>>
                Active
            </option>

            <option value="Inactive"
            <?= (($_GET['status'] ?? '') == 'Inactive') ? 'selected' : '' ?>
            >
            Inactive
        </option>
        </select>

          <button type="submit" class="btn btn-primary">
            🔍 Search

        </button>
        <a href="?page=universities" class="btn btn-secondary">
            Reset
        </a>


</form>
<p class="result-count">
    <?= count($universities); ?> university(ies) found.
</p>


    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Short Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Status</th>
            <th>Actions</th>
            


        </tr>
        <?php if(count($universities)>0): ?>
        <?php foreach($universities as $university): ?>
            <tr>
                <td><?= $university['id']; ?></td>
                <td><?= $university['name']; ?></td>
                <td><?= $university['short_name']; ?></td>
                <td><?= $university['email']; ?></td>
                <td><?= $university['city']; ?></td>
                <td class="text-center">
                    <?php if($university['status']=='Active'): ?>
                        <span class="status active">Active</span>
                    <?php else: ?>
                        <span class="status inactive">Inactive</span>
                    <?php endif; ?>
                </td>
            <td>
                <div class="actions">

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

            </div>
             </td>

          </tr> 
            <?php endforeach; ?>
            
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center;">
                        No universities found.

                    </td>
                </tr>
            <?php endif; ?>
       
    </table>

  
<?php require_once __DIR__ .'/../layouts/footer.php'; ?>
