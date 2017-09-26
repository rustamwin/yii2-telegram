<?php
/**
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

use yii\helpers\Html;

echo Html::button('<i class="glyphicon glyphicon-send"></i> <span>' . Yii::t('tlgrm', 'Online support') . '<span>', ['class' => 'btn btn-primary', 'id' => 'tlgrm-init-btn']);