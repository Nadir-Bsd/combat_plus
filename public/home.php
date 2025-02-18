<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <?php if (isset($_GET['errorPOST'])): ?>
            <div class="error-message">
                <p>Rhooooo Samuel, reste en POST stp</p>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['errorGET'])): ?>
            <div class="error-message">
                <p>Rhooooo Samuel, reste en GET stp</p>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <h1>Welcome!</h1>
            <p>Please choose a username to create your account:</p>
            <form action="../process/create-user-Process.php" method="post">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" maxlength="20" placeholder="Enter your username" required>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </main>
</body>
</html>