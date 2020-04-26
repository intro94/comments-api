<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AbstractRequest
 * @package App\Http\Requests
 */
abstract class AbstractRequest extends FormRequest
{
    /**
     * @var array
     */
    protected const FIELDS = [];

    /**
     * @return array
     */
    public function rules(): array
    {
        return getValidationRules($this->getFields());
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return static::FIELDS;
    }
}
