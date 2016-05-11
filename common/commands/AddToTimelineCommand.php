<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\commands;

use yii\base\Object;
use common\models\TimelineEvent;
use trntv\bus\interfaces\SelfHandlingCommand;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AddToTimelineCommand extends Object implements SelfHandlingCommand
{
    /**
     * @var string
     */
    public $category;
    /**
     * @var string
     */
    public $event;
    /**
     * @var mixed
     */
    public $data;

    /**
     * @param AddToTimelineCommand $command
     * @return bool
     */
    public function handle($command)
    {
        $model = new TimelineEvent();
        $model->application = \Yii::$app->id;
        $model->category = $command->category;
        $model->event = $command->event;
        $model->data = json_encode($command->data, JSON_UNESCAPED_UNICODE);
        return $model->save(false);
    }
}
