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
use UnglinLand\UserModule\Model\UnglinRole;
use UnglinLand\UserModule\Model\Doctrine\ODM\Repository\UnglinRoleRepository;
use UnglinLand\UserModule\Tests\Model\VersionControlRepoTraitTest;

/**
 * UnglinRoleRepository test
 *
 * This class is used to validate the UnglinRoleRepository logic
 *
 * @category Test
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRoleRepositoryTest extends TestCase
{
    use VersionControlRepoTraitTest;

    /**
     * Test findOneById
     *
     * This method validate the UnglinRoleRepository::findOneById method logic
     *
     * @return void
     */
    public function testFindOneById()
    {
        $documentPersister = $this->createMock(DocumentPersister::class);
        $unitOfWork = $this->createMock(UnitOfWork::class);
        $documentManager = $this->createMock(DocumentManager::class);
        $metadata = $this->createMock(ClassMetadata::class);

        $metadata->name = UnglinRole::class;

        $unitOfWork->expects($this->once())
            ->method('getDocumentPersister')
            ->with($this->equalTo(UnglinRole::class))
            ->willReturn($documentPersister);

        $documentPersister->expects($this->once())
            ->method('load')
            ->with($this->equalTo(['id' => 123]));

        $instance = new UnglinRoleRepository($documentManager, $unitOfWork, $metadata);

        $instance->findOneById(123);
    }

    /**
     * Get test case
     *
     * This method return a test case instance to process the tests.
     *
     * @return TestCase
     */
    protected function getTestCase() : TestCase
    {
        return $this;
    }

    /**
     * Get tested instance
     *
     * This method return an instance to be validated
     *
     * @return string
     */
    protected function getTestedInstanceClass() : string
    {
        return UnglinRoleRepository::class;
    }
}
