<div id="targetInformation" class="section">
    <div>
        <?php
            $myInfo = $data['myInformation'][0];
            $status = $myInfo->getStatus();
            echo "<h3 style=\"text-align: center\">$status</h3>";
            echo "<div id=\"leftInfo\">";
            $name = $myInfo->getName();
            $firstName = $myInfo->getFirstName();
            echo "<p><b>$firstName <span style=\"text-transform: uppercase\">$name</span></b></p>";
            if($myInfo->getAge() !== null) {
                $age = $myInfo->getAge();
                echo "<p>$age</p>";
            }
             if($myInfo->getAddress() !== null) {
                $address = $myInfo->getAddress();
                echo "<p>$address</p>";
            }
             if($myInfo->getPhone() !== null) {
                $phone = $myInfo->getPhone();
                echo "<p>$phone</p>";
            }
             if($myInfo->getMail() !== null) {
                $mail = $myInfo->getMail();
                echo "<p>$mail</p>";
            }                 
            echo "</div>";
            if($myInfo->getPhoto() !== null) {
                $profilPhoto = $myInfo->getPhoto();
                echo "<div id=\"rightInfo\">
                        <img id=\"profilPhoto\" src=\"$profilPhoto\" alt=\"profil\">
                      </div>";
            }
        ?>
    </div>
</div>
