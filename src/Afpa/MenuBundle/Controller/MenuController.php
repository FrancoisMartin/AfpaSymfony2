<?php

namespace Afpa\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function displayPrimaryMenuAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $brand_repo = $em->getRepository('AfpaCatalogBundle:Brand');
        $brands = $brand_repo->findAll();

        $category_repo = $em->getRepository('AfpaCatalogBundle:Category');
        $categories = $category_repo->findAll();

        foreach($brands as $brand){
        	$brand_menu[] = array('title' => $brand->getTitle(), 'url' => $this->generateUrl('afpa_catalog_brand', array('id' => $brand->getId())));
    	}       

    	foreach($categories as $category){
        	$category_menu[] = array('title' => $category->getTitle(), 'url' => $this->generateUrl('afpa_catalog_category', array('id' => $category->getId())));
    	}

    	$primary_menu = array(
    					array(
	    					'title' => 'Sport',
	    					'url' => $this->generateUrl('afpa_catalog_category', array('id' => 1)),
	    					'child' => $category_menu
    					),
    					 array(
	    					'title' => 'Marques',
	    					'url' => $this->generateUrl('afpa_catalog_category', array('id' => 5)),
	    					'child' => $brand_menu
    					),
    				);
        return $this->render('AfpaMenuBundle:Menu:primary_menu.html.twig', array('menu' => $primary_menu));
    }
}
