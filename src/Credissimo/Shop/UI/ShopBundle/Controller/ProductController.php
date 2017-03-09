<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\ProductQueryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/", name="homepage")
 */
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
     * @Route("/product/add", name="homepage")
     * @return Response
     */
    public function addAction(Request $request)
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
