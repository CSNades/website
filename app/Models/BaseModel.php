<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{
    protected $input;
    protected $rules = array();
    protected $messages = array();
    protected $validator;

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            return $model->isValid();
        });
    }

    public function addValidation($rule = null, $message = null)
    {
        if ($rule) {
            $this->setRule($rule);
        }

        if ($message) {
            $this->setMessage($message);
        }

        return $this;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function getValidator($input = null, $rules = null, $messages = null)
    {
        if (!$input) {
            $input = $this->toArray();
        }

        if (!$rules) {
            $rules = $this->getRules();
        }

        if (!$messages) {
            $messages = $this->getMessages();
        }

        if (!$this->validator) {
            $this->validator = Validator::make($input, $rules, $messages);
        }

        return $this->validator;
    }

    public function isValid()
    {
        return $this->getValidator($this->input)->passes();
    }

    public function setInput($input)
    {
        $this->input = $input;

        return $this;
    }

    public function setMessage($messageKey, $message)
    {
        $this->messages[$messageKey] = $message;

        return $this;
    }

    public function setRule($ruleKey, $rule)
    {
        $this->rules[$ruleKey] = $rule;

        return $this;
    }
}
