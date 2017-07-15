<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Role
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Manager;

use UnglinLand\UserModule\Model\UnglinRole;

/**
 * UnglinLand role manager interface
 *
 * This interface define the base role manager methods
 *
 * @category Role
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinRoleManagerInterface
{
    /**
     * Create role
     *
     * This method create a new instance of role and return it.
     *
     * @return UnglinRole
     */
    public function createRole() : UnglinRole;

    /**
     * Save role
     *
     * This method save a role instance.
     *
     * @param UnglinRole $role The role to save
     *
     * @return void
     */
    public function saveRole(UnglinRole $role) : void ;

    /**
     * Load role
     *
     * This method load an role instance accordingly with it identifyer
     *
     * @param mixed $identifyer The role identifyer
     *
     * @return UnglinRole|NULL
     */
    public function loadRole($identifyer) : ?UnglinRole ;
}
