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
     * Test createRole
     *
     * This method validate the createRole method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testCreateRole()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $user = $instance->createRole();

        $this->assertInstanceOf(
            UnglinRole::class,
            $user,
            'The UnglinRoleManager::createRole is expected to return an instance of UnglinRole'
        );
    }

    /**
     * Test saveRole
     *
     * This method validate the saveRole method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testSaveRole()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $user = $this->createMock(UnglinRole::class);

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

        $this->assertNull($instance->saveRole($user));
    }

    /**
     * Test saveRole with TypeError
     *
     * This method validate the type hint of the saveRole of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testSaveRoleTypeError()
    {
        $this->expectException(\TypeError::class);
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock(UnglinRoleMapperInterface::class);

        $instance = new UnglinRoleManager($mapper, $logger);

        $this->assertNull($instance->saveRole(new \stdClass()));
    }

    /**
     * Test loadRole
     *
     * This method validate the loadRole method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testLoadRole()
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

        $this->assertSame($user, $instance->loadRole('123'));
    }

    /**
     * Test loadRole if failure
     *
     * This method validate the loadRole method of the UnglinRoleManager instance when the mapper is not
     * able to load an user, accordingly with the given identifyer
     *
     * @return void
     */
    public function testLoadRoleFailure()
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

        $this->assertNull($instance->loadRole('123'));
    }
}
