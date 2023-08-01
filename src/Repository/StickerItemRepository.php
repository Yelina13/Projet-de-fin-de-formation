<?php

namespace App\Repository;

use App\Entity\StickerItem;
use App\Entity\Sticker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StickerItem>
 *
 * @method StickerItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method StickerItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method StickerItem[]    findAll()
 * @method StickerItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StickerItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StickerItem::class);
    }

    public function add(StickerItem $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StickerItem $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

// Creating a function to sort items by name, asked by frontend, so it's easier to use them in the API

    public function findAllAsc()
    {
        return $this->findBy(array(), array('name' => 'ASC'));
    }

//    /**
//     * @return StickerItem[] Returns an array of StickerItem objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StickerItem
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
