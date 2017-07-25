<?php
/**
 * This file is part of UserSymfonyBridge
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Test
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Tests\Model\Doctrine\Mapper;

use PHPUnit\Framework\TestCase;
use Doctrine\Common\Persistence\ObjectManager;
use UnglinLand\UserModule\Model\Repository\UnglinUserRepositoryInterface;
use UnglinLand\UserModule\Model\Doctrine\Mapper\UnglinUserMapper;
use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinUserMapper test
 *
 * This class is used to validate the UnglinUserMapper logic
 *
 * @category Test
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUserMapperTest extends TestCase
{
    /**
     * Test findOneById
     *
     * This method validate the UnglinUserMapper::findOneById method logic
     *
     * @return void
     */
    public function testFindOneById()
    {
        $objectManager = $this->createMock(ObjectManager::class);
        $repository = $this->createMock(UnglinUserRepositoryInterface::class);

        $instance = new UnglinUserMapper($objectManager, $repository);

        $role = $this->createMock(UnglinUser::class);

        $repository->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo(123))
            ->willReturn($role);

        $this->assertSame($role, $instance->findOneById(123));
    }

    /**
     * Test save
     *
     * This method validate the UnglinUserMapper::save method logic
     *
     * @return void
     */
    public function testSave()
    {
        $objectManager = $this->createMock(ObjectManager::class);
        $repository = $this->createMock(UnglinUserRepositoryInterface::class);

        $instance = new UnglinUserMapper($objectManager, $repository);

        $role = $this->createMock(UnglinUser::class);

        $objectManager->expects($this->once())
            ->method('flush')
            ->with($this->identicalTo($role));

        $this->assertNull($instance->save($role));
    }

    /**
     * Test persist
     *
     * This method validate the UnglinUserMapper::persist method logic
     *
     * @return void
     */
    public function testPersist()
    {
        $objectManager = $this->createMock(ObjectManager::class);
        $repository = $this->createMock(UnglinUserRepositoryInterface::class);

        $instance = new UnglinUserMapper($objectManager, $repository);

        $role = $this->createMock(UnglinUser::class);

        $objectManager->expects($this->once())
            ->method('persist')
            ->with($this->identicalTo($role));

        $this->assertNull($instance->persist($role));
    }

    /**
     * Test delete
     *
     * This method validate the UnglinUserMapper::delete method logic
     *
     * @return void
     */
    public function testDelete()
    {
        $objectManager = $this->createMock(ObjectManager::class);
        $repository = $this->createMock(UnglinUserRepositoryInterface::class);

        $instance = new UnglinUserMapper($objectManager, $repository);

        $role = $this->createMock(UnglinUser::class);

        $objectManager->expects($this->once())
            ->method('remove')
            ->with($this->identicalTo($role));

        $this->assertNull($instance->delete($role));
    }
}
