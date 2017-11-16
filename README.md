# Description
This app, based on the framework AFrame](https://aframe.io/) draws in VR a Curriculum Vitae within a loft on different 3D panels. In addition, an area is dedicated to researchers, allowing to the shwo information about publications (conferences, journals and other things).
AFrame allows to visit this 3D CV with many VR techonologies, such as HTC Vive headset, Windows VR, Cardboard, etc. 
The panels are filled with texts stored in a Mysql database. 

# Images
<div>
<img src="resources/images/AFrame-CV-Default-Screenshot1.png" heigth="190" width="32%">
<img src="resources/images/AFrame-CV-Default-Screenshot2.png" heigth="190" width="32%">
<img src="resources/images/AFrame-CV-Default-Screenshot3.png" heigth="190" width="32%">
</div>

# Requirement
A web server and a Mysql server

# Installation
You need to change the crederntials stored in the config file (config folder).
Import the file AFrame-CV-Default.sql, for example with PhpMyAdmin.
Copy the content of this project on the Wrb server
That's it, call the Web app :-)

# Test

## PHPUnit
You can find the test cases on the folder /testFiles/PHPUnit Tests.

To execute them on the server: 
1. Go on project root.
2. Execute  `./resources/phpunit ./testFiles/PHPUnit Tests/`

## Selenium IDE
1. You need Mozilla ESR 52 (noc 2017)
2. Open every test case and execute it with Selenium IDE.

# Authors
Alexandre Lefebvre - Sylvain Escassut - Nils Fradin
