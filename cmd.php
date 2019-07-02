
<?php

/* $pdo = new PDO('mysql:host=localhost;dbname=BeCode','root', 'qwerty'); */


$pdo = new PDO(
    'mysql:host=localhost;dbname=BeCode',
    'root',
    'qwerty',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

 
//Get all info from database
$q = $pdo->query('select * from students');

//Get Firstname of database
$q = $pdo->query('select prenom from students');

//Get Firstname of database
$q = $pdo->query('select students.prenom,students.datenaissance,school.school from students
JOIN school
ON students.school = school.idschool');

//Get only females
$q = $pdo -> query('select genre,prenom,nom,datenaissance from students where genre like "f"');

//Get only students from any school
$q = $pdo -> query('select nom from students order by nom desc limit 2;');

$q = $pdo -> query('insert into students(nom,prenom,genre,datenaissance,school)values("Ginette","Dalor","f","01-01-1930",1)');

$q = $pdo -> query('update students SET nom = "Omer", genre = "m" WHERE idStudent = 32');

$q = $pdo -> query('DELETE from students WHERE idStudent = 3');

//change int to varchar and afterwards change values with 1 and 2.
$q = $pdo -> query('ALTER TABLE students MODIFY school varchar(11);');

$q = $pdo -> query('UPDATE students SET school = "Central" WHERE school = "1"');

$q = $pdo -> query('UPDATE students SET school = "Anderlecht" WHERE school = "2"');

$sqlExec = $pdo->prepare($sql);
$sqlExec -> execute();

$r = $q->fetchAll(PDO::FETCH_ASSOC);

echo "<pre><h3>".print_r($r,true)."</h3></pre>"; 

?>
