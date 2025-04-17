<?php
use yii\helpers\Html;
?>
<p>Você enviou os seguintes dados:</p>
<ul>
    <li><label>Nome:</label><?= Html::encode($model->nome)?></li>
    <li><label>Email</label> <?= Html::encode($model->e_mail)?></li>
</ul>
