<?php

namespace pstramecki\validators;

use Yii;
use yii\validators\Validator;

final class ArrayValidator extends Validator
{
    public function init(): void
    {
        parent::init();

        if ($this->message === null) {
            $this->message = Yii::t('yii', '{attribute} must be an array.');
        }
    }

    protected function validateValue(mixed $value): ?array
    {
        return is_array($value) ? null : [$this->message];
    }
}