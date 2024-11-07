<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..
    700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Add New Recipe</title>

    <style>
    body {
        font-size: 2rem;
        background-color: bisque;
    }

    input[type="text"] {
        font-size: 1.75rem;
    }

    input[type="submit"] {
        font-size: 1.75rem;
    }

    .button {
        font-size: 1.5rem;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row col-5 mt-5">
            <form action="insertData.php" method=" POST">
                <div class="my-3">
                    <label for="exampleFormControlInput1" class="form-label">Recipe Title</label>
                    <input type="text" class="form-control" id="recipeTitle" placeholder="Recipe Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="recipeDescription" rows="4"></textarea>
                </div>

                <div class="my-3">
                    <input type="text" id="ingredient" class="form-control mt-2" placeholder="Add Ingredient">
                </div>

                <div class="mt-4">
                    <!-- <button id="enableIngredient"
                        class="btn btn-primary py-3 col-4 align-items-left float-start button rounded-pill">Add
                        Ingredient</button> -->
                    <input type="submit" class="btn btn-primary py-2 rounded-pill col-4" value="Add Ingredient">
                </div>
            </form>

            <!-- <label for="exampleDataList" class="form-label">Datalist example</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
            <datalist id="datalistOptions">
                <option value="San Francisco">
                <option value="New York">
                <option value="Seattle">
                <option value="Los Angeles">
                <option value="Chicago">
            </datalist>     -->
        </div>
    </div>

    <script type="text/javascript">
    const txtEle = document.getElementById('ingredient');
    const btnEle = document.getElementById('enableIngredient');

    btnEle.addEventListener('click', function() {
        txtEle.disabled = false;
        txtEle.focus();
    });
    </script>
</body>

</html>