<?php
/**
 * This file is part of UnglinLand-user
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Model
 * @package  UnglinLand-user
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Repository;

use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinUser repository
 *
 * This interface define the base UnglinUser repository methods
 *
 * @category Model
 * @package  UnglinLand-user
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinUserRepositoryInterface
{
    /**
     * Find one by id
     *
     * This method return a UnglinUser accordingly with the given id
     *
     * @param mixed $id The id of the searched UnglinUser
     *
     * @return UnglinUser|NULL
     */
    public function findOneById($id) : ?UnglinUser;
}
