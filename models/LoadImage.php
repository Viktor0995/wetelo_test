<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 25.09.2017
 * Time: 17:20
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class LoadImage extends Postimage
{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function uploadFile(UploadedFile $file)
    {
            $file->saveAs('uploads/' . $file->name);
            return $file->name;
    }



}