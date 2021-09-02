<?php

$repre = RepreData::getById($_GET["id"]);

$repre->del();
Core::redir("./index.php?view=repres");


?>