<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();
//table style using echo
echo "<table class='table table-dark table-striped-columns'>";
//table header
echo "<tr> <th>Title</th>
<th>Author</th>
<th>Genre</th>
<th>Publication</th>
<th>ISBN</th>
<th>Summary </th>
</tr>;
"
//number iteration of the total books that the faker wanna generate.
for($j = 0;$j < 15; $j++ ){
 echo "<tr>";
 echo "<td>";
 $faker->sentences(3). "<td>";
 echo "<td>";
 $faker->name(). "<td>";
 echo "<td>";
 $genres[array_rand($genres)] . "<td>";
 echo "<td>";
 $faker->number_years(1990, 2024) . "<td>";
 echo "<td>";
 $faker->isbndg13 . "<td>";
 echo "<td>";
 $faker->paragraph() . "<td>";
 echo "<tr>";
};

echo "</table>";

?>