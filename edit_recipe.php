<?php

$ID = $_GET['id'];
$recipe_name = $_GET['recipe_name'];
$sql = "";

require "dbconnection.php";

$message = "";
$returnCD = false;

if (isset($ID)) {
    $sql = "SELECT id, item_name FROM ingredients WHERE recipe_ID = " . $ID;

    if (isset($conn)) {
        $results = $conn->query($sql);
    }

    // Step 7: Close the connection
    $conn->close();
}
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/add_recipe.css">

    <title>Edit Recipe</title>
</head>

<body onload="HideMessage(), disableIngredients()">
    <div class="container1">
        <div class="div1">
            <form action="" class="bg-form" method="POST">
                <div>
                    <label for="recipeTitle" class="form-label text-color noMargin">Recipe Title</label>
                    <input type="text" class="form-control mb-3" id="recipeTitle" name="recipeTitle"
                        placeholder="Title">
                </div>
                <div class="mb-2">
                    <label for="recipeDescription" class="form-label text-color noMargin">Recipe Description</label>
                    <textarea class="form-control mb-3" id="recipeDescription" name="recipeDescription"
                        placeholder="Description" rows="4"></textarea>
                </div>

                <div class="mt-1">
                    <input type="submit" name="submit" onclick="showMessage()"
                        class="btn btn-primary my-2 py-1 button rounded-pill" value="Add Title & Description">
                </div>

                <div class="row mt-2">
                    <p id="alertMsg" class="mx-auto msg py-2"></p>
                </div>
            </form>
        </div>


        <div class="div2">
            <form id="ingredientForm" action="php/insertIngredient.php" class="grid-item-3 bg-form" method="POST">
                <div>
                    <label for="ingredient" class="form-label text-color">Ingredient</label>
                    <input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="Ingredient">
                </div>

                <div class="mt-2">
                    <button class="btn btn-primary py-1 button my-2 mt-2 rounded-pill">AddIngredient</button>
                </div>
            </form>
        </div>


        <div class="div3">
            <div>
                <h3 class="fw-bold">Texas Chili Recipe</h3>
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



    <script>
        function showMessage() {
            var returnCode = "<?php echo $returnCD; ?>";

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

        function HideMessage() {
            document.getElementById("alertMsg").style.display = "none";
        }

        function disableIngredients() {
            var ingredient = document.getElementById('ingredientForm');
            ingredient.disable = true;
        }
    </script>
</body>

</html>