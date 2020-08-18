<?php
include 'connection.php';
?>
<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>moyenneagemale</th><th>moyenneagefemale</th></tr>";
class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

 try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $conn->prepare("SELECT (SELECT AVG(TRUNCATE(DATEDIFF(date(now()), CONVERT(CONCAT(RIGHT(birth_date,4),SUBSTRING(birth_date,4,2),LEFT(birth_date,2)), date))/365,0)) from datas where `gender`='male') as age_homme, (SELECT AVG(TRUNCATE(DATEDIFF(date(now()), CONVERT(CONCAT(RIGHT(birth_date,4),SUBSTRING(birth_date,4,2),LEFT(birth_date,2)), date))/365,0)) FROM datas WHERE `gender`='female') as age_femme ");













   $stmt->execute();

   // set the resulting array to associative
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
     echo $v;
   }
 } catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
 }
 $conn = null;
 echo "</table>";
 ?>
