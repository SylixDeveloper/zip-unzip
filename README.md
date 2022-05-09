# zip-unzip
A simple class in php language to compress your folders and decompress them with or without password
By SylixDeveloper


T.me/SylixDeveloper
T.me/Sylix_Team


$class = new SylixZip();
Create a Zip With FolderName
$z  = $class->tozip('testfolder/','sylix.zip');

Unzip a Zip File
$uz = $class->unzip('sylix.zip','testfolder');

Unzip a Zipfile With Password
$uz = $class->unzip('sylix.zip','testfolder','testpassword');

