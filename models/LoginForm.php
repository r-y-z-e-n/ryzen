<?php


namespace app\models;

use ryzen\framework\Application;
use ryzen\framework\Model;

/**
 * @author razoo.choudhary@gmail.com
 * Class LoginForm
 * @package app\models
 */
class LoginForm extends Model
{

    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];

    }

    public function login(): bool
    {

        $user = User::findOne(['email' => $this->email]);

        if (!$user) {

            $this->addError('email', 'User Does not exist with this email');

            return false;
        }

        if (!password_verify($this->password, $user->password)) {

            $this->addError('password', 'Incorrect password');

            return false;
        }

        return Application::$app->login($user);
    }
}