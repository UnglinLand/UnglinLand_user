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
use Doctrine\Common\Persistence\ObjectRepository;
use UnglinLand\UserModule\Model\EntityVersionControlInterface;

/**
 * Version control repository trait test
 *
 * This trait is used to validate the VersionControlRepositoryTrait
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait VersionControlRepoTraitTest
{
    /**
     * Entity provider
     *
     * This method return an entity and an expected result to validate the VersionControlRepository methods
     *
     * @return array
     */
    public function entityProvider()
    {
        $versionInterface = new \ReflectionClass(EntityVersionControlInterface::class);
        $versionMethods = array_map([$this, 'mapMethodNames'], $versionInterface->getMethods());

        $testCase = $this->getTestCase();

        $active = $testCase->getMockBuilder(EntityVersionControlInterface::class)
            ->setMethods($versionMethods)
            ->getMock();

        $active->expects($testCase->once())
            ->method('isDeleted')
            ->willReturn(false);

        $deleted = $testCase->getMockBuilder(EntityVersionControlInterface::class)
            ->setMethods($versionMethods)
            ->getMock();

        $deleted->expects($testCase->once())
            ->method('isDeleted')
            ->willReturn(true);

        return [
            [$active, [$active]],
            [$deleted, []]
        ];
    }

    /**
     * Test findByReference
     *
     * This method validate the VersionControlRepository::findByReference method
     *
     * @param \PHPUnit_Framework_MockObject_MockObject $entity         the mocked entity used as fixture
     * @param array                                    $expectedResult the expected result
     *
     * @dataProvider entityProvider
     * @return       void
     */
    public function testFindByReference(\PHPUnit_Framework_MockObject_MockObject $entity, array $expectedResult)
    {
        $reference = '123';
        $testCase = $this->getTestCase();

        $repository = $testCase->getMockBuilder(ObjectRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $repository->expects($testCase->once())
            ->method('findBy')
            ->with(
                $testCase->equalTo(['reference' => $reference]),
                $testCase->equalTo(['createdDate' => 'DESC', 'id' => 'DESC'])
            )->willReturn([$entity]);

        $instance = $testCase->getMockBuilder($this->getTestedInstanceClass())
            ->setMethods(['getRepository'])
            ->disableOriginalConstructor()
            ->getMock();

        $instance->expects($testCase->once())
            ->method('getRepository')
            ->willReturn($repository);

        $testCase->assertEquals($expectedResult, $instance->findByReference($reference));
    }

    /**
     * Test findOneByReference
     *
     * This method validate the VersionControlRepository::findOneByReference method
     *
     * @param \PHPUnit_Framework_MockObject_MockObject $entity         the mocked entity used as fixture
     * @param array                                    $expectedResult the expected result
     *
     * @dataProvider entityProvider
     * @return       void
     */
    public function testFindOneByReference(\PHPUnit_Framework_MockObject_MockObject $entity, array $expectedResult)
    {
        $reference = '123';
        $testCase = $this->getTestCase();

        $repository = $testCase->getMockBuilder(ObjectRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $repository->expects($testCase->once())
            ->method('findBy')
            ->with(
                $testCase->equalTo(['reference' => $reference]),
                $testCase->equalTo(['createdDate' => 'DESC', 'id' => 'DESC']),
                $testCase->equalTo(1)
            )->willReturn([$entity]);

        $instance = $testCase->getMockBuilder($this->getTestedInstanceClass())
            ->setMethods(['getRepository'])
            ->disableOriginalConstructor()
            ->getMock();

        $instance->expects($testCase->once())
            ->method('getRepository')
            ->willReturn($repository);

        $testCase->assertEquals(
            (empty($expectedResult) ? null : $expectedResult[0]),
            $instance->findOneByReference($reference)
        );
    }

    /**
     * Test getRepository
     *
     * This method validate the getRepository method of the tested instance.
     *
     * @return void
     */
    public function testGetRepository()
    {
        $testCase = $this->getTestCase();
        $instance = $testCase->getMockBuilder($this->getTestedInstanceClass())
            ->disableOriginalConstructor()
            ->getMock();

        $reflex = new \ReflectionMethod($instance, 'getRepository');
        $reflex->setAccessible(true);

        $testCase->assertInstanceOf($this->getTestedInstanceClass(), $reflex->invoke($instance));
    }

    /**
     * Map method names
     *
     * This method is used as array_map callback to return the method names
     *
     * @param \ReflectionMethod $method The method whence get the name
     *
     * @return string
     */
    protected function mapMethodNames(\ReflectionMethod $method) : string
    {
        return $method->getName();
    }

    /**
     * Get test case
     *
     * This method return a test case instance to process the tests.
     *
     * @return TestCase
     */
    abstract protected function getTestCase() : TestCase;

    /**
     * Get tested instance
     *
     * This method return an instance to be validated
     *
     * @return string
     */
    abstract protected function getTestedInstanceClass() : string;
}
