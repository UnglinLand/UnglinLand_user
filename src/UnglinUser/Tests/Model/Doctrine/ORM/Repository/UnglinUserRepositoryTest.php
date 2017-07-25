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
namespace UnglinLand\UserBundle\Tests\Model\Doctrine\ORM\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Persisters\Entity\EntityPersister;
use Doctrine\ORM\UnitOfWork;
use PHPUnit\Framework\TestCase;
use UnglinLand\UserModule\Model\Doctrine\ORM\Repository\UnglinUserRepository;
use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinUserRepository test
 *
 * This class is used to validate the UnglinUserRepository logic
 *
 * @category Test
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUserRepositoryTest extends TestCase
{
    /**
     * Test findOneById
     *
     * This method validate the UnglinUserRepository::findOneById method logic
     *
     * @return void
     */
    public function testFindOneById()
    {
        $entityPersister = $this->createMock(EntityPersister::class);
        $unitOfWork = $this->createMock(UnitOfWork::class);
        $entityManager = $this->createMock(EntityManager::class);
        $metadata = $this->createMock(ClassMetadata::class);

        $metadata->name = UnglinUser::class;

        $entityManager->expects($this->once())
            ->method('getUnitOfWork')
            ->willReturn($unitOfWork);

        $unitOfWork->expects($this->once())
            ->method('getEntityPersister')
            ->with($this->equalTo(UnglinUser::class))
            ->willReturn($entityPersister);

        $entityPersister->expects($this->once())
            ->method('load')
            ->with($this->equalTo(['id' => 123]));

        $instance = new UnglinUserRepository($entityManager, $metadata);

        $instance->findOneById(123);
    }
}
