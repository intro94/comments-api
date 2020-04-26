<?php

namespace App\Http\Requests;

use App\Exceptions\JsonException;
use Illuminate\Contracts\Validation\Validator;
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
     * @param Validator $validator
     * @throws JsonException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new JsonException($validator->getMessageBag()->first(), 422);
    }

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
