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

use UnglinLand\UserModule\Model\UnglinRole;

/**
 * UnglinRoleManager
 *
 * This class is used to manage the UnglinRole instances
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRoleManager extends GenericUnglinManager
{
    /**
     * Get instance id
     *
     * Return the managed instance id
     *
     * @param mixed $instance The managed instance
     *
     * @return mixed
     */
    protected function getInstanceId($instance)
    {
        if ($instance instanceof UnglinRole) {
            return $instance->getId();
        }
        return '';
    }

    /**
     * Get managed instance
     *
     * This method return the managed class name.
     *
     * @return string
     */
    protected function getManagedClass() : string
    {
        return UnglinRole::class;
    }
}
