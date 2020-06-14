<?php
include "polacz.php";
$pesel = wczytaj("pesel");
if ( $sql = $baza->prepare( "SELECT * FROM poprawapai WHERE pesel = ?;"))
{
  $sql->bind_param("ssss" ,$nr);
  $sql->execute();
  $sql->bind_result($pesel, $imie, $nazwisko, $adres);
  if (!$sql->fetch())  die("Blad!!! Brak rekordu do edycji w bazie!!! Liczba rekodow:".$sql->num_rows);


 /////////////////////// HTML w PHP
 echo '
 <html>
  <head>
   <meta charset="utf-8">
   <title>Edycja obiektu</title>
  </head>
  <body>
   <h1>Edycja rekordu z bazy</h1>
   <form method="get" action="update.php">
    <table border="0">
      <tr><td>pesel</td><td><input name="pesel" value="'.$pesel.'" disabled>
              <input type="hidden" name="pesel" value="'.$pesel.'">  </td></tr>
      <tr><td>imie</td><td><input name="imie" value="'.imie.'" maxlen="20" size="20"></td></tr>
      <tr><td>imie</td><td><input name="imie" value="'.$imie.'" maxlen="20" size="20"></td></tr>
      <tr><td>nazwisko</td><td><input name="nazwisko" value="'.$nazwisko.'"></td></tr>
      <tr><td>adres</td><td><input name="adres" value="'.$adres.'"></td></tr>
      <tr><td colspan="2"><input type="submit" value="zapisz zmiany"></td></tr>
    </table>
   </form>
  </body>
 </html>
 ';
 $sql->close();
 }
$baza->close();
?>