<?php

namespace MainBundle\Repository;

/**
 * LangueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LangueRepository extends \Doctrine\ORM\EntityRepository
{
    public function languesParlees()
    {
        $query=$this->getEntityManager()->createQuery("
                  SELECT l.libelle,COUNT(lu.idUser) AS NB FROM MainBundle:UserLangue lu, MainBundle:Langue l 
                  WHERE l.id=lu.idLangue GROUP BY lu.idLangue ORDER BY NB DESC")->setMaxResults(3);
        return $query->execute();
    }
    public function findByLibelle($libelle)
    {
        $query=$this->getEntityManager()->createQuery("
            SELECT count(l.libelle) FROM MainBundle:Langue l where upper(l.libelle) = :libelle");
        $query->setParameter(":libelle",strtoupper($libelle));
        return $query->execute();
    }
}
