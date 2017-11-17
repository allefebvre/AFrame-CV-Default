
<?php
class ModelConference {
    
    /**
     * Fill table with Conference object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllConferences() :array {

 	global $base, $login, $password;

        $conferenceGW = new ConferenceGateway(new Connection($base, $login, $password));
        $results = $conferenceGW->getAllConferences(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Conference ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
    }
}
?>  
