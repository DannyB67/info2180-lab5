<?php



?>

<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(isset($_GET['lookup'])){
  $country = htmlspecialchars($_GET['country']);
  //$city = htmlspecialchars($_GET['lookup']);
  //$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  CityTable($results);
  exit;
}
if (isset($_GET['country'])){
  $country = htmlspecialchars($_GET['country']);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  CountryTable($results);
}

//$stmt->execute([$country]);


function CountryTable($results){
echo "<table><thead><tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr></thead><tbody>";
       foreach ($results as $row): 
        echo "<tr>";
          echo "<td>" .$row['name']. "</td>";
          echo "<td>" .$row['continent']. "</td>";
          echo "<td>" .$row['independence_year']. "</td>";
          echo "<td>" .$row['head_of_state']. "</td>";
        echo "</tr>";

       endforeach; 
  echo"</tbody></table>";
}

function CityTable($results){
echo "<table><thead><tr><th>Name</th><th>District</th><th>Population</th></tr></thead><tbody>";
       foreach ($results as $row): 
        echo "<tr>";
          echo "<td>" .$row['name']. "</td>";
          echo "<td>" .$row['district']. "</td>";
          echo "<td>" .$row['population']. "</td>";
        echo "</tr>";

       endforeach; 
  echo"</tbody></table>";
}

?>


