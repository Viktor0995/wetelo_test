<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 19.09.2017
 * Time: 21:57
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $image;


    public function rules()
    {
        return [

            [['image'], 'file', 'extensions' => 'png, jpg',
                'skipOnEmpty' => false]];
    }


    public function uploadFile($file, $currentImage)
    {


        $file -> saveAs('../web/uploads/'. $file->name);
        return $file->name;
    }

    public function fileDel($currentImage)
    {
        if($this->fileExists($currentImage))
        {
            unlink('../web/uploads/'. $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
        {
            return file_exists('../web/uploads/'. $currentImage);
        }
    }
}