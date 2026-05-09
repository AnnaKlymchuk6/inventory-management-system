<?php

namespace Services;

class ProductValidator
{
    public function validate(array $data): array
    {
        $errors = [];

        if (trim($data['name']) === '') {
            $errors[] = 'Назва товару обов’язкова.';
        }

        if ((int)$data['quantity'] < 0) {
            $errors[] = 'Кількість не може бути від’ємною.';
        }

        if ((float)$data['price'] < 0) {
            $errors[] = 'Ціна не може бути від’ємною.';
        }

        return $errors;
    }
}