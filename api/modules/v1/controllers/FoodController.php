<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class FoodController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Food';
}
