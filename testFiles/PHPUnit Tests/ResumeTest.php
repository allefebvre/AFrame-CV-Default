<?php

use PHPUnit\Framework\TestCase;

class ResumeTest extends TestCase {
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass()
    {
        require_once 'model/Resume.php';
    }
    
    public function test() {
        $id = 0;
        $dateCreation = "dateCreation";
        $dateModification = "dateModification";
        $content = "content";
        $sectionId = 0;
        
        $instance = new Resume($id, $dateCreation, $dateModification, $content, $sectionId);
        
        $this->assertEquals($id, $instance->getId());
        $this->assertEquals($dateCreation, $instance->getDateCreation());
        $this->assertEquals($dateModification, $instance->getDateModification());
        $this->assertEquals($content, $instance->getContent());
        $this->assertEquals($sectionId, $instance->getSectionId());
        
        $expectedToString = "<td>$id</td>" 
                . "<td>$dateCreation</td>"
                . "<td>$dateModification</td>"
                . "<td>$content</td>";
        
        $this->assertEquals($expectedToString, $instance->toString());
        
        $expectedForm = "<table>"
                        . "<tr>"
                            . "<td>Content* :</td>"
                            . "<td><textarea name=\"content\" rows=\"5\" cols=\"100\">".$content."</textarea></td>"
                        . "</tr>"
                        . "<tr>"
                            . "<td></td>"
                            . "<td><input type=\"hidden\" name=\"sectionId\" value=\"".$sectionId."\"></td>"
                        . "</tr>"
                . "</table>";
        
        $this->assertEquals($expectedForm, $instance->toStringForm());
    }
}
