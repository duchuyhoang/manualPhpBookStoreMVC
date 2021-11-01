<?php
require_once dirname(__FILE__) ."./Address.php";
class User{
private $id_user;
private String $name;
private DateTime $birthday;
private String|null $self_describe;
private int $delFlag;
private String $email;
private Address $address;
private String $phone;
private int $permission;

function __construct($id,$name,$birthday,$self_describe,$delFlag,$email,$address,$phone,$permission){
$this->id_user=$id;
$this->name=$name;
$this->birthday=new DateTime($birthday);
$this->self_describe=$self_describe;
$this->delFlag=$delFlag;
$this->email=$email;
$this->address = $address;
$this->phone=$phone;
$this->permission = $permission;
}

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id_user;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id_user = $id;

return $this;
}

/**
 * Get the value of name
 */ 
public function getName()
{
return $this->name;
}

/**
 * Set the value of name
 *
 * @return  self
 */ 
public function setName($name)
{
$this->name = $name;

return $this;
}

/**
 * Get the value of birthday
 */ 
public function getBirthday()
{
return $this->birthday;
}

/**
 * Set the value of birthday
 *
 * @return  self
 */ 
public function setBirthday($birthday)
{
$this->birthday = $birthday;

return $this;
}

/**
 * Get the value of self_describe
 */ 
public function getSelf_describe()
{
return $this->self_describe;
}

/**
 * Set the value of self_describe
 *
 * @return  self
 */ 
public function setSelf_describe($self_describe)
{
$this->self_describe = $self_describe;

return $this;
}

/**
 * Get the value of delFlag
 */ 
public function getDelFlag()
{
return $this->delFlag;
}

/**
 * Set the value of delFlag
 *
 * @return  self
 */ 
public function setDelFlag($delFlag)
{
$this->delFlag = $delFlag;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of address
 */ 
public function getAddress()
{
return $this->address;
}

/**
 * Set the value of address
 *
 * @return  self
 */ 
public function setAddress($address)
{
$this->address = $address;

return $this;
}

/**
 * Get the value of phone
 */ 
public function getPhone()
{
return $this->phone;
}

/**
 * Set the value of phone
 *
 * @return  self
 */ 
public function setPhone($phone)
{
$this->phone = $phone;

return $this;
}

/**
 * Get the value of permission
 */ 
public function getPermission()
{
return $this->permission;
}

/**
 * Set the value of permission
 *
 * @return  self
 */ 
public function setPermission($permission)
{
$this->permission = $permission;

return $this;
}
}
