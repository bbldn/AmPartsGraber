<?php

namespace App\Domain\Graber\Infrastructure\Repository\Base;

use Throwable;
use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\Exception as DBALException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @template T
 */
abstract class Repository extends ServiceEntityRepository
{
    protected Logger $logger;

    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     * @param string $entityClass
     *
     * @psalm-param class-string<T> $entityClass
     */
    public function __construct(Logger $logger, ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
        $this->logger = $logger;
    }

    /**
     * @param mixed $instance
     * @return void
     *
     * @psalm-param T $instance
     */
    public function persistAndFlush($instance): void
    {
        try {
            $this->_em->persist($instance);
            $this->_em->flush();
        } catch (Throwable $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function removeById(int $id): void
    {
        try {
            $identifier = $this->getClassMetadata()->getSingleIdentifierFieldName();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return;
        }

        $this->createQueryBuilder('c')
            ->andWhere("c.{$identifier} = :id")
            ->setParameter('id', $id)
            ->delete()
            ->getQuery()
            ->execute();
    }

    /**
     * @return void
     */
    public function removeAll(): void
    {
        $this->createQueryBuilder('c')->delete()->getQuery()->execute();
    }

    /**
     * @param mixed $instance
     * @return void
     *
     * @psalm-param T $instance
     */
    public function remove($instance): void
    {
        try {
            $this->_em->remove($instance);
        } catch (Throwable $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        try {
            $this->_em->flush();
        } catch (Throwable $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @param mixed $instance
     * @return void
     *
     * @psalm-param T $instance
     *
     * @noinspection PhpUnused
     */
    public function removeAndFlush($instance): void
    {
        try {
            $this->_em->remove($instance);
            $this->_em->flush();
        } catch (Throwable $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @return void
     */
    public function resetAutoIncrements(): void
    {
        $this->setAutoIncrements(1);
    }

    /**
     * @param int $value
     * @return void
     */
    public function setAutoIncrements(int $value): void
    {
        /** @noinspection SqlNoDataSourceInspection */
        $sql = sprintf("ALTER TABLE `%s` AUTO_INCREMENT = %d;", $this->getTableName(), $value);

        try {
            /**
             * @noinspection PhpDeprecationInspection
             */
            $this->getEntityManager()->getConnection()->prepare($sql)->execute();
        } catch (Throwable $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @return void
     */
    public function truncate(): void
    {
        $sql = sprintf('TRUNCATE TABLE `%s`;', $this->getTableName());

        try {
            /**
             * @noinspection PhpDeprecationInspection
             */
            $this->getEntityManager()->getConnection()->prepare($sql)->execute();
        } catch (Throwable $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->_em->getClassMetadata($this->getEntityName())->getTableName();
    }

    /**
     * @param int[] $ids
     * @return array
     *
     * @psalm-param list<int> $ids
     * @psalm-return list<T>
     */
    public function findByIds(array $ids): array
    {
        if (0 === count($ids)) {
            return [];
        }

        try {
            $identifier = $this->getClassMetadata()->getSingleIdentifierFieldName();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return [];
        }

        return $this->createQueryBuilder('c')
            ->where("c.{$identifier} IN (:ids)")
            ->setParameter('ids', $ids, Connection::PARAM_INT_ARRAY)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return bool
     * @throws DBALException
     */
    public function tableExists(): bool
    {
        $connection = $this->getEntityManager()->getConnection();

        $database = $connection->getDatabase();
        $queryBuilder = $connection->createQueryBuilder();
        $queryBuilder->setMaxResults(1);
        $queryBuilder->select('COUNT(*)');
        $queryBuilder->from('information_schema.tables', 't');
        $queryBuilder->andWhere("table_schema = '{$database}'");
        $queryBuilder->andWhere("table_name = '{$this->getTableName()}'");

        try {
            $query = $connection->prepare($queryBuilder->getSQL());

            /**
             * @noinspection PhpDeprecationInspection
             */
            $query->execute();

            /** @noinspection PhpUndefinedMethodInspection */
            return $query->rowCount() > 0;
        } catch (Throwable $e) {
            $this->logger->error($e);

            return false;
        }
    }

    /**
     * @return mixed
     *
     * @psalm-return T
     */
    public function findOneLast()
    {
        try {
            $identifier = $this->getClassMetadata()->getSingleIdentifierFieldName();

            return $this->createQueryBuilder('a')
                ->orderBy("a.{$identifier}", 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return null;
        }
    }

    /**
     * @return mixed
     *
     * @psalm-return T
     */
    public function findOneFirst()
    {
        try {
            $identifier = $this->getClassMetadata()->getSingleIdentifierFieldName();

            return $this->createQueryBuilder('a')
                ->orderBy("a.{$identifier}", 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return null;
        }
    }

    /**
     * @param int $offset
     * @return mixed
     *
     * @psalm-return T
     */
    public function findOneByOffset(int $offset)
    {
        try {
            $identifier = $this->getClassMetadata()->getSingleIdentifierFieldName();

            return $this->createQueryBuilder('a')
                ->orderBy("a.{$identifier}", 'ASC')
                ->setMaxResults(1)
                ->setFirstResult($offset)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return null;
        }
    }

    /**
     * @param int|null $offset
     * @param int|null $length
     * @return array
     *
     * @psalm-return list<T>
     */
    public function findWithOffsetAndLength(?int $offset = null, ?int $length = null): array
    {
        $qb = $this->createQueryBuilder('a');

        if (null !== $length) {
            $qb->setMaxResults($length);
        }

        if (null !== $offset) {
            $qb->setFirstResult($offset);
        }

        $field = 'sortOrder';
        if (true === $this->getClassMetadata()->hasField($field)) {
            $qb->orderBy("a.$field", 'ASC');
        }

        return $qb->getQuery()->getResult();
    }
}