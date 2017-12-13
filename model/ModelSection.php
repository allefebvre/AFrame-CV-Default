<?php

class ModelSection {
    
    /**
     * Get all Sections in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllSections() :array {
        global $base, $login, $password;
        
        $sectionGW = new SectionGateway(new Connection($base, $login, $password));
        $results = $sectionGW->getAllSections();
        $data = array();
        foreach($results as $row) {
            $data[] = new Section($row['ID'], $row['title']);
        }
        
        return $data;
    }
    
    /**
     * Get a Section by title in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $title
     * @return Section
     */
    public static function getSectionByTitle(string $title) :Section {
        global $base, $login, $password;
        
        $sectionGW = new SectionGateway(new Connection($base, $login, $password));
        $row = $sectionGW->getSectionByTitle($title);
        $data = new Section($row['ID'], $row['title']);

        return $data;
    }
}

