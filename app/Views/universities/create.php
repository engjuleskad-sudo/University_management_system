<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add University</title>
</head>
<body>
    <h1>Add new University</h1>
    <form method="POST" action="?page=add-university">
        <label>University Name</label><br>
        <input type="text" name="name" required><br><br>

         <label>Short Name</label><br>
        <input type="text" name="short_name"><br><br>

         <label>Email</label><br>
        <input type="email" name="email"><br><br>

         <label>Phone</label><br>
        <input type="text" name="phone"><br><br>

         <label>Website</label><br>
        <input type="text" name="website"><br><br>

         <label>Country</label><br>
        <input type="text" name="country"><br><br>

         <label>Province</label><br>
        <input type="text" name="province"><br><br>

         <label>City</label><br>
        <input type="text" name="city"><br><br>

         <label>Address</label><br>
        <textarea name="address"></textarea><br><br>

        <button type="submit">
            Save University
        </button>

        

    </form>
    <a href="?page=universities">
             ← Back to Universities
        </a>
</body>
</html>