<?php

$root = __DIR__;
$ds = DIRECTORY_SEPARATOR;
$backgroundFolder = $root.$ds.'dynamic'.$ds;
$subfolders = scandir($backgroundFolder);

$out = [];

foreach ($subfolders as $key => $subfolder) {

    if (strpos($subfolder, '.') === 0 || is_dir($backgroundFolder.$subfolder) === false) {
        continue;
    }

    $tmp = [];
    $directory = new RecursiveDirectoryIterator($backgroundFolder.$subfolder);
    $directory->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($directory);
    foreach ($files as $file) {
        $filepath = realpath($file);

        if (strpos($filepath, '.svg') === false) {
            continue;
        }

        $tmp[] = '.'.str_replace($root, '', realpath($file));
    }

    $out[$subfolder] = $tmp;

}

$backgrounds = json_encode($out, JSON_PRETTY_PRINT);

echo "<div id='background-container' data-backgrounds='".$backgrounds."'></div>";
