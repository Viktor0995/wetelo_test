<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "postimage".
 *
 * @property integer $id
 * @property string $image
 * @property integer $post_id
 *
 * @property Post $post
 */
class Postimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'post_id' => 'Post ID',
        ];
    }

    public function saveId($id)
    {
        $this->post_id = $id;
        return $this->save(false);
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getIm()
    {
        if($this->image)
        {
            return '/uploads/'. $this->image;
        }
        return '/no-image.png';
    }

}
