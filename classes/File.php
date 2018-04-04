<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 21-3-2018
 * Time: 11:19
 */

//NEEDS WORK!!!!!!
class File
{
    private $prop_fileName;

    function __construct($fileName)
    {
        $this->prop_fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getPropFileName()
    {
        return $this->prop_fileName;
    }

    /**
     * @param mixed $prop_fileName
     */
    public function setPropFileName($prop_fileName)
    {
        $this->prop_fileName = $prop_fileName;
    }

    public function uploadImage(){
        $targetDir = "uploads/img/";
        $targetFile = $targetDir . basename($_FILES[$this->getPropFileName()]['name']);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        if (file_exists($targetFile)) {
            return "new Exception()";
        } else {
            if ($imageFileType == "jpg" && $imageFileType == "png" && $imageFileType == "jpeg" && $imageFileType == "gif"){
                move_uploaded_file($_FILES['tmp_name'], $targetFile);
                return "success";
            } else {
                return "new Exception()";
            }
        }
    }

    public function uploadVideo(){
        $targetDir = "uploads/video/";
        $targetFile = $targetDir . basename($_FILES[$this->getPropFileName()]['name']);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        if (file_exists($targetFile)) {
            return "new Exception()";
        } else {
            if ($imageFileType == "mp4"){
                move_uploaded_file($_FILES['tmp_name'], $targetFile);
                return "success";
            } else {
                return "new Exception()";
            }
        }
    }
}