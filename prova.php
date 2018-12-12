<?php

$base = __DIR__;
require_once("$base/model/autor.class.php");
$autor = new Autor();
$res = $autor->filtra("nom_aut like '%ramon%'", "id_aut", "0", "10");
//$res = $autor->getAll();
//$res = $autor->get("6548");
if ($res->correcta) {
    foreach ($res->dades as $row) {
        echo $row['id_aut'] . "-" . $row['nom_aut'] . " " . $row["fk_nacionalitat"] . "<br>";
    }
} else {
    echo $res->missatge;
}

//$autor->insert(array("nom_aut"=>"Tomeu Campaner","fk_nacionalitat"=>"ESPANYOLA"));   //produira un error
//$autor->update(array("id_aut"=>"6549","nom_aut"=>"Tomeu","fk_nacionalitat"=>"ESPANYOLA"));   //produira un error
//$autor->delete("6549");
//$autor->filtra("nom_aut = 'Joan'", "id_aut", "1", "10");
if (!$res->correcta) {
    echo "Error tonto";  // Error per l'usuari
    error_log($res->missatge, 3, "$base/log/errors.log");  // Error per noltros
}   

