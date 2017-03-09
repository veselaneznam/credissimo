<?php

namespace Credissimo\User\Domain\Model;

use Credissimo\Shop\Domain\Model\Product;
use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{

    /** @var int */
    protected $id;

    /** @var Product[] */
    private $products;

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
