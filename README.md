# Description
With AFrame framework, we create a curriculum vitae on different 3D panels, moreover we create a area dedicated to the publication of the person (conferences, journals and others publications).

The whole uses database to fill panels and publications. Of course you can visit this 3D CV with VR techonologies such as HTC Vive headset or cardboard. 

# Images
<img src=" AFrame-CV-Default/resources/images/AFrame-CV-Default-Screenshot1.png" heigth="190" width="32%">
<img src=" AFrame-CV-Default/resources/images/AFrame-CV-Default-Screenshot2.png" heigth="190" width="32%">
<img src=" AFrame-CV-Default/resources/images/AFrame-CV-Default-Screenshot3.png" heigth="190" width="32%">

# Using

## Database

### Create your database, 
import the file AFrame-CV-Default.sql on PhpMyAdmin.

### Access at your database
You will need to change in the config file in the project's config folder.:
1. The username.
2. The password.

## Test

## PHPUnit
This file is using for the tests
1. you can find the tests on the folder /testFiles/PHPUnit Tests.

To execute the tests on the server: 
1. Go on project root.
2. Execute this command : './resources/phpunit ./testFiles/PHPUnit Tests/'

## Selenium
1. You need Mozilla ESR 52.
2. Download [Selenium IDE](https://addons.mozilla.org/fr/firefox/addon/selenium-ide/) for Mozilla.
3. You can open one test and execute him on Selenium IDE.
