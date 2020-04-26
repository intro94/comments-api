<?php

if (!function_exists('getValidationRules')) {
    function getValidationRules($fields) {
        $validationRules = [
            'replyCommentText' => 'required|string|max:5000'
        ];

        $rules = [];
        foreach ($fields as $field) {
            $rules[$field] = $validationRules[$field];
        }

        return $rules;
    }
}
