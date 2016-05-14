<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\widgets;

use common\models\WidgetText;
use yii\base\Widget;

/**
 * Class DbText
 * Return a text block content stored in db
 * @package common\widgets\text
 */
class DbText extends Widget
{
    /**
     * @var string text block key
     */
    public $key;

    /**
     * @return string
     */
    public function run()
    {
        $cacheKey = [
            WidgetText::className(),
            $this->key
        ];
        $content = \Yii::$app->cache->get($cacheKey);
        if (!$content) {
            $model =  WidgetText::findOne(['key' => $this->key, 'status' => WidgetText::STATUS_ACTIVE]);
            if ($model) {
                $content = $model->body;
                \Yii::$app->cache->set($cacheKey, $content, 60*60*24);
            }
        }
        return $content;
    }
}
