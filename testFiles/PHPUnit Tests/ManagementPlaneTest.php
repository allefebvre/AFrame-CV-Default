<?php

use PHPUnit\Framework\TestCase;

class ManagementPlaneTest extends TestCase {

    private static $managementPlane;
    const pathHTML = "testFiles/PHPUnit Tests/fichier.txt";
    const targetId = "ID_TEST";
    const posX = 54;
    const posY = 5;
    const posZ = 14.2;
    const rotation = -18;
    const action = "";

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/ManagementPlane.php';
        self::$managementPlane = new ManagementPlane();
    }

    public function testPlaceHTMLScroll() {
        self::$managementPlane->addPlane(self::pathHTML, self::targetId, self::posX, self::posY, self::posZ, self::rotation, TRUE, "");

        $expect = "<div class=\"hide\">test</div>";

        $this->expectOutputString($expect);

        self::$managementPlane->placeHTML("aa");
    }

    /**
     * @depends testPlaceHTMLScroll
     */
    public function testPlaceEntityScroll() {

        $expect = "
            <a-entity".self::action." position=\"" . self::posX . " " . self::posY . " " . self::posZ . "\" rotation=\"0 " . self::rotation . " 0\">
                                    <a-plane  scroll=\"" . self::targetId . "\" id=\"display" . self::targetId . "\" scale=\"6 3.375 1\" 
                        material=\"shader: html; target: #" . self::targetId . "; width: 800; height: 450; fps:3\" color=\"#fff\">
                    </a-plane>

                    <a-entity button-up=\"display" . self::targetId . "\" position=\"3.6 0.2 0.05\" rotation=\"0 0 0\" scale=\"0.5 0.5 0.5\">
                        <a-entity>
                            <a-triangle material=\"color:#b9a8a8\" scale=\"0.5 0.5 0.5\"></a-triangle>
                            <a-plane color=\"#b9a8a8\" position=\"0.001 -0.25 -0.15\" rotation=\"90 0 0\" scale=\"0.5 0.3 0.5\"></a-plane>
                            <a-plane color=\"#b9a8a8\" position=\"-0.125 0 -0.15\" rotation=\"-26.5 -90 -90\" scale=\"0.558 0.3 0.5\"></a-plane>
                            <a-plane color=\"#b9a8a8\" position=\"0.125 0 -0.15\" rotation=\"-26.5 90 -90\" scale=\"0.558 0.3 0.5\"></a-plane>
                        </a-entity>
                    </a-entity>

                    <a-entity button-down=\"display" . self::targetId . "\" position=\"3.6 -0.2 0.05\" rotation=\"0 0 180\" scale=\"0.5 0.5 0.5\">
                        <a-entity>
                            <a-triangle material=\"color:#b9a8a8\" scale=\"0.5 0.5 0.5\"></a-triangle>
                            <a-plane color=\"#b9a8a8\" position=\"0.001 -0.25 -0.15\" rotation=\"90 0 0\" scale=\"0.5 0.3 0.5\"></a-plane>
                            <a-plane color=\"#b9a8a8\" position=\"-0.125 0 -0.15\" rotation=\"-26.5 -90 -90\" scale=\"0.558 0.3 0.5\"></a-plane>
                            <a-plane color=\"#b9a8a8\" position=\"0.125 0 -0.15\" rotation=\"-26.5 90 -90\" scale=\"0.558 0.3 0.5\"></a-plane>
                        </a-entity>
                    </a-entity>

                            </a-entity>
            ";

        $this->expectOutputString($expect);

        self::$managementPlane->placeEntity();
    }

}
