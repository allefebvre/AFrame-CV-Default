
<?php
class ModelConference {
    
    /**
     * Fil table with Conference object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Conference
     */
    public static function getAllConferences (){

 	global $base, $login, $password;

        $conferenceGW = new ConferenceGateway(new Connection($base, $login, $password));
        $results = $conferenceGW->getAllConferences(); 
        $data =  [];
        foreach ($results as $row){
            $data[]=new Conference ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
	}
}
?>  
