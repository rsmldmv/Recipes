<?php
session_start();

include "dbconnection_pdo.php";

$handle = "";
$username = "";

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <title>The Cookery</title>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>

    <style>
        /* * {
            border: 1px solid red;
        } */

        .greeting {
            top: 0;
            width: auto;
            margin-top: -15px;
            position: relative;
            color: #fff;
            font-size: 12px;
        }

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

                <div id="navbarNav" class="row collapse navbar-collapse fs-5 ms-3 mt-2">
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
                            <a class="menu-item-color px-3 pill add-recipe" href="login-form.php" data-bs-toggle="modal"
                                data-bs-target="#myModal">Log In</a>
                        </li>

                        <li class="nav-item">
                            <a class="menu-item-color px-3 pill add-recipe" href="register-form.php"
                                target="_blank">Register</a>
                        </li>
                    </ul>

                    <div class="row justify-content-end mt-3" style="height: auto">
                        <span id="welcome" class="fs-8"
                            style="font-weight: 600; width: 250px; color: yellow; margin-right: 60px; text-align: center"></span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="d-flex col-9" style="margin-left: 150px">
            <h2 class="mt-4 text-4xl col-3 add-shadow" style="margin-left: 40px">Recipes at your fingertips!</h2>
        </div>
    </div>


    <!-- Modal Structure -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 200px">
            <div class="modal-content" style="background-color: #f1f2f7">

                <!-- Modal Header -->
                <div class="modal-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" class="bi bi-door-open svg pe-3"
                        viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 
                    .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z" />
                    </svg>
                    <h5 class="modal-title" id="myModalLabel">User Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body with Form -->
                <div class="modal-body">
                    <form id="modalForm" method="POST" action="index.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <!-- Add more form fields as needed -->
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="modalForm">Submit</button>
                </div>
            </div>
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

<?php
// session_unset();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Query to find the user
    $sql = "SELECT password, handle FROM food.users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found!";
        exit();
    } else {
        $hashedpassword = trim($user['password']) ?? null;

        if ($hashedpassword && password_verify($password, $hashedpassword)) {
            $handle = "Welcome " . $user['handle'];
            $script = "<script>document.getElementById('welcome').innerHTML = '" . $handle . "';</script>";
            echo $script;
        } else {
            echo '<script>document.getElementById("msg").innerHTML = "Invalid Login Credentials...try again!"</script>';
            echo '<script>document.getElementById("msg").style.display = "block";</script>';
        }
    }
}