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

/**
 * Unglin repository
 *
 * This interface define the base Unglin entity repository methods
 *
 * @category Model
 * @package  UnglinLand-user
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinRepositoryInterface
{
    /**
     * Find one by id
     *
     * This method return a Unglin entity accordingly with the given id
     *
     * @param mixed $id The id of the searched Unglin entity
     *
     * @return object|NULL
     */
    public function findOneById($id);
}
