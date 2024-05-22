<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$apiUrl = "https://api.github.com/repos/nertoxic/v2/releases/latest";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'PHP');
$response = curl_exec($ch);
curl_close($ch);

$release = json_decode($response, true);
$downloadUrl = $release['zipball_url'];

$filename = "update-".rand(1000,9999).".zip";
file_put_contents(BASE_PATH.$filename, fopen($downloadUrl, 'r'));

$zip = new ZipArchive;
if ($zip->open(BASE_PATH.$filename) === TRUE) {
$zip->extractTo(BASE_PATH);
$zip->close();
} else {
echo 'Failed to open update file';
}

// Optional: Die heruntergeladene Zip-Datei löschen
unlink(BASE_PATH.$filename);