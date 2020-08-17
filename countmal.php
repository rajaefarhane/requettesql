<?php
include 'connection.php';
?>
<?php


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
   $stmt = $conn->prepare("SELECT COUNT(*) FROM `datas` WHERE `gender`= 'male'");


   $stmt->execute();

   // set the resulting array to associative
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
     echo "le nombre des hommes est:".$v;
   }
 } catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
 }
 $conn = null;
 echo "</table>";
 ?>
