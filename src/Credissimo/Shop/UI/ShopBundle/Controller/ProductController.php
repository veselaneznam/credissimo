<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\Product\ProductQueryService;
use Credissimo\Shop\UI\ShopBundle\Form\ProductFormHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/product", name="homepage")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        /**
         * @var ProductQueryService $productService
         */
        $productService = $this->get('credissimo.product_query_service');

        $products = $productService->getProducts();

        return $this->render('@Shop/product/list.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/product/add", name="create_product")
     * @return Response
     */
    public function addAction(Request $request)
    {
        $manufactureService = $this->get('credissimo.manufacture_query_service');
        $manufacterList = $manufactureService->getManufacturesAsOptionList();

        $productForm = ProductFormHelper::createForm($this->createFormBuilder(), $manufacterList);

        $productForm->handleRequest($request);

        if ($productForm->isSubmitted() && $productForm->isValid()) {

            $data = $productForm->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            return $this->redirectToRoute('homepage');
        }


        return $this->render('@Shop/product/product.html.twig', array(
            'form' => $productForm->createView()
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/product/edit/{id}", name="homepage")
     * @return Response
     */
    public function editAction(Request $request)
    {
        /**
         * @var ProductQueryService $productService
         */
        $productService = $this->get('credissimo.product_query_service');

        $products = $productService->getProducts();

        return $this->render('@Shop/product/list.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/product/delete/{id}", name="homepage")
     * @return Response
     */
    public function deleteAction(Request $request)
    {
        /**
         * @var ProductQueryService $productService
         */
        $productService = $this->get('credissimo.product_query_service');

        $products = $productService->getProducts();

        return $this->render('@Shop/product/list.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/product/view/{id}", name="homepage")
     * @return Response
     */
    public function viewAction(Request $request)
    {
        /**
         * @var ProductQueryService $productService
         */
        $productService = $this->get('credissimo.product_query_service');

        $products = $productService->getProducts();

        return $this->render('@Shop/product/list.html.twig', array(
            'products' => $products
        ));
    }
}
