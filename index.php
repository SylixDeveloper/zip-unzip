<?php


/**
 * @version 1.0.0
 * @source SylixDeveloper a simple class to zip your folder and unzip your zip files
 */
class SylixZip
{

    public function tozip($folder_name, $zip_name, $is_dir = true)
    {
        $zip = new ZipArchive;
        if ($is_dir == true) {
            $result = '';
            if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE) {
                $dir = opendir($folder_name);
                while ($file = readdir($dir)) {
                    if (is_file($folder_name .$file)) {
                        $zip->addFile($folder_name. $file, $file);
                    }
                }
                $result = 'Successfully.';
                $zip->close();
            } else {
                $result = 'Error :/';
            }
        }
        return $result;
    }
    public function unzip($zip_name, $folder_name = null, $password = null)
    {
        $zip = new ZipArchive;
        $result = '';
        if (is_null($password)) {
            if ($zip->open($zip_name) === TRUE) {
                if (!is_null($folder_name)) {
                    if (!is_dir($folder_name)) {
                        mkdir($folder_name);
                    }
                    $zip->extractTo($folder_name);
                    $result = 'Successfully.';
                    $zip->close();
                } else {
                    $zip->extractTo(__DIR__ . '/');
                    $result = 'Successfully.';
                    $zip->close();
                }
            } else {
                $result = 'Error :/';
            }
        } else {
            if ($zip->open($zip_name) === TRUE) {
                if ($zip->setPassword($password)) {
                    if (!is_null($folder_name)) {
                        if (!is_dir($folder_name)) {
                            mkdir($folder_name);
                        }
                        if (!$zip->extractTo($folder_name)) {
                            $result = 'Password Isnt Currect';
                        } else {
                            $result = 'Successfully.';
                        }
                        $zip->close();
                    } else {
                        if (!$zip->extractTo(__DIR__ . '/')) {
                            $result = 'Password Isnt Currect';
                        } else {
                            $result = 'Successfully.';
                        }
                        $zip->close();
                    }
                }
            }
        }
        return $result;
    }
}





/*
$class = new SylixZip();
Create a Zip With FolderName
$z  = $class->tozip('testfolder/','sylix.zip');

Unzip a Zip File
$uz = $class->unzip('sylix.zip','testfolder');

Unzip a Zipfile With Password
$uz = $class->unzip('sylix.zip','testfolder','testpassword');
*/
