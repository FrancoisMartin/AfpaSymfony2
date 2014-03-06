<?php

namespace Afpa\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Afpa\CatalogBundle\Entity\Product;
use Afpa\CatalogBundle\Form\ProductType;

class CatalogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AfpaCatalogBundle:Product');
        $products = $repository->findBy(array(), array('created' => 'desc'), 12, 0);
		$brand = $products[0]->getBrand();


		$title = $brand->getTitle();

        return $this->render('AfpaCatalogBundle:Catalog:index.html.twig', array('products' => $products));
    }

    public function displayAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AfpaCatalogBundle:Product');
        $products = $repository->findBy(array(), array('created' => 'desc'));

        return $this->render('AfpaCatalogBundle:Catalog:all.html.twig', array('products' => $products));
    }

    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $category_repo = $em->getRepository('AfpaCatalogBundle:Category');
        $category = $category_repo->find($id);
        $product_repo = $em->getRepository('AfpaCatalogBundle:Product');
        $products = $product_repo->searchByCategory($category);
        
        return $this->render('AfpaCatalogBundle:Catalog:category.html.twig', array('category' => $category, 'products' => $products));
    }

    public function brandAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product_repo = $em->getRepository('AfpaCatalogBundle:Product');
        $products = $product_repo->findBy(array('brand' => $id), array('created' => 'desc'));
        
        $brand_repo = $em->getRepository('AfpaCatalogBundle:Brand');
        $brand = $brand_repo->find($id);
   
        return $this->render('AfpaCatalogBundle:Catalog:category.html.twig', array('category' => $brand, 'products' => $products));
    }

    public function displayProductAction($id, $_format)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AfpaCatalogBundle:Product');
        $product = $repository->find($id);

        if($product == null) {
            throw $this->createNotFoundException('Article inexistant.');
        }

        switch ($_format) {
        	case 'json':
        		return new Response(json_encode($product));
        		break;
        	
        	default:
        		return $this->render('AfpaCatalogBundle:Catalog:product.html.twig', array('product' => $product));
        		break;
        }
    }

    public function addProductAction()
    {
        $request = $this->getRequest();
		$product = new Product();

        $form = $this->createForm(new ProductType(), $product);
		$form->handleRequest($request);

		if($form->isValid())
		{
			$product->setCreated(new \DateTime());
			$em = $this->getDoctrine()->getManager();
			$em->persist($product);
			$em->flush();
		}

		return $this->render('AfpaCatalogBundle:Catalog:addProduct.html.twig', array('formulaire' => $form->createView()));
	}
    
    public function editProductAction($id)
    {
        return $this->render('AfpaCatalogBundle:Catalog:product.html.twig', array('id' => $id));
    }

    public function deleteProductAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getManager()->find('AfpaCatalogBundle:Product', $id);

        $em->remove($product);
        $em->flush();

        return new Response('Produit '.$id.' supprimé');
    }

    public function deleteBrandAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $brand = $this->getDoctrine()->getManager()->find('AfpaCatalogBundle:Brand', $id);

        $em->remove($brand);
        $em->flush();

        return new Response('Marque '.$id.' supprimé');
    }

    public function displayConvertAction($devise, $montant)
    {
        $convert = $this->get('afpa_catalog.convert');

        switch ($devise) {
            case 'euro':
                $convert->convertEuroToDollar($montant);
                break;
            
            default:
                $convert->convertDollarToEuro($montant);
                break;
        }
        return new Response("La conversion a été envoyé par email.");
    }
}