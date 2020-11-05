<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class Upload extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $image;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if($this->validate()) 
        {
            $this->image->saveAs($_SERVER['DOCUMENT_ROOT'].'/'.Yii::$app->params['upload_path'] . '/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } 
        return false;
    }
}

?>