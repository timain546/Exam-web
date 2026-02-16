<?php
namespace app\services;

class Validator {
    public static function validateLogin(array $input) {
        $errors = [
            'name' => '',
            'password' => ''
        ];

        $values = [
            'name' => trim((string) $input['name'] ?? ''),
            'password' => (string) ($input['password'] ?? '')
        ];

        if(mb_strlen($values['name']) < 2) $errors['name'] = "Your name is too short";
        if(strlen($values['password']) < 8) $errors['password'] = "Your password is too short";

        $ok = true;
        foreach($errors as $e) if($e !== '') {$ok = false; break;}
        return ['ok' => $ok, 'errors' => $errors, 'values' => $values];
    }
}
