<?php

session_start();
session_unset(); // générer un new numéro de session
session_destroy(); //détruit la session

header('location: accueil');
exit();
