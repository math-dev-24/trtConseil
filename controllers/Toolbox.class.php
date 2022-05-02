<?php


class Toolbox {
    public const COULEUR_ROUGE = "alert_danger";
    public const COULEUR_ORANGE = "alert_warning";
    public const COULEUR_VERTE = "alert_success";

    public static function ajouterMessageAlerte($message,$type){
        $_SESSION['alert'][]=[
            "message" => $message,
            "type" => $type
        ];
    }
}