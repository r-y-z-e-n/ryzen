<?php


namespace app\models;

use ryzen\framework\UserModel;

/**
 * @author razoo.choudhary@gmail.com
 * Class RegisterModal
 * @package app\models
 */
class User extends UserModel
{
    public string $fname = '';
    public string $lname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public static function tableName(): string
    {
        return 'users';
    }

    public static function attributes(): array
    {
        return ['fname', 'lname', 'email', 'password'];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save(): bool
    {

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function rules(): array
    {
        return [

            'fname' => [self::RULE_REQUIRED],
            'lname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 32]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function labels(): array
    {
        return [
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Confirm Password',
        ];
        //return parent::labels(); // TODO: Change the autogenerated stub
    }

    public function getDisplayName(): string
    {
        return $this->fname;
    }
}