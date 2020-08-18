<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet">
    <title>les requettes sql</title>
  </head>
  <body>
    <script language="JavaScript">
    //largeur du texte défilant (en pixels)
    var marqueewidth=330;
    //hauteur du texte défilant (en pixels,Netscape)
    var marqueeheight=20;
    //vitesse de défilement du texte
    var speed=6;
    //contenu du texte défilant
    var marqueecontents='<font face=Arial> <strong><big> Bienvenue dans ma page des requettes SQL</big>  </strong></font>';

    document.write('<marquee scrollAmount='+speed+' style="width:'+marqueewidth+'">'+marqueecontents+'</marquee>');

    function regenerate(){
    window.location.reload();
    }
    function regenerate2(){
    if (document.layers){
    setTimeout("window.onresize=regenerate",450);
    intializemarquee();
    }
    }

    function intializemarquee(){
    document.cmarquee01.document.cmarquee02.document.write('<nobr>'+marqueecontents+'</nobr>');
    document.cmarquee01.document.cmarquee02.document.close();
    thelength=document.cmarquee01.document.cmarquee02.document.width;
    scrollit();
    }

    function scrollit(){
    if (document.cmarquee01.document.cmarquee02.left>=thelength*(-1)){
    document.cmarquee01.document.cmarquee02.left-=speed;
    setTimeout("scrollit()",100);
    }
    else{
    document.cmarquee01.document.cmarquee02.left=marqueewidth;
    scrollit();
    }
    }

    window.onload=regenerate2;
    </script>




<h1>1) Afficher tous les gens dont le nom est « Palmer »</h1>
<h3 class="couleur">"SELECT * FROM `datas` WHERE `last_name`='Palmer'"</h3>
    <?php
    include 'afficherpalmer.php';
    ?>


    <h1>2) Afficher toutes les femmes (et uniquement les femmes)</h1>
    <h3 class="couleur">" SELECT * FROM `datas` WHERE `gender`='Female'"</h3>
    <a href="female.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>

<h1>3) Afficher tous les états dont la lettre commence par N</h1>
<h3 class="couleur">" SELECT * FROM `datas` WHERE `country_code` LIKE 'N%'"</h3>
    <a href="commenceparn.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>4) Afficher tous les emails qui contiennent le mot « google »</h1>
<h3 class="couleur">" SELECT * FROM `datas` WHERE `email` LIKE '%google%'"</h3>
    <a href="emailgoogle.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>5) Insérer une nouvelle personne dans la liste</h1>
<h3 class="couleur">"INSERT INTO `datas`(`id`, `first_name`, `last_name`, `email`, `gender`, `ip_address`, `birth_date`, `zip_code`, `avatar_url`, `state_code`, `country_code`) VALUES ('1003','farhan','rajae','rajae19beddi@gmail.com','','','','','','','')"</h3>
    <a href="insert.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>6) Mettre à jour l'adresse email de la nouvelle personne</h1>
<h3 class="couleur">"UPDATE `datas` SET `email`='na@gmail.com' WHERE `id` ='1003'"</h3>
    <a href="update.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>7) Supprimer la nouvelle personne</h1>
<h3 class="couleur">"DELETE FROM `datas` WHERE `id`='1002' "</h3>
    <a href="delet.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>8) Afficher le nombre de femmes </h1>
<h3 class="couleur">"SELECT COUNT(*) FROM `datas` WHERE `gender`= 'female' "</h3>
    <a href="countfemale.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>8) Afficher le nombre de hommes </h1>
<h3 class="couleur">"SELECT COUNT(*) FROM `datas` WHERE `gender`= 'male'"</h3>
    <a href="countmal.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>9)  afficher l'age</h1>
<h3 class="couleur">"SELECT ( 2020 - (SUBSTR(`birth_date`,7))) AS agefinale
FROM datas  "</h3>
    <a href="age.php"><input type="button" value="afficher" class="bouton"></a>

<br><br>
<h1>9) la moyenne d’âge des femmes  </h1>
<h3 class="couleur">"SELECT (SELECT AVG(TRUNCATE(DATEDIFF(date(now()), CONVERT(CONCAT(RIGHT(birth_date,4),SUBSTRING(birth_date,4,2),LEFT(birth_date,2)), date))/365,0)) from datas where `gender`='male') as age_homme, (SELECT AVG(TRUNCATE(DATEDIFF(date(now()), CONVERT(CONCAT(RIGHT(birth_date,4),SUBSTRING(birth_date,4,2),LEFT(birth_date,2)), date))/365,0)) FROM datas WHERE `gender`='female') as age_femme "</h3>
    <a href="moyenneagefemalemale.php"><input type="button" value="afficher" class="bouton"></a>

      <br><br>
      <h1>9) changement du format de la date birth-date </h1>
      <h3 class="couleur">"UPDATE `datas` SET `birth_date`= CONVERT(CONCAT(RIGHT(birth_date,4),SUBSTRING(birth_date,4,2),LEFT(birth_date,2)), date) "</h3>
          <a href="changeformadate.php"><input type="button" value="afficher" class="bouton"></a>



<br><br>
<h1>10) Afficher la répartition par État et trier en fonction de la répartition par ordre croissant </h1>
<h3 class="couleur">"SELECT `country_code`, SUM(id) AS sum FROM `datas` GROUP BY `country_code` ORDER BY sum ASC"</h3>
<h3 class="couleur">"SELECT country_code, COUNT(*) FROM datas GROUP BY country_code ORDER BY COUNT(*)"</h3>
    <a href="question10.php"><input type="button" value="afficher" class="bouton"></a>
    <br>
    <div id="footer">
           <center><p>les requettes sql | Tout droits réservés | 2020 @Copyrite</p></center>
           </div>























  </body>
</html>
