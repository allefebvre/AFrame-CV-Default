<!-- -->
<div id="targetDates" class="publication">
    <div>
        <h1>By Dates</h1>
        <div>
        <?php
        if(count($data['documentations']) === 0 && count($data['byDates']) === 0 && count($data['conferences']) === 0 && count($data['thesis']) === 0 && count($data['miscellaneous']) === 0  && count($data['journals']) === 0) {
            echo "<p>No rows in Database !</p>";
            echo "<p>Publications zone unused !</p>";
            echo "<p>You can disable this zone or add data in admin interface !</p>";
        }
        foreach ($data['byDates'] as $bD) {
            $reference = $bD->getReference();
            $authors = $bD->getAuthors();
            $title = $bD->getTitle();
            $date = $bD->getDate();
            $journal = $bD->getJournal();
            $volume = $bD->getVolume();
            $number = $bD->getNumber();
            $pages = $bD->getPages();
            $note = $bD->getNote();
            $abstract = $bD->getAbstract();
            $keywords =  $bD->getKeywords();
            $localite = $bD->getLocalite();
            $publisher = $bD->getPublisher();
            $editor = $bD->getEditor();		

            
            echo "<span class=\"publi-ref\">[$reference]</span>";
            
            echo "<span class=\"publi-authors\">$authors</span>, "; 
            
            echo "<span class=\"publi-title\">$title</span>, ";
            
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
