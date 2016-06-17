<?php

namespace lo\modules\origami\models;

use Yii;


/**
 * This is the model class for table "love__cat".
 *
 * @property integer $id
 * @property string $slug
 */
class Category extends \lo\core\db\TActiveRecord
{

    use \lo\core\rbac\ConstraintTrait;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $tplDir = '@lo/modules/origami/modules/admin/views/category/tpl/';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%origami__cat}}';
    }

    /**
     * @inheritdoc
     */
    public function metaClass()
    {
        return CategoryMeta::class;
    }

}
