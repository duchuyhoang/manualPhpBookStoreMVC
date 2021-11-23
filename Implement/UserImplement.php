<?php
interface UserImplement {
    public function login($email, $password);
    public function signUp(User $user, String $password);
    public function editUser(User $user);
}