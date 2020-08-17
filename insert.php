<?php
include 'connection.php';
?>
<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

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
   $stmt = $conn->prepare("INSERT INTO `datas`(`id`, `first_name`, `last_name`, `email`, `gender`, `ip_address`, `birth_date`, `zip_code`, `avatar_url`, `state_code`, `country_code`) VALUES ('1003','farhan','rajae','rajae19beddi@gmail.com','','','','','','','')");

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
