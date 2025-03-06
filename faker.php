<?php 
require ('vendor/autoload.php');

use Faker\Factory;

$faker = Factory::create('en_PH');

$servername = "localhost";
$username = "root";  
$password = "mysqlroot";  
$dbname = "Office";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $officeidn = [];
    for ($j = 0; $j <50; $j++) {
        $data = $pdo->prepare("insert into Office(name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $data->execute([
            $faker-> company,
            $faker-> phoneNumber,
            $faker-> email,
            $faker-> address,
            $faker-> city, 'Philippines',
            $faker-> postcode
        ]);
        $officeidn[] = $pdo ->lastInsertId();
    }

    $employeeidn = [];
    for ($j = 0; $j <200; $j++) {
        $data = $pdo->prepare("insert into Employee(lastname,firstname,office_id,address) VALUES (?, ?, ?, ?)");
        $data->execute([
            $faker-> lastName,
            $faker-> firstName,
            $faker-> randomElement($officeidn),
            $faker-> address,
        ]);
        $employeeidn[] = $pdo ->lastInsertId();
    }

    for ($j = 0; $j <500; $j++) {
        $data = $pdo->prepare("insert into transaction(employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");
        $data->execute([
            $faker-> randomElement($employeeidn),
            $faker-> randomElement($officeidn),
            $faker-> dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            $faker-> word,
            $faker-> sentence,
            $faker-> uuid
        ]);
        $employeeidn[] = $pdo ->lastInsertId();
    }
    echo "Data is generated without an error";
} catch(PDOException $e){
    echo "Error occured: ". $e->getMessage();
}
?>