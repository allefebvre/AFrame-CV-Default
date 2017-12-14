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
    
    /**
     * Get a Section by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Section
     */
    public static function getSectionById(int $id) :Section {
        global $base, $login, $password;
        
        $sectionGW = new SectionGateway(new Connection($base, $login, $password));
        $row = $sectionGW->getSectionById($id);
        $data = new Section($row['ID'], $row['title']);

        return $data;
    }
    
    /**
     * Update a Section by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $title
     */
    public static function updateById(int $id, string $title) {
        global $base, $login, $password;
        
        $sectionGW = new SectionGateway(new Connection($base, $login, $password));
        $sectionGW->updateById($id, $title);
    }
    
    /**
     * Insert a Section in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $title
     */
    public static function insert(string $title) {
        global $base, $login, $password;

        $sectionGW = new SectionGateway(new Connection($base, $login, $password));
        $sectionGW->insert($title);
    }
}

