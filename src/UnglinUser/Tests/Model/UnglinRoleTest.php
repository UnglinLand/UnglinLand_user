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
namespace UnglinLand\UserModule\Tests\Model;

use PHPUnit\Framework\TestCase;
use UnglinLand\UserModule\Model\UnglinRole;

/**
 * UnglinRole test
 *
 * This class is used to validate the UnglinRole logic
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRoleTest extends TestCase
{
    /**
     * Instance
     *
     * This property store the instance to be validated.
     *
     * @var UnglinRole
     */
    private $instance;

    /**
     * Set up
     *
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new UnglinRole();
    }

    /**
     * Test getId
     *
     * This method validate the UnglinRole::getId method logic
     *
     * @return void
     */
    public function testGetId()
    {
        $idProperty = new \ReflectionProperty(UnglinRole::class, 'id');
        $idProperty->setAccessible(true);
        $idProperty->setValue($this->instance, 'role_id');

        $this->assertEquals('role_id', $this->instance->getId());
    }

    /**
     * Test setLabel
     *
     * This method validate the UnglinRole::setLabel method logic
     *
     * @return void
     */
    public function testSetLabel()
    {
        $label = 'role_label';
        $labelProperty = new \ReflectionProperty(UnglinRole::class, 'label');
        $labelProperty->setAccessible(true);

        $this->assertSame($this->instance, $this->instance->setLabel($label));
        $this->assertEquals($label, $labelProperty->getValue($this->instance));
    }

    /**
     * Test getLabel
     *
     * This method validate the UnglinRole::getLabel method logic
     *
     * @return void
     */
    public function testGetLabel()
    {
        $label = 'role_label';
        $labelProperty = new \ReflectionProperty(UnglinRole::class, 'label');
        $labelProperty->setAccessible(true);
        $labelProperty->setValue($this->instance, $label);

        $this->assertEquals($label, $this->instance->getLabel());
    }
}
