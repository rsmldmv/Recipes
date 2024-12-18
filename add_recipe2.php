<?php

$recipe_name = "";
$ingredient = "";

require "dbconnection.php";

$recipe_name = $conn->real_escape_string(htmlspecialchars($_GET['recipeTitle'])) ?? '';
$recipe_desc = $conn->real_escape_string(htmlspecialchars($_GET['recipeDescription'])) ?? '';

// Step 4: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 5: Prepare the SQL query to insert data
$sql = "INSERT INTO recipes (recipe_name, recipe_desc) VALUES ('$recipe_name','$recipe_desc')";

// Step 6: Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Recipe Title/Description successfully added!');</script>";
} else {
    echo "<script>document.getElementById('alertMsg').innerHTML = 'Error: ' + $sql + $conn->error;</script>";
}

// Step 7: Close the connection
$conn->close();
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/add_recipe.css">

    <title>Add New Recipe</title>

    <script type="text/javascript">
        function showMessage() {
            var returnCode = "";

            if (returnCode == true) {
                var messageVAR = document.getElementById('alertMsg');
                messageVAR.style.display = 'block';
                messageVAR.innerHTML = "Title/Description successfully added!";

                setTimeout(() => {
                    messageVAR.innerHTML = "Title/Description successfully added!";
                    messageVAR.style.display = "none";
                }, 2000);
            }
        }

        function hideMessage() {
            var msg1 = document.getElementById('alertMsg');
            msg1.style.display = "none";
            alert("hideMessage()");
        }

        function disableIngredients() {
            var ingredient = document.getElementById('div2');
            ingredient.disabled = true;
            ingredient.style.opacity = ".5";
        }

        window.onload = function () {
            disableIngredients();
            hideMessage();
        };
    </script>
</head>

<body>
    <div class="container1">
        <div class="div1">
            <form action="" class="bg-form" method="GET">
                <div>
                    <label for="recipeTitle" class="form-label text-color">Recipe Title</label>
                    <input type="text" class="form-control mb-3" id="recipeTitle" name="recipeTitle"
                        placeholder="Title">
                </div>
                <div class="mb-2">
                    <label for="recipeDescription" class="form-label text-color">Recipe Description</label>
                    <textarea class="form-control mb-3" id="recipeDescription" name="recipeDescription"
                        placeholder="Description" rows="4"></textarea>
                </div>

                <div class="mt-1">
                    <input type="submit" name="submit" onclick="showMessage()"
                        class="btn btn-primary my-2 py-1 rounded-pill" value="Add Title & Description">
                </div>

                <div class="row mt-2">
                    <p id="alertMsg" class="mx-auto msg py-2"></p>
                </div>
            </form>
        </div>


        <div class="div2">
            <form id="ingredientForm" action="" class="grid-item-3 bg-form" method="POST">
                <div>
                    <label for="ingredient" class="form-label text-color">Ingredient</label>
                    <input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="Ingredient">
                </div>

                <div class="mt-2">
                    <input type="submit" name="btn_ingredient" id="btn_ingredient"
                        class="btn btn-primary py-1 my-2 mt-2 rounded-pill" value="Add Ingredient">
                </div>
            </form>
        </div>


        <div class="div3">
            <div>
                <h3 class="fw-bold">Ingredients</h3>
                <ul class="text-white">
                    <li class="ps-2">2 lbs. Ground Beef</li>
                    <li class="ps-2">1 / 8oz. Can Tomato Sauce</li>
                    <li class="ps-2">2 / 16oz. Cans Chili Beans</li>
                    <li class="ps-2">1 Large White Onion</li>
                    <li class="ps-2">2 Green Peppers</li>
                    <li class="ps-2">12oz./1 Bottle Light Beer</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html> -->