<?php
/**
 * This file is part of UserSymfonyBridge
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Model
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Doctrine\ORM\Repository;

use UnglinLand\UserModule\Model\Repository\UnglinUserRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use UnglinLand\UserModule\Model\UnglinUser;
use UnglinLand\UserModule\Model\Repository\VersionControlRepositoryTrait;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * UnglinUser repository
 *
 * This class is used as UnglinUser repository
 *
 * @category Model
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUserRepository extends EntityRepository implements UnglinUserRepositoryInterface
{
    use VersionControlRepositoryTrait;

    /**
     * Find one by id
     *
     * This method return a UnglinUser accordingly with the given id
     *
     * @param mixed $id The id of the searched UnglinUser
     *
     * @return UnglinUser|NULL
     */
    public function findOneById($id) : ?UnglinUser
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Get repository
     *
     * This method return a repository instance to perform the requests.
     *
     * @return ObjectRepository
     */
    protected function getRepository() : ObjectRepository
    {
        return $this;
    }
}
