
<?php
  try
  { // Still currently testing <---------------------
    //open the database
    $db = new PDO('sqlite:doctorsDb_PDO.sqlite');

    //create the database
    $db->exec("CREATE TABLE doctors (Id INTEGER PRIMARY KEY, fname TEXT, lname TEXT)");    

    //insert some data...
    $db->exec("INSERT INTO doctors (fname, lname) VALUES ('Dr. Bywater', 'Podiatrist');".
               "INSERT INTO doctors (fname, lname) VALUES ('Dr. Bhambhani', 'Sports Medicine'); " .
               "INSERT INTO doctors (fname, lname) VALUES ('Dr. Burkett', 'Optometry'); " .
               "INSERT INTO doctors (fname, lname) VALUES ('Dr. Maddox', 'Pharmacy'); " .
               "INSERT INTO doctors (fname, lname) VALUES ('Dr. Van', 'Pediatric');");

    //now output the data to a simple html table...
    print "<table border=1>";
    print "<tr><td>Id</td><td>Name</td><td>Specialty</td></tr>";
    $result = $db->query('SELECT * FROM doctors');
    foreach($result as $row)
    {
      print "<tr><td>".$row['Id']."</td>";
      print "<td>".$row['fname']."</td>";
      print "<td>".$row['lname']."</td></tr>";
    }
    print "</table>";

    // close the database connection
    $db = NULL;
  }
  catch(PDOException $e)
  {
    print 'Exception : '.$e->getMessage();
  }
?>