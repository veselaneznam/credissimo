<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\Manufacture\ManufactureQueryService;
use Credissimo\Shop\Application\Product\CreateNewProductCommand;
use Credissimo\Shop\Application\Product\DeleteProductCommand;
use Credissimo\Shop\Application\Product\ProductQueryService;

;
use Credissimo\Shop\Application\Product\ProductRepresentation;
use Credissimo\Shop\UI\ShopBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/", name="homepage")
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
     * @Route("/add", name="create_product")
     * @return Response
     */
    public function addAction(Request $request)
    {
        $manufactureService = $this->get('credissimo.manufacture_query_service');
        $manufactureList = $manufactureService->getManufacturesAsOptionList();

        $productForm = $this->createForm(new ProductType($manufactureList));

        $productForm->handleRequest($request);

        if ($productForm->isSubmitted() && $productForm->isValid()) {

            $this->createProduct($productForm, $manufactureService);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('@Shop/entity.html.twig', array(
            'form' => $productForm->createView(),
            'title' => 'New Product',
            'backUrl' => '/product'
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/edit/{id}", name="edit_product")
     * @return Response
     */
    public function editAction(Request $request, $id)
    {
        $manufactureService = $this->get('credissimo.manufacture_query_service');
        $productQueryService = $this->get('credissimo.product_query_service');
        $attributeQueryService = $this->get('credissimo.attribute_query_service');

        $product = $productQueryService->getProduct($id);

        $manufactureList = $manufactureService->getManufacturesAsOptionList();

        $productForm = $this->createForm(
            new ProductType(
                $manufactureList,
                new ProductRepresentation($product),
                $attributeQueryService->getAttributesByCategory($product->getManufacture()->getCategory())
            )
        );

        $productForm->handleRequest($request);

        if ($productForm->isSubmitted() && $productForm->isValid()) {

            $this->createProduct($productForm, $manufactureService);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('@Shop/entity.html.twig', array(
            'form' => $productForm->createView(),
            'title' => 'Edit Product',
            'backUrl' => '/product'
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/delete/{id}", name="delete_product")
     * @Method({"GET", "DELETE"})
     *
     * @return JsonResponse|RedirectResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $productQueryService = $this->get('credissimo.product_query_service');
        $product = $productQueryService->getProduct($id);

        $form = $this->createDeleteForm($product->getId());
        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $productService = $this->get('credissimo.product_service');

                $productService->delete(new DeleteProductCommand($product));

                $response['success'] = true;
                $response['message'] = 'Deleted Successfully!';
            } else {
                $response['success'] = false;
                $response['message'] = 'Sorry category could not be deleted!';
            }

            $this->addFlash('notice', 'Deleted Successfully!');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('@Shop/product/delete.html.twig', array(
            'delete_form' => $form->createView(),
            'product' => $product
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/view/{id}", name="view_product")
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

    /**
     * @param Form                    $productForm
     * @param ManufactureQueryService $manufactureService
     */
    protected function createProduct(Form $productForm, $manufactureService)
    {
        $attributeQueryService = $this->get('credissimo.attribute_query_service');
        $manufacture = $manufactureService->getManufacture($productForm->get('manufacture')->getData());
        $productService = $this->get('credissimo.product_service');
        $attributes = $attributeQueryService->getAttributesByCategory($manufacture->getCategory());

        $description = $productService->transformToDescription($attributes, $productForm->getData());
        $productCreate = new CreateNewProductCommand(
            $productForm->get('name')->getData(),
            $productForm->get('slug')->getData(),
            $description,
            [],
            $manufacture,
            $productForm->get('model')->getData(),
            $productForm->get('yearOfManufacture')->getData(),
            $productForm->get('price')->getData(),
            $this->getUser()
        );

        $productService->create($productCreate);
    }

    /**
     * @param $productId
     *
     * @return Form
     */
    private function createDeleteForm($productId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete_product', array('id' => $productId)))
            ->setMethod('DELETE')
            ->getForm();
    }
}
