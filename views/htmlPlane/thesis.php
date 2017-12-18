<div id="targetThesis" class="publication">
    <div>
        <h1>Thesis</h1>
        <div>
        <?php
        if(count($data['documentations']) === 0 && count($data['byDates']) === 0 && count($data['conferences']) === 0 && count($data['thesis']) === 0 && count($data['miscellaneous']) === 0 && count($data['journals']) === 0) {
            echo "<p>No rows in Database !</p>";
            echo "<p>Publications zone unused !</p>";
            echo "<p>You can disable this zone or add data in admin interface !</p>";
        }
        foreach ($data['thesis'] as $t) {
            $reference = $t->getReference();
            $authors = $t->getAuthors();
            $title = $t->getTitle();
            $date = $t->getDate();
            $journal = $t->getJournal();
            $volume = $t->getVolume();
            $number = $t->getNumber();
            $pages = $t->getPages();
            $note = $t->getNote();
            $abstract = $t->getAbstract();
            $keywords =  $t->getKeywords();
            $localite = $t->getLocalite();
            $publisher = $t->getPublisher();
            $editor = $t->getEditor();		

            
            echo "<span class=\"publi-ref\">[$reference]</span>";
            
            echo "<span class=\"publi-auteur\">$authors</span>, "; 
            
            echo "<span class=\"publi-titre\">$title</span>, ";
            
            if ($journal != ""){
                echo "<span class=\"publi-journal\">$journal</span>, ";
            }            
            if($editor != ""){
                echo"<span class=\"publi-editor\">$editor</span>, ";
            }                       
            if ($volume != ""){
                echo "<span class=\"publi-volume\">$volume</span>, ";
            }
            if($number != ""){
                echo "<span class=\"publi-number\">$number</span>, ";
            }
            if($pages != ""){
                echo "<span class=\"publi-pages\">$pages</span>, ";
            }
            
            if($publisher != ""){
                echo"<span class=\"publi-publisher\">$publisher</span>, ";
            }
            
            if($date != ""){
                echo "<span class=\"publi-date\">$date</span><br>";
            }
            if($note != ""){
                echo "<span class=\"publi-note\">$note</span><br>";
            }
            if($abstract != ""){
               echo "<span class=\"publi-abstract\">$abstract</span><br>"; 
            }            
            if($keywords != ""){
                echo"<span class=\"publi-keywords\">Keywords : $keywords</span><br> ";
            }
            if($localite != ""){
                echo"<span class=\"publi-localite\">$localite</span><br> ";
            }
            echo "<br>";
        }
        ?>
        </div>
    </div>
</div>
