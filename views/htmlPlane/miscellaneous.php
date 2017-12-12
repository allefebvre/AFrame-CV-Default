<div id="targetMiscellaneous" class="publication">
    <div>
        <h1>miscellaneous</h1><div>
        <?php
        foreach ($data['miscellaneous'] as $o) {
            $reference = $o->getReference();
            $authors = $o->getAuthors();
            $title = $o->getTitle();
            $date = $o->getDate();
            $journal = $o->getJournal();
            $volume = $o->getVolume();
            $number = $o->getNumber();
            $pages = $o->getPages();
            $note = $o->getNote();
            $abstract = $o->getAbstract();
            $keywords =  $o->getKeywords();
            $localite = $o->getLocalite();
            $publisher = $o->getPublisher();
            $editor = $o->getEditor();		

            
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
