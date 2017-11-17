<div id="targetConferences" class="publication">
    <div>
        <h1>Conferences</h1>
        <div>
        <?php
        foreach ($data['conferences'] as $c) {
            $reference = $c->getReference();
            $authors = $c->getAuthors();
            $title = $c->getTitle();
            $date = $c->getDate();
            $journal = $c->getJournal();
            $volume = $c->getVolume();
            $number = $c->getNumber();
            $pages = $c->getPages();
            $note = $c->getNote();
            $abstract = $c->getAbstract();
            $keywords =  $c->getKeywords();
            $localite = $c->getLocalite();
            $publisher = $c->getPublisher();
            $editor = $c->getEditor();		

            
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
                echo "<span class=\"publi-date\">$date</span></br>";
            }
            if($note != ""){
                echo "<span class=\"publi-note\">$note</span></br>";
            }
            if($abstract != ""){
               echo "<span class=\"publi-abstract\">$abstract</span></br>"; 
            }            
            if($keywords != ""){
                echo"<span class=\"publi-keywords\">Keywords : $keywords</span></br> ";
            }
            if($localite != ""){
                echo"<span class=\"publi-localite\">$localite</span></br> ";
            }
            echo "</br>";
        }
        ?>
        </div>
    </div>
</div>
