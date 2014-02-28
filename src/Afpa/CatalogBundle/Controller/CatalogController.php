<?php

namespace Afpa\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    public function indexAction()
    {

        return $this->render('AfpaCatalogBundle:Catalog:index.html.twig', array('name' => 'World'));
    }

    public function categoryAction($id)
    {
        return new Response("<html><body>Affichage des produits de la categorie</body></html>");
    }

    public function displayProductAction($id, $_format)
    {
        switch ($_format) {
        	case 'json':
        		return new Response(json_encode(array('id' => $id)));
        		break;
        	
        	default:
        		
        		return $this->render('AfpaCatalogBundle:Catalog:product.html.twig', array('id' => $id));
        		break;
        }
    }

    public function addProductAction()
    {
        return new Response("Ajout d'un produit");
    }

    public function editProductAction($id)
    {
        return new Response("Edit du produit : ".$id);
    }

    public function deleteProductAction($id)
    {
        return new Response("Delete du produit : ".$id);
    }

}


/*
        $mailer = $this->get('mailer');
        $request = $this->getRequest();
        $lang= $request->getPreferredLanguage();
        $message = \Swift_Message::newInstance()
                   ->setSubject('Hello')
                  ->setFrom('francoismart1@gmail.com')
                  ->setTo('francoismart1@gmail.com')
                  ->setBody('Ici, le corps du mail.');

        $mailer->send($message);
*/
