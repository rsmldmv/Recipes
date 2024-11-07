<?php
session_start();

include "dbconnection_pdo.php";

$username = "";

if (isset($_SESSION['handle'])) {
    $username = "Welcome " . $_SESSION['handle'];
}

$ID = 0;
$sql = "";
$results = [];
$recipe_name = "";

if (isset($_GET['id'])) {
    $ID = (int) $_GET['id'];
}

$sql = "SELECT recipe_name, id FROM food.recipes WHERE category_ID = :id ORDER BY recipe_name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $ID);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <title>The Cookery</title>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/index.js"></script>

    <style>
        /* * {
            border: 1px solid red;
        } */

        .centered-div {
            top: 2%;
            left: 12.5%;
            height: 600px;
            padding: 15px 15px;
            margin-top: 280px;
            position: fixed;
            overflow-y: auto;
            transform: translate(-5%, -12.5%);
        }
    </style>
</head>

<body>
    <div class="col-12" style="top: 0; position: fixed; z-index: 1;">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="index.php" id="recipe_header" class="col-4">
                    <h1 class="h1-width mt-4 align-items-center">The Cookery</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarNav" class="collapse navbar-collapse fs-5 ms-3 mt-2">
                    <ul class="navbar-nav ps-3">
                        <li class="nav-item">
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=2" class="menu-item-color pill">Seafood</a>
                        </li>

                        <li class="nav-item">
                            <a href="?id=3" class="menu-item-color pill">Beef</a>
                        </li>

                        <li class="nav-item">
                            <a href="?id=4" class="menu-item-color pill">Chicken</a>
                        </li>

                        <li class="nav-item">
                            <a href="?id=5" class="menu-item-color pill">Lamb</a>
                        </li>

                        <li class="nav-item">
                            <a href="?id=6" class="menu-item-color pill">Salads</a>
                        </li>

                        <li class="nav-item">
                            <a href="?id=6" class="menu-item-color pill">Other</a>
                        </li>

                        <li class="nav-item">
                            <a class="menu-item-color px-3 pill add-recipe" href="add_recipe_form.html"
                                target="_blank">Add Recipe</a>
                        </li>

                        <li class="nav-item">
                            <a class="menu-item-color px-3 pill add-recipe" href="login-form.php" target="_blank">Log
                                In</a>
                        </li>

                        <li class="nav-item">
                            <a class="menu-item-color px-3 pill add-recipe" href="register-form.php"
                                target="_blank">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex" style="margin-left: 150px">
            <h2 class="mt-4 text-4xl col-2 add-shadow" style="margin-left: 40px">Recipes at your fingertips!</h2>

            <?php if (isset($_SESSION['handle'])): ?>
                <span id="welcome" class="fs-4 mt-4" style="float: right; width: 30%; color: #fff">Welcome
                    <?php echo htmlspecialchars($_SESSION['handle']); ?></span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="javascript:void(0)" onclick="openLoginPage()">Login</a>
            <?php endif; ?>

        </div>
    </div>


    <div class="col-10 centered-div align-items-center justify-content-center">
        <div class="row justify-content-center">
            <?php foreach ($result as $row): ?>
                <div id="recipes1"
                    class="col-2 divs border-1 rounded lh-sm py-3 px-3 fs-5 mx-2 mt-2 mb-3 bg-warning text-center align-content-center">
                    <a href="edit_recipe.php?id=<?= $row['id']; ?>&recipe_name=<?= $row['recipe_name'] ?>" class="rLinks"
                        target="_blank"><?= $row['recipe_name'] ?></a>
                    <span><?php $row['id']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>