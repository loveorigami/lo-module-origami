<?php
namespace lo\modules\origami\models;

use Yii;
use lo\core\db\MetaFields;
use lo\modules\geo\models\Country;


/**
 * Class AuthorMeta
 * Мета описание модели
 * @package lo\modules\origami\models
 */
class AuthorMeta extends MetaFields
{

    /**
     * @inheritdoc
     */
    const SEO_TAB = "seo";

    /**
     * @inheritdoc
     */

    public function tabs()
    {
        $tabs = parent::tabs();
        $tabs[self::SEO_TAB] = Yii::t('backend', "SEO");
        return $tabs;
    }

    /**
     * @inheritdoc
     */
    protected function config()
    {
        return [

            "img" => [
                "definition" => [
                    "class" => \lo\core\db\fields\ElfImgField::className(),
                    "initValue"=>"/origami/author/none.jpg",
                    "inputClassOptions" => [
                        "widgetOptions"=>[
                            'path'=>'origami/author'
                        ],
                    ],
                    "title" => Yii::t('backend', 'Image'),
                ],
                "params" => [$this->owner, "img"]
            ],
            "name" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::className(),
                    "title" => Yii::t('backend', 'Name'),
                    "showInGrid" => true,
                    "showInFilter" => true,
                    "isRequired" => true,
                    "editInGrid" => true,
                ],
                "params" => [$this->owner, "name"]
            ],
            "name_ru" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::className(),
                    "title" => Yii::t('backend', 'NameRu'),
                    "showInGrid" => false,
                    "showInFilter" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "name_ru"]
            ],

            "link" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::className(),
                    "title" => Yii::t('backend', 'Link'),
                    "showInGrid" => false,
                    "showInFilter" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "link"]
            ],
            "slug" => [
                "definition" => [
                    "class" => \lo\core\db\fields\SlugField::className(),
                    "title" => Yii::t('backend', 'Slug'),
                    "showInGrid" => true,
                    "generateFrom" => "name",
                ],
                "params" => [$this->owner, "slug"]
            ],

            "in_ori" => [
                "definition" => [
                    "class" => \lo\core\db\fields\CheckBoxField::className(),
                    "title" => Yii::t('backend', 'InOri'),
                    "showInGrid" => false,
                    "showInFilter" => true,
                ],
                "params" => [$this->owner, "in_ori"]
            ],
            "in_wiki" => [
                "definition" => [
                    "class" => \lo\core\db\fields\CheckBoxField::className(),
                    "title" => Yii::t('backend', 'InWiki'),
                    "showInGrid" => false,
                    "showInFilter" => true,
                ],
                "params" => [$this->owner, "in_wiki"]
            ],
            "in_news" => [
                "definition" => [
                    "class" => \lo\core\db\fields\CheckBoxField::className(),
                    "title" => Yii::t('backend', 'InNews'),
                    "showInGrid" => false,
                    "showInFilter" => true,
                ],
                "params" => [$this->owner, "in_news"]
            ],

            "ctr_id" => [
                "definition" => [
                    "class" => \lo\core\db\fields\AjaxOneField::className(),
                    "initValue"=>Country::DEF_COUNTRY,
                    "inputClassOptions" => [
                        'loadUrl' => ['/geo/country/list'],
                    ],
                    'gridOptions'=>[
                        'loadUrl' => ['/geo/country/list'],
                    ],
                    "title" => Yii::t('backend', 'Country'),
                    "showInGrid" => true,
                    "showInExtendedFilter" => false,
                    "isRequired" => false,
                    //"data" => [$this, "getAuts"], // массив всех авторов (см. выше)
                ],
                "params" => [$this->owner, "ctr_id", "country"]
            ],

            "text" => [
                "definition" => [
                    "class" => \lo\core\db\fields\HtmlField::className(),
                    "inputClass" =>[
                        'class'=>'lo\core\inputs\HtmlInput',
                        "fileManagerController"=>['elfinder', 'path' => 'origami/author'],
                    ],
                    "title" => Yii::t('backend', 'Text'),
                    "showInGrid" => false,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "text"]
            ],

            "total_hits" => [
                "definition" => [
                    "class" => \lo\core\db\fields\NumberField::className(),
                    "title" => Yii::t('backend', 'Total hits'),
                    "showInGrid" => true,
                    "isRequired" => false,
                ],
                "params" => [$this->owner, "total_hits"]
            ],

            "title" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::className(),
                    "title" => Yii::t('backend', 'title'),
                    "showInGrid" => false,
                    "isRequired" => false,
                    "tab" => self::SEO_TAB,
                ],
                "params" => [$this->owner, "title"]
            ],
            "description" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextAreaField::className(),
                    "title" => Yii::t('backend', 'description'),
                    "showInGrid" => false,
                    "isRequired" => false,
                    "tab" => self::SEO_TAB,
                ],
                "params" => [$this->owner, "description"]
            ],
            "keywords" => [
                "definition" => [
                    "class" => \lo\core\db\fields\TextField::className(),
                    "title" => Yii::t('backend', 'keywords'),
                    "showInGrid" => false,
                    "isRequired" => false,
                    "tab" => self::SEO_TAB,
                ],
                "params" => [$this->owner, "keywords"]
            ],
        ];
    }
}