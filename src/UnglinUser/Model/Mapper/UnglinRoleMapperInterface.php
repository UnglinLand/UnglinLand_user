<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Mapper
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Mapper;

use UnglinLand\UserModule\Model\UnglinRole;

/**
 * UnglinRole mapper interface
 *
 * This interface define the base UnglinRole mapper methods
 *
 * @category Mapper
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinRoleMapperInterface
{
    /**
     * Persist
     *
     * This method persist a role instance.
     *
     * @param UnglinRole $role The role to persist
     *
     * @return void
     */
    public function persist(UnglinRole $role) : void ;

    /**
     * Save
     *
     * This method save a role instance.
     *
     * @param UnglinRole $role The role to save
     *
     * @return void
     */
    public function save(UnglinRole $role) : void ;

    /**
     * Find one by id
     *
     * This method return a role instance, accordingly with it identifyer. Can return null if no
     * one role match the given identifyer.
     *
     * @param mixed $identifyer The role identifyer
     *
     * @return UnglinRole|NULL
     */
    public function findOneById($identifyer) : ?UnglinRole ;

    /**
     * Delete
     *
     * This method delete a role instance.
     *
     * @param UnglinRole $role The role to delete
     *
     * @return void
     */
    public function delete(UnglinRole $role) : void ;
}
