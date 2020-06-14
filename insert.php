<?php
include "polacz.php";
$pesel = wczytaj("pesel");
$imie = wczytaj("imie");
$nazwisko = wczytaj("nazwisko");
$adres = wczytaj("adres");


$sql = $baza->prepare("INSERT INTO poprawapai VALUES (?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("ssss", $pesel, $imie, $nazwisko, $adres);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header ("Location:http://localhost/poprawapai/");
?>