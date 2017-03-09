<?php

namespace Credissimo\User\Infrastructure\Repository\Doctrine\ORM;

use Credissimo\User\Domain\Model\User;
use Credissimo\User\Domain\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function findOneByUsernameAndPassword($userName, $password)
    {
        return parent::findOneBy(['username' => $userName, 'password' => $password]);
    }

    /**
     * {@inheritdoc}
     */
    public function findOneByEmail($email)
    {
        return parent::findOneBy(['email' => $email]);
    }

    /**
     * @param $user
     */
    public function save(User $user)
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);
    }
}
