<?php
/**
  * @copyright Copyright &copy; Rustam Mamadaminov (RustamWin)
  * @package   telegram
  * Date: 09.06.2017
  */

use yii\helpers\Html;

echo Html::button('<i class="glyphicon glyphicon-send"></i> <span>' . Yii::t('tlgrm', 'Online support') . '<span>', ['class' => 'btn btn-primary', 'id' => 'tlgrm-init-btn']);