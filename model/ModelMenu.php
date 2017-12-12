<?php

class ModelMenu {
    
    /**
     * Get all Menus in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllActiveMenus() :array {
        global $base, $login, $password;

        $menuGW = new MenuGateway(new Connection($base, $login, $password));
        $results = $menuGW->getAllActiveMenus();
        $data = array();
        foreach ($results as $row) {
            $data[] = new Menu($row['ID'], $row['titre_fr'], $row['titre_en'], $row['actif'], $row['position']);
        }
        
        return $data;
    }
}

