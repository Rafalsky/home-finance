<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=> [
        ['pattern' => 'cache/<path:(.*)>', 'route' => 'glide/index', 'encodeParams' => false]
    ]
];
