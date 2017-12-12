<?php

class ModelRubrique {
    
    /**
     * Get a Rubrique by menu_id in Database 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $menu_id
     * @return Rubrique
     */
    public static function getRubriqueByMenuId(int $menu_id) :Rubrique {
        global $base, $login, $password;

        $rubriqueGW = new RubriqueGateway(new Connection($base, $login, $password));
        $row = $rubriqueGW->getRubriqueByMenuId($menu_id);
        
        $data = new Rubrique($row['ID'], $row['date_creation'], $row['date_modification'], $row['content_fr'], $row['content_en'], $row['menu_id']);
        
        return $data;
    }
}

