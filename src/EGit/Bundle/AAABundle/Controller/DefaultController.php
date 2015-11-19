<?php
namespace EGit\Bundle\AAABundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EGit\Bundle\AAABundle\Entity\Car;
use Doctrine\Common\Collections\Criteria;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('EGitAAABundle:Default:index.html.twig', array(
            'autos' => $this->get('e_git_aaa.auto')
                ->getList(60, 0)
        ));
    }

    public function detailAction()
    {
        $auto = $this->get('e_git_aaa.auto')->getDetail($this->getRequest()
            ->get('id'));
        
        $expr = Criteria::expr();
        $criteria = Criteria::create();
        
        /**
         * Price +-20%
         */
        $aroundPrice = $auto->getPrice() / 100 * 20;
        $criteria->where($expr->gt('price', $auto->getPrice() - $aroundPrice));
        $criteria->andWhere($expr->lt('price', $auto->getPrice() + $aroundPrice));
        
        /**
         * Year -+2
         */
        $year = $auto->getYear();
        $aroundYear = 2;
        $criteria->andWhere($expr->gt('year', $auto->getYear() - $aroundYear));
        $criteria->andWhere($expr->lt('year', $auto->getYear() + $aroundYear));
        
        $recommendedCars = $this->get('e_git_aaa.recommended_auto')->getRecomended($criteria);
        
        return $this->render('EGitAAABundle:Default:detail.html.twig', array(
            'auto' => $auto,
            'recomendedCars' => $recommendedCars
        ));
    }

    /**
     * Temp data fullfill
     *
     * @return string
     */
    public function fullfillAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $body = array(
            'Hatchback',
            'Combi',
            'Sedan'
        );
        $make = array(
            'Opel',
            'Škoda',
            'Toyota',
            'Ford'
        );
        $model = array(
            'Auris',
            'Focus',
            'Octavia'
        );
        for ($i = 0; $i <= 10000; $i ++) {
            
            $c = new Car();
            
            $c->setBodytype($body[rand(0, 2)]);
            $c->setClock(rand(0, 500000));
            $c->setEngine(rand(1, 2) . "." . rand(0, 10));
            $c->setMake($make[rand(0, 3)]);
            $c->setModel($model[rand(0, 2)]);
            $c->setPrice(rand(100000, 2000000));
            $c->setYear(rand(1967, 2015));
            
            $em->persist($c);
            $em->flush();
        }
        return "";
    }
}
