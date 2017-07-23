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

use UnglinLand\UserModule\Manager\UnglinUserManager;
use UnglinLand\UserModule\Model\Mapper\UnglinUserMapperInterface;
use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinUserManager test
 *
 * This class is used to validate the UnglinUserManager instance
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUserManagerTest extends AbstractManagerTest
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
        return UnglinUserManager::class;
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
        return UnglinUser::class;
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
        return UnglinUserMapperInterface::class;
    }
}
