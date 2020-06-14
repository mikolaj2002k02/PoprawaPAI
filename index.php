<html>
 <head>
  <meta charset="utf-8">
  <title>Zadanie</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
 </head>
 <body>
  <div ng-app="myApp" ng-controller="customersCtrl">
 </div>
 <h1>Poprawa PAI</h1><br/><br/>
  <table border="1">
   <tr>
       <th>pesel</th><th>imie</th><th>nazwisko</th><th>adres</th>
   </tr>
<?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM poprawapai ORDER BY pesel"))
{
        $sql->execute();
        $sql->bind_result($pesel, $imie, $nazwisko, $adres);
        while ($sql->fetch())
        {
                echo "<tr>
                        <td>$pesel</td>
                        <td>$imie</td>
                        <td>$nazwisko</td>
                        <td>$adres</td>
                        <td><a href=\"edycja.php?nr=$pesel\">Edytuj</a></td>
                        <td><a href=\"usun.php?pesel=$pesel\" onclick=\"javascript:return confirm('Czy na pewno usunąć?'); \">Usuń</a></td>
                   </tr>";
            
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );

 $baza->close();
?>
  </table>
  <a href="dodaj.php">Dodawaj</a>
 </body>
</html>
