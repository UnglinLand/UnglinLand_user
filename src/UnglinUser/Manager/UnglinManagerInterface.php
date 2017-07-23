<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Manager;

/**
 * UnglinLand manager interface
 *
 * This interface define the base manager methods
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinManagerInterface
{
    /**
     * Create instance
     *
     * This method create a new instance of managed object and return it.
     *
     * @return mixed
     */
    public function createInstance();

    /**
     * Save
     *
     * This method save a managed instance.
     *
     * @param mixed $instance The instance to save
     *
     * @return void
     */
    public function save($instance) : void ;

    /**
     * Load by id
     *
     * This method load a managed instance accordingly with it identifyer
     *
     * @param mixed $identifyer The instance identifyer
     *
     * @return mixed|NULL
     */
    public function loadById($identifyer);

    /**
     * Delete
     *
     * This method remove a managed instance from the storage
     *
     * @param mixed $instance The instance to remove
     *
     * @return void
     */
    public function delete($instance) : void ;
}
