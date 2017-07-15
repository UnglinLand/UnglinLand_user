<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Repository
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Repository;

use UnglinLand\UserModule\Model\UnglinRole;

/**
 * UnglinRole repository interface
 *
 * This interface define the base UnglinRole repository methods
 *
 * @category Repository
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinRoleRepositoryInterface
{
    /**
     * Find one by id
     *
     * This method return a UnglinRole accordingly with the given id
     *
     * @param mixed $id The id of the searched UnglinRole
     *
     * @return UnglinRole|NULL
     */
    public function findOneById($id) : ?UnglinRole;
}
