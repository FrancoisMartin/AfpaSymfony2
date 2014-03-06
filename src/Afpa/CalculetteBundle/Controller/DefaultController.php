<?php

namespace Afpa\CalculetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function calculAction($a, $b)
    {
    	$request = $this->getRequest();
    	$operateur = $request->query->get('operateur');

        switch ($operateur) {
        	case 'addition':
        		$result = $a + $b;
        		break;

        	case 'soustraction':
        		$result = $a - $b;
        		break;
        	
        	case 'division':
        		$result = $a / $b;
        		break;

        	case 'multiplication':
        		$result = $a * $b;
        		break;
        	
        	default:
        		$result = $a + $b;
        		break;
        }

        return $this->redirect($this->generateUrl('afpa_calculette_result', array('result' => $result)));
    }

    public function resultAction($result)
    {
    	return $this->render('AfpaCalculetteBundle:Default:result.html.twig', array('result' => $result));
    }

    public function fibonacciAction($number)
    {
        $fib = $this->get('fibonacci');
        $result = $fib->get($number);
        return $this->render('AfpaCalculetteBundle:Default:result.html.twig', array('result' => $result));
    }
}
