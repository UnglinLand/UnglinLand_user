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

use PHPUnit\Framework\TestCase;
use UnglinLand\UserModule\Manager\UnglinUserManager;
use Psr\Log\LoggerInterface;
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
class UnglinUserManagerTest extends TestCase
{
    /**
     * Test createInstance
     *
     * This method validate the createInstance method of the UnglinUserManager instance
     *
     * @return void
     */
    public function testCreateInstance()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinUserMapperInterface::class);

        $instance = new UnglinUserManager($mapper, $logger);

        $user = $instance->createInstance();

        $this->assertInstanceOf(
            UnglinUser::class,
            $user,
            'The UnglinUserManager::createInstance is expected to return an instance of UnglinUser'
        );
    }

    /**
     * Test saveUser
     *
     * This method validate the saveUser method of the UnglinUserManager instance
     *
     * @return void
     */
    public function testSaveUser()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinUserMapperInterface::class);

        $instance = new UnglinUserManager($mapper, $logger);

        $user = $this->createMock(UnglinUser::class);

        $user->expects($this->once())
            ->method('getId')
            ->willReturn('123');

        $logger->expects($this->once())
            ->method('debug')
            ->with($this->stringEndsWith('"123"'));

        $mapper->expects($this->once())
            ->method('persist')
            ->with($this->identicalTo($user));
        $mapper->expects($this->once())
            ->method('save')
            ->with($this->identicalTo($user));

        $this->assertNull($instance->save($user));
    }

    /**
     * Test saveUser with TypeError
     *
     * This method validate the type hint of the saveUser of the UnglinUserManager instance
     *
     * @return void
     */
    public function testSaveUserTypeError()
    {
        $this->expectException(\TypeError::class);
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinUserMapperInterface::class);

        $instance = new UnglinUserManager($mapper, $logger);

        $this->assertNull($instance->save(new \stdClass()));
    }

    /**
     * Test loadUser
     *
     * This method validate the loadUser method of the UnglinUserManager instance
     *
     * @return void
     */
    public function testLoadUser()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinUserMapperInterface::class);

        $instance = new UnglinUserManager($mapper, $logger);

        $user = $this->createMock(UnglinUser::class);

        $logger->expects($this->once())
            ->method('debug')
            ->with($this->stringEndsWith('"123"'));

        $mapper->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo('123'))
            ->willReturn($user);

        $this->assertSame($user, $instance->loadById('123'));
    }

    /**
     * Test loadUser if failure
     *
     * This method validate the loadUser method of the UnglinUserManager instance when the mapper is not
     * able to load an user, accordingly with the given identifyer
     *
     * @return void
     */
    public function testLoadUserFailure()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinUserMapperInterface::class);

        $instance = new UnglinUserManager($mapper, $logger);

        $logger->expects($this->once())
            ->method('debug')
            ->with($this->stringEndsWith('"123"'));
        $logger->expects($this->once())
            ->method('info')
            ->with($this->stringEndsWith('"123"'));

        $mapper->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo('123'))
            ->willReturn(null);

        $this->assertNull($instance->loadById('123'));
    }

    /**
     * Test delete
     *
     * This method validate the delete method of the UnglinUserManager instance
     *
     * @return void
     */
    public function testDelete()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinUserMapperInterface::class);

        $instance = new UnglinUserManager($mapper, $logger);

        $role = $this->createMock(UnglinUser::class);

        $role->expects($this->once())
            ->method('getId')
            ->willReturn('123');

        $logger->expects($this->once())
            ->method('debug')
            ->with($this->stringEndsWith('"123"'));

        $mapper->expects($this->once())
            ->method('delete')
            ->with($this->identicalTo($role));

        $this->assertNull($instance->delete($role));
    }
}
