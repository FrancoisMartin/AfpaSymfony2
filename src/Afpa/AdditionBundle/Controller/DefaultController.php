<?php

namespace Afpa\AdditionBundle\Controller;

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

        return $this->redirect($this->generateUrl('afpa_addition_result', array('result' => $result)));
    }

    public function resultAction($result)
    {
    	return new Response("Le resultat est : ".$result);
    }
}
