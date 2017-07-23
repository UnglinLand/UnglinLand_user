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
use UnglinLand\UserModule\Manager\UnglinRoleManager;
use Psr\Log\LoggerInterface;
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
class UnglinRoleManagerTest extends TestCase
{
    /**
     * Test createInstance
     *
     * This method validate the createInstance method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testCreateInstance()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $user = $instance->createInstance();

        $this->assertInstanceOf(
            UnglinRole::class,
            $user,
            'The UnglinRoleManager::createInstance is expected to return an instance of UnglinRole'
        );
    }

    /**
     * Test save
     *
     * This method validate the save method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testSave()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $role = $this->createMock(UnglinRole::class);

        $role->expects($this->once())
            ->method('getId')
            ->willReturn('123');

        $logger->expects($this->once())
            ->method('debug')
            ->with($this->stringEndsWith('"123"'));

        $mapper->expects($this->once())
            ->method('persist')
            ->with($this->identicalTo($role));
        $mapper->expects($this->once())
            ->method('save')
            ->with($this->identicalTo($role));

        $this->assertNull($instance->save($role));
    }

    /**
     * Test save with TypeError
     *
     * This method validate the type hint of the save of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testSaveTypeError()
    {
        $this->expectException(\TypeError::class);
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $this->assertNull($instance->save(new \stdClass()));
    }

    /**
     * Test load
     *
     * This method validate the load method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testLoad()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $user = $this->createMock(UnglinRole::class);

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
     * Test load if failure
     *
     * This method validate the load method of the UnglinRoleManager instance when the mapper is not
     * able to load an user, accordingly with the given identifyer
     *
     * @return void
     */
    public function testLoadFailure()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

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
     * This method validate the delete method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testDelete()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $role = $this->createMock(UnglinRole::class);

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
