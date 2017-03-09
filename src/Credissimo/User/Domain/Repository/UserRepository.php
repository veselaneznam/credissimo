<?php

namespace Credissimo\User\Domain\Repository;

use Credissimo\User\Domain\Model\User;

interface UserRepository
{
    /**
     * @param string $userName
     * @param string $password
     *
     * @return User
     */
    public function findOneByUsernameAndPassword($userName, $password);

    /**
     * @param string $email
     *
     * @return User
     */
    public function findOneByEmail($email);

    /**
     * @param $user
     */
    public function save(User $user);
}
