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
use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinUser test
 *
 * This class is used to validate the UnglinUser objects
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUserTest extends TestCase
{
    /**
     * Instance
     *
     * This property store the instance to be validated.
     *
     * @var UnglinUser
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
        $this->instance = new UnglinUser();
    }

    /**
     * Test getId
     *
     * This method is used to validate the getId method of UnglinUser class.
     *
     * @return void
     */
    public function testGetId()
    {
        $instanceReflection = new \ReflectionProperty(UnglinUser::class, 'id');
        $instanceReflection->setAccessible(true);
        $instanceReflection->setValue($this->instance, 'user_id');

        $this->assertEquals(
            'user_id',
            $this->instance->getId(),
            'The UnglinUser::getId method is expected to return the value stored into the "id" property'
        );
    }

    /**
     * Test getPassword
     *
     * This method is used to validate the getPassword method of UnglinUser class.
     *
     * @return void
     */
    public function testGetPassword()
    {
        $instanceReflection = new \ReflectionProperty(UnglinUser::class, 'password');
        $instanceReflection->setAccessible(true);
        $instanceReflection->setValue($this->instance, 'user_password');

        $this->assertEquals(
            'user_password',
            $this->instance->getPassword(),
            'The UnglinUser::getPasssword method is expected to return the value stored into the "password" property'
        );
    }

    /**
     * Test eraseCredentials
     *
     * This method is used to validate the eraseCredentials method of UnglinUser class.
     *
     * @return void
     */
    public function testEraseCredentials()
    {
        $instanceReflection = new \ReflectionProperty(UnglinUser::class, 'password');
        $instanceReflection->setAccessible(true);
        $instanceReflection->setValue($this->instance, 'user_password');

        $this->assertNull(
            $this->instance->eraseCredentials(),
            'The UnglinUser::eraseCredentials method is expected to return "NULL"'
        );

        $this->assertNull(
            $instanceReflection->getValue($this->instance),
            'The UnglinUser::eraseCredentials method is expected to set the user password to "NULL"'
        );
    }

    /**
     * Salt provider
     *
     * This method is used to provide fixtures to validate the getSalt method of UnglinUser class.
     *
     * @return string[]|null[]
     */
    public function saltProvider()
    {
        return [
            ['password_salt'],
            [null]
        ];
    }

    /**
     * Test getSalt
     *
     * This method is used to validate the getSalt method of UnglinUser class.
     *
     * @param string|null $saltValue The expected salt value
     *
     * @dataProvider saltProvider
     * @return       void
     */
    public function testGetSalt(string $saltValue = null)
    {
        $instanceReflection = new \ReflectionProperty(UnglinUser::class, 'salt');
        $instanceReflection->setAccessible(true);
        $instanceReflection->setValue($this->instance, $saltValue);

        $this->assertEquals(
            $saltValue,
            $this->instance->getSalt(),
            'The UnglinUser::getSalt method is expected to return the value stored into the "salt" property'
        );
    }

    /**
     * Roles provider
     *
     * This method is used to provide fixtures to validate the getRoles method of UnglinUser class.
     *
     * @return array[]
     */
    public function rolesProvider()
    {
        return [
            [['ROLE_USER', 'ROLE_ADMIN']],
            [[]]
        ];
    }

    /**
     * Test getRoles
     *
     * This method is used to validate the getRoles method of UnglinUser class.
     *
     * @param array $rolesValue The expected roles value
     *
     * @dataProvider rolesProvider
     * @return       void
     */
    public function testGetRoles(array $rolesValue = null)
    {
        $instanceReflection = new \ReflectionProperty(UnglinUser::class, 'roles');
        $instanceReflection->setAccessible(true);
        $instanceReflection->setValue($this->instance, $rolesValue);

        $this->assertEquals(
            $rolesValue,
            $this->instance->getRoles(),
            'The UnglinUser::getRoles method is expected to return the value stored into the "roles" property'
        );

        $this->assertTrue(
            is_array($this->instance->getRoles()),
            'The UnglinUser::getRoles method is expected to return an array'
        );
    }

    /**
     * Test getUsername
     *
     * This method is used to validate the getUsername method of UnglinUser class.
     *
     * @return void
     */
    public function testGetUsername()
    {
        $instanceReflection = new \ReflectionProperty(UnglinUser::class, 'username');
        $instanceReflection->setAccessible(true);
        $instanceReflection->setValue($this->instance, 'user_name');

        $this->assertEquals(
            'user_name',
            $this->instance->getUsername(),
            'The UnglinUser::getUsername method is expected to return the value stored into the "username" property'
        );
    }
}
