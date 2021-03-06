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
namespace UnglinLand\UserModule\Model\Doctrine\ODM\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use UnglinLand\UserModule\Model\Repository\UnglinRoleRepositoryInterface;
use UnglinLand\UserModule\Model\UnglinRole;
use UnglinLand\UserModule\Model\Repository\VersionControlRepositoryTrait;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * UnglinRoleRepository
 *
 * This class is used as UnglinRole repository
 *
 * @category Model
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRoleRepository extends DocumentRepository implements UnglinRoleRepositoryInterface
{
    use VersionControlRepositoryTrait;

    /**
     * Find one by id
     *
     * This method return a UnglinRole accordingly with the given id
     *
     * @param mixed $id The id of the searched UnglinRole
     *
     * @return UnglinRole|NULL
     */
    public function findOneById($id) : ?UnglinRole
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
