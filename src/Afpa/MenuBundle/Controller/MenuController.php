<?php

namespace Afpa\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function displayPrimaryMenuAction()
    {
    	$primary_menu= array(
    					array(
	    					'title' => 'Sport',
	    					'url' => $this->generateUrl('afpa_catalog_category', array('id' => 1)),
	    					'child' => array(
								array('title' => 'Running', 'url' => $this->generateUrl('afpa_catalog_category', array('id' => 2))),
								array('title' => 'Rugby', 'url' => $this->generateUrl('afpa_catalog_category', array('id' => 3))),
								array('title' => 'Foot', 'url' => $this->generateUrl('afpa_catalog_category', array('id' => 4))),
							),
    					),
    					 array(
	    					'title' => 'Marques',
	    					'url' => $this->generateUrl('afpa_catalog_category', array('id' => 5)),
	    					'child' => array(
								array('title' => 'Adidas', 'url' => $this->generateUrl('afpa_catalog_category', array('id' => 6))),
								array('title' => 'Quechua', 'url' => $this->generateUrl('afpa_catalog_category', array('id' => 7))),
								array('title' => 'Puma', 'url' => $this->generateUrl('afpa_catalog_category', array('id' => 8))),
							),
    					),
    				);
        return $this->render('AfpaMenuBundle:Menu:primary_menu.html.twig', array('menu' => $primary_menu));
    }
}
