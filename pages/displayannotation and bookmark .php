
<!-- just  a reference to display the annotation and bookmarks (idk if it works yet) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <h2>Your Annotations:</h2>
    <?php
    if (!empty($annotations)) {
        echo "<ul>";
        foreach ($annotations as $annotation) {
            echo "<li>$annotation</li>";
        }
        echo "</ul>";
    } else {
        echo "You have no annotations.";
    }
    ?>
    
    <p><a href="logout.php">Logout</a></p>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Add your CSS stylesheets here -->
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <h2>Your Bookmarks:</h2>
    <?php
    if (!empty($bookmarks)) {
        echo "<ul>";
        foreach ($bookmarks as $bookmark) {
            echo "<li><a href=\"/law-content/{$bookmark['lawId']}\">{$bookmark['lawTitle']}</a></li>";
        }
        echo "</ul>";
    } else {
        echo "You have no bookmarks.";
    }
    ?>
    
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
