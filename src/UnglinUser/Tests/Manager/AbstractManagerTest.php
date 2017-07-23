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
use Psr\Log\LoggerInterface;

/**
 * Abstract manager test
 *
 * This class is used to validate the manager instance
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractManagerTest extends TestCase
{
    /**
     * Get tested instance
     *
     * This method return the tested instance class
     *
     * @return string
     */
    abstract protected function getTestedClass() : string ;

    /**
     * Get managed class
     *
     * This method return the managed class
     *
     * @return string
     */
    abstract protected function getManagedClass() : string ;

    /**
     * Get mapper class
     *
     * This method return the mapper class
     *
     * @return string
     */
    abstract protected function getMapperClass() : string ;

    /**
     * Test createInstance
     *
     * This method validate the createInstance method of the UnglinRoleManager instance
     *
     * @return void
     */
    public function testCreateInstance()
    {
        $class = $this->getTestedClass();
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $user = $instance->createInstance();

        $this->assertInstanceOf(
            $this->getManagedClass(),
            $user,
            sprintf(
                'The createInstance method is expected to return an instance of %s',
                $this->getManagedClass()
            )
        );
    }

    /**
     * Test save
     *
     * This method validate the save method of the manager instance
     *
     * @return void
     */
    public function testSave()
    {
        $class = $this->getTestedClass();
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $role = $this->createMock($this->getManagedClass());

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
     * This method validate the type hint of the save of the manager instance
     *
     * @return void
     */
    public function testSaveTypeError()
    {
        $class = $this->getTestedClass();
        $this->expectException(\TypeError::class);
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $this->assertNull($instance->save(new \stdClass()));
    }

    /**
     * Test load
     *
     * This method validate the load method of the manager instance
     *
     * @return void
     */
    public function testLoad()
    {
        $class = $this->getTestedClass();
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $user = $this->createMock($this->getManagedClass());

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
     * This method validate the load method of the manager instance when the mapper is not
     * able to load an instance, accordingly with the given identifyer
     *
     * @return void
     */
    public function testLoadFailure()
    {
        $class = $this->getTestedClass();
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $logger->expects($this->once())
            ->method('debug')
            ->with($this->stringEndsWith('"234"'));
        $logger->expects($this->once())
            ->method('info')
            ->with($this->stringEndsWith('"234"'));

        $mapper->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo('234'))
            ->willReturn(null);

        $this->assertNull($instance->loadById('234'));
    }

    /**
     * Test delete
     *
     * This method validate the delete method of the manager instance
     *
     * @return void
     */
    public function testDelete()
    {
        $class = $this->getTestedClass();
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $role = $this->createMock($this->getManagedClass());

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

    /**
     * Test delete with TypeError
     *
     * This method validate the type hint of the delete of the manager instance
     *
     * @return void
     */
    public function testDeleteTypeError()
    {
        $class = $this->getTestedClass();
        $this->expectException(\TypeError::class);
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $this->assertNull($instance->delete(new \stdClass()));
    }

    /**
     * Test getId
     *
     * This method validate the UnglinRoleManager::getInstanceId
     *
     * @return void
     */
    public function testGetId()
    {
        $class = $this->getTestedClass();
        $logger = $this->createMock(LoggerInterface::class);
        $mapper = $this->createMock($this->getMapperClass());

        $instance = new $class($mapper, $logger);

        $getIdMethod = new \ReflectionMethod($this->getTestedClass().'::getInstanceId');
        $getIdMethod->setAccessible(true);

        $role = $this->createMock($this->getManagedClass());
        $role->expects($this->once())
            ->method('getId')
            ->willReturn('123');

        $this->assertEquals('123', $getIdMethod->invoke($instance, $role));
        $this->assertEquals('', $getIdMethod->invoke($instance, new \stdClass()));
    }
}
