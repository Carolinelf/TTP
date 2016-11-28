<?php
/**
 * Validator for {@link User}.
 * @see UserMapper
 */
final class LoginValidator {

    private function __construct() {
    }

    /**
     * Validate the given {@link User} instance.
     * @param User $user {@link User} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(User $user) {
        $errors = array();
        if (!$user->getUsername()) {
            $errors[] = new Error('username', 'Empty or invalid Username.');
        }
        if (!$user->getPassword()) {
            $errors[] = new Error('password', 'Empty or invalid Password.');
        }
        return $errors;
    }

}
