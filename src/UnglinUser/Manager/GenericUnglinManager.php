<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Manager;

use UnglinLand\UserModule\Manager\UnglinManagerInterface;
use UnglinLand\UserModule\Model\Mapper\UnglinMapperInterface;
use Psr\Log\LoggerInterface;

/**
 * GenericUnglinManager
 *
 * This class is used as parent of the Unglin managers
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class GenericUnglinManager implements UnglinManagerInterface
{
    /**
     * Mapper
     *
     * This property store the instance mapper
     *
     * @var UnglinMapperInterface
     */
    private $mapper;

    /**
     * Logger
     *
     * This property store the application logger
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Construct
     *
     * The default UnglinRoleManager constructor.
     *
     * @param UnglinMapperInterface $mapper The instance mapper
     * @param LoggerInterface       $logger The application logger
     *
     * @return void
     */
    public function __construct(UnglinMapperInterface $mapper, LoggerInterface $logger)
    {
        $this->mapper = $mapper;
        $this->logger = $logger;
    }

    /**
     * Create instance
     *
     * This method create a new instance and return it.
     *
     * @return mixed
     */
    public function createInstance()
    {
        $this->logger->debug('Creating empty instance');

        $class = $this->getManagedClass();
        return new $class();
    }

    /**
     * Save
     *
     * This method save a managed instance.
     *
     * @param mixed $instance The instance to save
     *
     * @return void
     */
    public function save($instance) : void
    {
        $managedInstance = $this->getManagedClass();
        if (!$instance instanceof $managedInstance) {
            throw new \TypeError(
                sprintf(
                    'Expected %s. %s given',
                    $managedInstance,
                    is_object($instance) ? get_class($instance) : gettype($instance)
                )
            );
        }

        $this->logger->debug(
            sprintf(
                'Saving instance with identifyer "%s"',
                $this->getInstanceId($instance)
            )
        );

        $this->mapper->persist($instance);
        $this->mapper->save($instance);

        return;
    }

    /**
     * Load by id
     *
     * This method load a managed instance accordingly with it identifyer
     *
     * @param mixed $identifyer The instance identifyer
     *
     * @return mixed|NULL
     */
    public function loadById($identifyer)
    {
        $this->logger->debug(sprintf('Loading instance with identifyer "%s"', $identifyer));

        $instance = $this->mapper->findOneById($identifyer);

        if (!$instance) {
            $this->logger->info(sprintf('Unable to load instance with identifyer "%s"', $identifyer));
            return null;
        }

        return $instance;
    }

    /**
     * Delete
     *
     * This method remove a managed instance from the storage
     *
     * @param mixed $instance The instance to remove
     *
     * @return void
     */
    public function delete($instance) : void
    {
        $managedInstance = $this->getManagedClass();
        if (!$instance instanceof $managedInstance) {
            throw new \TypeError(
                sprintf(
                    'Expected %s. %s given',
                    $managedInstance,
                    is_object($instance) ? get_class($instance) : gettype($instance)
                )
            );
        }

        $this->logger->debug(
            sprintf(
                'Deleting instance with identifyer "%s"',
                $this->getInstanceId($instance)
            )
        );

        $this->mapper->delete($instance);
        return;
    }

    /**
     * Get instance id
     *
     * Return the managed instance id
     *
     * @param mixed $instance The managed instance
     *
     * @return mixed
     */
    abstract protected function getInstanceId($instance);

    /**
     * Get managed instance
     *
     * This method return the managed class name.
     *
     * @return string
     */
    abstract protected function getManagedClass() : string ;
}
