<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use FFI\Exception;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Category $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Category $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Category[] Returns an array of Category objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    /**
     * @return int|mixed[]|string
     */
    public function getCategory()
    {
        $getCategory = $this->createQueryBuilder($alias = "C")
            ->select($select = 'C.name')
            ->getQuery()
            ->getArrayResult();

        return $getCategory;
    }

    public function newCategory()
    {
        $result = ["success"=>false, "message"=>"İşlem yapılamadı"];
        try {
            $em = $this->getEntityManager();
            $newCategory = new Category();
    
            $newCategory
                ->setName($name = "Oyun");
            $em->persist($newCategory);
            $em->flush();

            $result["success"] = true;
            $result["message"] = "Başarılı bir şekilde kaydedildi";
        }catch (\Exception $exception){
            $result["success"] = false;
            $result["message"] = $exception->getMessage();
        }

        return $result;
    }
    
    /**
     *
     * @param int $id
     * @return array
     */
    public function getShowSingleCategory(int $id)
    {
        $result = ["success"=>false, "message"=>"İşlem yapılamadı", "data"=>[]];
        try {
            $em = $this->getEntityManager();
            $getShowSingleData = $em->find($className = Category::class, $id);

            $result["success"] = true;
            $result["message"] = "Başarılı";
            $result["data"] = $getShowSingleData;
        } catch (\Exception $exception){
            $result["success"] = false;
            $result["message"] = $exception->getMessage();
            $result["data"] = null;
        }

        return $result;
    }

    /**
     *
     * @param integer $id
     * @param array $postData
     * @return array
     */
    public function updateCategory(int $id, array $postData)
    {
        $result = ["success"=>false, "message"=>"İşlem yapılamadı"];
        try {
            $em = $this->getEntityManager();
            $updateCategory = $em->find(Category::class, $id);
            $updateCategory
                ->setName($postData["setName"]);
            $em->persist($updateCategory);
            $em->flush();

            $result["success"] = true;
            $result["message"] = "Başarılı";
        }catch (\Exception $exception){
            $result["success"] = false;
            $result["message"] = $exception->getMessage();
        }

        return $result;
    }



        /**
         *
         * @param integer $id
         * @return void
         */
    public function deleteCategory(int $id)
    {
        $result = ["success"=>false, "message"=>"İşlem yapılamadı"];
        try {
            $em = $this->getEntityManager();
            $find = $em->find(Category::class, $id);

            $em->remove($find);
            $em->flush();

            $result["success"] = true;
            $result["message"] = "Silme Başarılı";
        }catch (\Exception $exception){
            $result["success"] = false;
            $result["message"] = $exception->getMessage();
        }

        return $result;
    }

}
