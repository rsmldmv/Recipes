<?php
//*********************************************************************
//
// This PHP script is used to import a JSON file of food ingredients
//
//*********************************************************************

$data = json_decode(file_get_contents("test.json"));

$conn = new mysqli("127.0.0.1", "root", "", "recipes");

$str = "";
$id = 10000;
$style = 'padding: 9px';
$row = array();
$food1 = array();
$food2 = array();
$food3 = array();
$x = 0;

foreach ($data as $row) {
    $food1 = $row->ingredients;

    foreach ($food1 as $food) {
        $newItem = str_replace("'", "", $food);

        array_push($food2, $newItem);
        // echo $food . "<br/>";

        $char = "'";

        $position = strpos($newItem, $char);

        if ($position !== false) {
            echo "Character '$char' found at position $position for item $newItem <br/>";
            break;
        }
    }

}

echo "Food2 count: " . count($food2);

// echo "
// <script>
//     setTimeout(function() {
//         document.body.innerHTML = ''; // Clears the body content
//     }, 500); // 3000ms = 3 seconds
// </script>
// ";

$food3 = array_unique($food2, SORT_STRING | SORT_FLAG_CASE);
sort($food3);

foreach ($food3 as $item) {
    $sql = "INSERT INTO ingredients (id, item_name) VALUES (" . $id . ", '" . $item . "')";
    $conn->query($sql);
    $id++;
    $x++;
}

echo "Records added: " . $x;

$conn->close();

// echo "<table border='1'>";

// foreach ($jsonData as $item) {
//     $row = $item->ingredients;

//     foreach ($row as $item) {
//         array_push($food1, $item);
//         // echo $item . "<br/>";
//     }
// }

// for ($i = 0; $i < count($food1); $i++) {
//     echo $food1[$i] . "<br/>";
// }


// echo "Count: " . count($food2);

// for ($i = 0; $i < count($food2); $i++) {
//     $id++;
//     echo "<tr><td style='$style'>" . $id . "</td>" . "<td style='$style'>" . $food2[$i] . "</td></tr>";
// }

