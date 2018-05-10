<?php

class CaptchaValidator extends CCaptchaValidator{

    public function validateValue($value) {
        return !empty($value) && $this->getCaptchaAction()->validate($value,false);
    }
}