<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category User
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Manager;

use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinLand user manager interface
 *
 * This interface define the base user manager methods
 *
 * @category User
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinUserManagerInterface
{
    /**
     * Create user
     *
     * This method create a new instance of user and return it.
     *
     * @return UnglinUser
     */
    public function createUser() : UnglinUser;

    /**
     * Save user
     *
     * This method save a user instance.
     *
     * @param UnglinUser $user The user to save
     *
     * @return void
     */
    public function saveUser(UnglinUser $user) : void ;

    /**
     * Load user
     *
     * This method load an user instance accordingly with it identifyer
     *
     * @param mixed $identifyer The user identifyer
     *
     * @return UnglinUser|NULL
     */
    public function loadUser($identifyer) : ?UnglinUser ;
}
