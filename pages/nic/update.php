<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$zip_url = "https://github.com/Nertoxic/v2/archive/refs/tags/" . $nicNextVersion . ".zip";

$zip_file = BASE_PATH . basename($zip_url);
$extracted_dir = BASE_PATH . "v2-" . $nicNextVersionFile;

$zip_content = @file_get_contents($zip_url);

if ($zip_content === false) {
    $response = "Our Devs are slow again, there is currently no new update for you 🫤";
    self::debugMessage("pages/nic/update.php", "The newest Version is not published yet", false);
    include_once BASE_PATH . "pages/nic/templates/updater.php"; # Load the HTML of the Updater file
    exit;
}

file_put_contents($zip_file, file_get_contents($zip_url));

if (file_exists($zip_file)) {
    $zip = new ZipArchive;
    if ($zip->open($zip_file) === TRUE) {
        $zip->extractTo(BASE_PATH);
        $zip->close();

        recursiveCopy($extracted_dir, BASE_PATH);

        unlink($zip_file);
        recursiveRemoveDirectory($extracted_dir);
        $response = "The Update has been installed successfully and an alien has resetted the nertoxic code 🛸";
    } else {
        $response = "There was an error while installing the newest update!";
        self::debugMessage("pages/nic/update.php", "Error while unzipping the update", false);
    }
} else {
    $response = "There was an error while downloading the newest update!";
    self::debugMessage("pages/nic/update.php", "Error while downloading the update", false);
}

function recursiveCopy($source, $destination) {
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    $dir = opendir($source);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            $source_file = $source . '/' . $file;
            $destination_file = $destination . '/' . $file;
            if (is_dir($source_file)) {
                recursiveCopy($source_file, $destination_file);
            } else {
                copy($source_file, $destination_file);
            }
        }
    }
    closedir($dir);
}

function recursiveRemoveDirectory($directory) {
    foreach(glob("{$directory}/*") as $file) {
        if(is_dir($file)) {
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}

include_once BASE_PATH . "pages/nic/templates/updater.php"; # Load the HTML of the Updater file
?>
