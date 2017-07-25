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
namespace UnglinLand\UserModule\Tests\Model\Doctrine\ODM\Repository;

use PHPUnit\Framework\TestCase;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\UnitOfWork;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Persisters\DocumentPersister;
use UnglinLand\UserModule\Model\UnglinUser;
use UnglinLand\UserModule\Model\Doctrine\ODM\Repository\UnglinUserRepository;

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
        $documentPersister = $this->createMock(DocumentPersister::class);
        $unitOfWork = $this->createMock(UnitOfWork::class);
        $documentManager = $this->createMock(DocumentManager::class);
        $metadata = $this->createMock(ClassMetadata::class);

        $metadata->name = UnglinUser::class;

        $unitOfWork->expects($this->once())
            ->method('getDocumentPersister')
            ->with($this->equalTo(UnglinUser::class))
            ->willReturn($documentPersister);

        $documentPersister->expects($this->once())
            ->method('load')
            ->with($this->equalTo(['id' => 123]));

        $instance = new UnglinUserRepository($documentManager, $unitOfWork, $metadata);

        $instance->findOneById(123);
    }
}
