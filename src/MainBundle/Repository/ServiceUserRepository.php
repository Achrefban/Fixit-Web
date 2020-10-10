<?php

namespace MainBundle\Repository;


/**
 * ServiceUserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceUserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findServiceUserDQL($id)
    {
        $query=$this->getEntityManager()->createQuery("SELECT m from MainBundle:ServiceUser m WHERE m.idUser=:id")->setParameter('id',$id);

        return $query->getResult();

    }
    public function supprimerServiceUserDQL($id,$ids)
    {
        $query=$this->getEntityManager()->createQuery("DELETE  from MainBundle:ServiceUser m WHERE m.idUser=:id and m.idService=:ids")->setParameter('id',$id)->setParameter('ids',$ids);
        $query->execute();
        //return $query->getResult();

    }
    public function moyennePrix($ids)
    {
        $query=$this->getEntityManager()->createQuery("SELECT AVG(m.prix) as moyenne from MainBundle:ServiceUser m where m.idService=:ids")->setParameter('ids',$ids);
        return $query->getResult();
    }
    public function serviceImage($ids)
    {
        $query=$this->getEntityManager()->createQuery("SELECT m.imageService from MainBundle:Service m where m.id=:ids")->setParameter('ids',$ids);
        return $query->getResult();
    }
    public function serviceCategorie($idc)
    {
        $query=$this->getEntityManager()->createQuery("SELECT m from MainBundle:Service m where m.CategorieService=:ids")->setParameter('ids',$idc);
        return $query->getResult();
    }
}