<?php


   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'jsondb';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   //echo 'Connected successfully</br>';
  /* $sql = "SELECT
  i.ticketID,
  i.Name,
  i.mobileNo as client,
  (
    select min(o.contactType)
    from contact1 o
    where o.ticketID = i.ticketID
    
  ) as contact1
from client i
   ";
*/
  $sql= "SELECT client.ticketID, client.Name, contact1.id
FROM client 
INNER JOIN contact1
ON client.ticketID = contact1.ticketID";

   if($result = mysqli_query($conn, $sql)) {
      if(mysqli_num_rows($result) > 0) {
         echo "<table>";
         echo "<tr>";
         echo "<th>ticketID</th>";
         echo "<th>name</th>";
         echo "<th>ContactID</th>";
         echo "</tr>";
         
         while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['ticketID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";

				echo "<td>" . $row['id'] . "</td>";
            echo "</tr>";
         }
         echo "</table>";
         mysqli_free_result($result);
      } else {
         echo "No records matching your query were found.";
      }
   } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   }
   mysqli_close($conn);
?>