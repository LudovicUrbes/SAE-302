<div id="blur">
    <?php   
        $table = '<table align="center" cellspacing="10" width="1080"><tr>'."\n";  
        $liste = array(); 
        $dir="../data/img/";
        if ($dossier = opendir($dir)) {  
            while (($item = readdir($dossier)) !== false) {  
                if ($item[0] == '.') { continue; }  
                if (!in_array(end(explode('.', $item)), array('jpg','jpeg','png','gif'))) { continue; }  
                $liste[] = $item;  
            }  
            closedir($dossier);  
            rsort($liste); 
            foreach ($liste as $val) { 
                $table .= '<td><img src="'.$dir.'/'.$val.'" alt="" max-width=80% max-height=auto/><input type="radio" name="vote" > </td>'."\n"; 
            } 
        }  
        $table .= '</tr></table>';  
        echo $table;  
    ?>

      <button type="submit" name="photo" class="btn">Validé votre vote</button>

</div>