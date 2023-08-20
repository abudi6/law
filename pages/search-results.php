<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>
    <div>
        <?php
        $data = []; // Replace with actual search results data
        if (count($data) > 0) {
            echo "<p class=\"results-found\">" . count($data) . " results found.</p>";

            foreach ($data as $index => $item) {
                echo "<div class=\"law-item\">";
                echo "  <div class=\"px-5 py-4\">";
                echo "    <a href=\"/law-content/{$item['lawId']}\" class=\"link-style\">";
                echo "      <h5>" . strtoupper($item['lawTitle']) . "</h5>"; // Redirect to lawContent - via ID
                echo "    </a>";
                echo "    <div>";
                echo "      <p class=\"law-desc\">{$item['lawDescription']}</p>";
                echo "      <a href=\"/law-content/{$item['lawId']}\" class=\"link-style\">Read More</a>";
                echo "      <p class=\"keywords\"><b>Keyword(s):</b> " . implode(', ', $item['keywords']) . "</p>";
                echo "    </div>";
                echo "  </div>";
                echo "  <hr />";
                echo "</div>";
            }
        } else {
            echo "<p>No Results</p>";
        }
        ?>
    </div>
</body>
</html>