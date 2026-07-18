<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__  . '/../layouts/sidebar.php'; ?>

<h1>Edit University</h1>

<form action="?page=update-university&id=<?= $university['id']; ?>" method="POST">
<label >University Name</label>
<input type="text" name="name" value="<?= htmlspecialchars($university['name']); ?>" required>

<label>Short Name</label>
<input type="text" name="short_name" 
value="<?= htmlspecialchars($university['short_name']); ?>">

<label>Email</label>
<input type="email" name="email" 
value="<?= htmlspecialchars($university['email']); ?>" >

<label>Phone</label>
<input type="text" name="phone" 
value="<?= htmlspecialchars($university['phone']); ?>">

<label>Website</label>
<input type="text" name="website" 
value="<?= htmlspecialchars($university['website']); ?>">

<label>Country</label>
<input type="text" name="country" 
value="<?= htmlspecialchars($university['country']); ?>">

<label>Province</label>
<input type="text" name="province" 
value="<?= htmlspecialchars($university['province']); ?>">

<label>City</label>
<input type="text" name="city" 
value="<?= htmlspecialchars($university['city']); ?>">

<label>Address</label>
<input type="text" name="address" 
value="<?= htmlspecialchars($university['address']); ?>">

<br><br>

<button type="submit">
💾 Update University
</button>


</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>