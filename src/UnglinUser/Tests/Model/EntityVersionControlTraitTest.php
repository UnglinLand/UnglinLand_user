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

use Alcaeus\MongoDbAdapter\Tests\TestCase;
use UnglinLand\UserModule\Model\EntityVersionControlInterface;

/**
 * Entity version control trait test
 *
 * This trait is used to validate the EntityVersionControlTrait
 *
 * @category Test
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait EntityVersionControlTraitTest
{
    /**
     * Test reference getter
     *
     * This method validate the getReferencce method of the EntityVersionControlTrait
     *
     * @return void
     */
    public function testReferenceGetter()
    {
        $instance = $this->getInstance();
        $reflectionProperty = new \ReflectionProperty(get_class($instance), 'reference');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($instance, 'reference');

        $this->getTestCase()->assertEquals('reference', $instance->getReference());
    }

    /**
     * Test reference setter
     *
     * This method validate the setReferencce method of the EntityVersionControlTrait
     *
     * @return void
     */
    public function testReferenceSetter()
    {
        $instance = $this->getInstance();
        $this->getTestCase()->assertInstanceOf(
            EntityVersionControlInterface::class,
            $instance->setReference('reference')
        );

        $reflectionProperty = new \ReflectionProperty(get_class($instance), 'reference');
        $reflectionProperty->setAccessible(true);

        $this->getTestCase()->assertEquals('reference', $reflectionProperty->getValue($instance));
    }

    /**
     * Test creation date
     *
     * This method validate the getCreationDate method of the EntityVersionControlTrait
     *
     * @return void
     */
    public function testCreationDate()
    {
        $instance = $this->getInstance();
        $reflectionProperty = new \ReflectionProperty(get_class($instance), 'creationDate');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($instance, new \DateTime());

        $this->getTestCase()->assertInstanceOf(
            \DateTime::class,
            $instance->getCreationDate()
        );
    }

    /**
     * Test deleted guetter
     *
     * This method validate the isDeleted method of the EntityVersionControlTrait
     *
     * @return void
     */
    public function testDeletedGetter()
    {
        $instance = $this->getInstance();
        $reflectionProperty = new \ReflectionProperty(get_class($instance), 'deleted');
        $reflectionProperty->setAccessible(true);

        $reflectionProperty->setValue($instance, true);
        $this->getTestCase()->assertTrue($instance->isDeleted());

        $reflectionProperty->setValue($instance, false);
        $this->getTestCase()->assertFalse($instance->isDeleted());
    }

    /**
     * Test deleted setter
     *
     * This method validate the setDeleted method of the EntityVersionControlTrait
     *
     * @return void
     */
    public function testDeletedSetter()
    {
        $instance = $this->getInstance();
        $reflectionProperty = new \ReflectionProperty(get_class($instance), 'deleted');
        $reflectionProperty->setAccessible(true);

        $this->getTestCase()->assertInstanceOf(
            EntityVersionControlInterface::class,
            $instance->setDeleted(true)
        );
        $this->getTestCase()->assertTrue($reflectionProperty->getValue($instance));

        $this->getTestCase()->assertInstanceOf(
            EntityVersionControlInterface::class,
            $instance->setDeleted(false)
        );
        $this->getTestCase()->assertFalse($reflectionProperty->getValue($instance));
    }

    /**
     * Get instance
     *
     * This method return an instance to be validated
     *
     * @return EntityVersionControlInterface
     */
    abstract protected function getInstance() : EntityVersionControlInterface;

    /**
     * Get test case
     *
     * This method return a TestCase instance to validate the EntityVersionControlTrait
     *
     * @return TestCase
     */
    abstract protected function getTestCase() : TestCase;
}
