<?php
interface UserDao {
    public function login($email, $password);
    public function signUp(User $user, String $password);
    public function editUser(User $user);
    public function updateUserAddress(User $user, Address $address);
    public function updateUserPassword(User $user, $password, $oldPassword);
    
}