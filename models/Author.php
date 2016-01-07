<?php

namespace lo\modules\origami\models;

use Yii;
use lo\modules\geo\models\Country;

/**
 * This is the model class for table "origami__author".
 *
 * @property integer $id
 * @property string $slug
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Author extends \lo\core\db\ActiveRecord
{

    use \lo\core\rbac\ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@lo/modules/origami/modules/admin/views/author/tpl/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%origami__author}}';
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return AuthorMeta::className();
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'ctr_id']);
    }
}
