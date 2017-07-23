<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Tests\Manager;

use UnglinLand\UserModule\Manager\UnglinRoleManager;
use UnglinLand\UserModule\Model\Mapper\UnglinRoleMapperInterface;
use UnglinLand\UserModule\Model\UnglinRole;

/**
 * UnglinRoleManager test
 *
 * This class is used to validate the UnglinRoleManager instance
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRoleManagerTest extends AbstractManagerTest
{
    /**
     * Get tested instance
     *
     * This method return the tested instance class
     *
     * @return string
     */
    protected function getTestedClass() : string
    {
        return UnglinRoleManager::class;
    }

    /**
     * Get managed class
     *
     * This method return the managed class
     *
     * @return string
     */
    protected function getManagedClass() : string
    {
        return UnglinRole::class;
    }

    /**
     * Get mapper class
     *
     * This method return the mapper class
     *
     * @return string
     */
    protected function getMapperClass() : string
    {
        return UnglinRoleMapperInterface::class;
    }
}
