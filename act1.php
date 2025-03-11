<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('Fil_PH');

echo "<table class='table table-bordered'>";
echo "<tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Birthdate</th>
        <th>Job</th>
    </tr>";

for ($i = 0; $i < 5; $i++) {
    echo "<tr>";
    echo "<td>".$faker->name. "</td>";
    echo "<td>".$faker->email. "</td>";
    echo "<td>+63". $faker->numerify("9### ### ####")."</td>";
    echo "<td>".$faker->address."</td>";
    echo "<td>".$faker->date("YYYYY-MM-DD")."</td>";
    echo "<td>".$faker->jobTitle."</td>";
    echo "</tr>";
}

echo "</table>";
?>

