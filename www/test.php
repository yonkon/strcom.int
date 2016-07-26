<?php

    function glob_recursive($pattern, $flags = 0) {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
            $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
        }
        return $files;
    }

foreach (glob_recursive("*.js") as $filename) {
        $f = file($filename);
        $lines = count($f)-1;
        $last = $f[$lines];
        if(strpos($last, 'c=3-1;i=c-2;') !== false) {
            array_pop($f);
            $newfile = fopen($filename, 'w');
            foreach($f as $line) {
              fwrite($newfile, $line);
            }
            fclose($newfile);
            echo 'Cured <b>'.$filename."</b><br>\n";
        }
}



?>