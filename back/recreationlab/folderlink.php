<?php

$DATA_ORDER = array(
			 "1-enseignants" => "Formation des enseignants",
			"2-en classe" => "Souvenirs des classes",
			"3 - séance 1" => "Atelier de prototypage",
			"4 - séance 2" => "Jeux d’écriture",
			"4 - seance31GDG" => "Pierre Gilles de Gennes en AIXploration",
			"4 - seance32corot" => "Les abeilles connectées de Saint Just Corot",
			"4 - seance33rouviere" => "L’ornithoptère de La Rouvière",
			"4 - seance33pepper" => "Rencontre avec Pepper",
			"4 - seance34PDLC" => "Silence, ça tourne à Plan de La Cour !",
			"4 - seance35kalliste" => "Parc Kalliste 2 en immersion sonore et visuelle",
			"4 - seance36roucas" => "Les petits mares du Roucas Blanc",
			"4 - seance37rouet" => "La smart city du Rouet",
			'4 - seance38repas' => "A table !",
			"4 - seance39vignettes" => "AIXploration du smart grid avec les Vignettes",
			"4 - seance391 vaillant" => "Chimères et autres fabuleriez d’Edouard Vaillant",
			"4-seance38aubrac" => "Chimères et autres fabuleriez d’Edouard Vaillant",
			"5-seance4" => "La cuisine de l’écrivain",
			"6-territoires" => "Territoires en 2048",
			"7-seance5" => "Écriture en accordéon",
			"8-seance6" => "Ambiance mini-hive",
			);


    if(isset($_GET["arbrevirtuel"])){ 
        $DATA_ORDER = array(
			"Le Rouet-Marseille" => "Le Rouet - Marseille",
			"Les Vignettes-Vitrolles" => "Les Vignettes - Vitrolles",
			"Lucie Aubrac-Gardanne" => "Lucie Aubrac - Gardanne",
			"Parc Kalliste 2-Marseille" => "Parc Kalliste 2 - Marseille",
			"Pierre Gilles de Gennes-Aix-en-Provence" => "Pierre Gilles de Gennes - Aix-en-Provence",
			"Plan de la Cour-Vitrolles" => "Plan de la Cour - Vitrolles",
			"Roucas Blanc-Marseille" => "Roucas Blanc - Marseille",
			"St Just Corot-Marseille" => "St Just Corot - Marseille",
			);
    }