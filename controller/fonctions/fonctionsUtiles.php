<?php
    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function checkAndRenameIfExists($targetFilePath, $targetDir) {
        $dbImagePath = $targetFilePath;
        $fileName = basename($targetFilePath);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
        $i = 1;
        while (file_exists($dbImagePath)) {
            $newFileName = $fileBaseName . '_' . $i . '.' . $fileExtension;
            $dbImagePath = $targetDir . $newFileName;
            $i++;
        }
        return $dbImagePath;
    }

    function createTargetDirectory($targetDir) {
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
    }

    function getSiteLink(){
        $sitelink = 'http://127.0.0.1/sante-connect';
        return $sitelink;
    }