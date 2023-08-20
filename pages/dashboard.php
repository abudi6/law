<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>
    <?php
    if (isset($_GET['q'])) {
        $searchQuery = $_GET['q'];

        // Connect to your database and perform search query
        // Retrieve and display search results
        // Replace this with your actual database query and results handling

        echo "<h1>Search Results for: $searchQuery</h1>";
        echo "<p>Display search results here...</p>";
    } else {
        echo "<h1>No search query provided.</h1>";
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LawPhil Project</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>
    <div class="body-search">
        <div class="container d-flex flex-column">
            <div class="search-body text-center flex-grow-1 vh-100">
                <img src="/logo.png" class="login-logo mb-4" alt="LawPhil Logo">
                <h4 class="mb-3">ARELLANO LAW FOVNDATION</h4>
                <h1>LawPhil Project</h1>
                <!-- Main Search -->
                <div class="search-bar">
                    <form action="search-results.php" method="get" class="search-form">
                        <div class="form-group has-feedback">
                            <div class="input-group my-5">
                                <input type="text" class="form-control search-form-control" name="q" placeholder="Search Keywords" aria-label="Search Bar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn search-btn">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <h5>FREE ACCESS TO LAW</h5>

                <div class="mt-3 pt-5">
                    <a href="#adv-search" class="link-light">
                        Advanced Search <br>
                        <span class="fa fa-circle-arrow-down"></span>
                    </a>
                </div>
            </div>

            <!-- Advanced Search -->
            <div id="adv-search" class="adv-search-body flex-grow-1 vh-100">
                <div class="row align-items-center">
                    <h6>Search by Category</h6>
                    <div class="col-12 col-md-6">
                        <select class="form-select" id="search-categories">
                            <option>All Categories</option>
                            <option>Constitutions</option>
                            <!-- Add other options here -->
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <div class="search-bar">
                            <form action="search-results.php" method="get" class="search-form">
                                <div class="form-group has-feedback">
                                    <div class="input-group my-5">
                                        <input type="text" class="form-control search-form-control" name="q" placeholder="Search Keywords" aria-label="Search Bar">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn search-btn">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
