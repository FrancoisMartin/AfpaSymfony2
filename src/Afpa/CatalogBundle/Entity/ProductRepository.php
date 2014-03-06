<?php

namespace Afpa\CatalogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
	public function searchByCategory($category)
	{
			$queryBuilder = $this->createQueryBuilder('p');
			$queryBuilder->innerJoin("p.categories", "c", "WITH", "c=:category")
						 ->setParameter("category", $category)
						 ->orderBy('p.created', 'DESC');

			$query = $queryBuilder->getQuery();
			$result = $query->getResult();
			return $result;
	}
}