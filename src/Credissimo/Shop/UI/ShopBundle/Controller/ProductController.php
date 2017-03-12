<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\Manufacture\ManufactureQueryService;
use Credissimo\Shop\Application\Product\ActivateProductCommand;
use Credissimo\Shop\Application\Product\CreateNewProductCommand;
use Credissimo\Shop\Application\Product\DeleteProductCommand;
use Credissimo\Shop\Application\Product\ProductQueryService;
use Credissimo\Shop\Application\Product\ProductRepresentation;
use Credissimo\Shop\Application\Product\UpdateProductCommand;
use Credissimo\Shop\UI\ShopBundle\Form\ProductSearchType;
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
     * @Route("", name="homepage")
     * @Method({"GET", "POST"})
     * @return Response
     */
    public function indexAction(Request $request)
    {
        /**
         * @var ProductQueryService $productService
         */
        $productService = $this->get('credissimo.product_query_service');

        $products = $productService->getProducts();

        $searchForm = $this->createSearchForm();
        if ($request->getMethod() == 'POST') {
            $searchForm->handleRequest($request);
            $products = $productService->search($searchForm->getData());
        }

        return $this->render('@Shop/product/list.html.twig', array(
            'products' => $products,
            'title' => "Product List",
            'searchForm' => $searchForm->createView()
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/delete/list", name="deleted_product_list")
     * @return Response
     */
    public function deletedProductListAction(Request $request)
    {
        /**
         * @var ProductQueryService $productService
         */
        $productService = $this->get('credissimo.product_query_service');

        $products = $productService->getDeletedProducts();

        $searchForm = $this->createSearchForm();
        if ($request->getMethod() == 'POST') {
            $searchForm->handleRequest($request);
            $products = $productService->search($searchForm->getData());
        }

        return $this->render('@Shop/product/list.html.twig', array(
            'products' => $products,
            'title' => "Deleted Product List",
            'searchForm' => $searchForm->createView()
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

        $productForm = $this->createForm(new ProductType($manufactureList, new ProductRepresentation()));

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
        $productRepresentation = new ProductRepresentation($product);
        $manufactureList = $manufactureService->getManufacturesAsOptionList();

        $productForm = $this->createForm(
            new ProductType(
                $manufactureList,
                $productRepresentation,
                $attributeQueryService->getAttributesByCategory($product->getManufacture()->getCategory())
            )
        );

        $productForm->handleRequest($request);

        if ($productForm->isSubmitted() && $productForm->isValid()) {

            $this->updateProduct($productRepresentation, $productForm, $manufactureService, $product->getId());

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
     * @Route("/activate/{id}", name="activate_product")
     * @Method({"GET", "POST"})
     *
     * @return JsonResponse|RedirectResponse
     */
    public function activateAction(Request $request, $id)
    {
        $productQueryService = $this->get('credissimo.product_query_service');
        $product = $productQueryService->getProduct($id);

        $form = $this->createActivateForm($product->getId());
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $productService = $this->get('credissimo.product_service');

                $productService->activate(new ActivateProductCommand($product));

                $response['success'] = true;
                $response['message'] = 'Activated Successfully!';
            } else {
                $response['success'] = false;
                $response['message'] = 'Sorry category could not be activated!';
            }

            $this->addFlash('notice', 'Activate Successfully!');
            return $this->redirectToRoute('deleted_product_list');
        }

        return $this->render('@Shop/product/activate.html.twig', array(
            'activate_form' => $form->createView(),
            'product' => $product
        ));
    }

    /**
     * @param Form                    $productForm
     * @param ManufactureQueryService $manufactureService
     */
    private function createProduct(Form $productForm, $manufactureService)
    {
        $attributeQueryService = $this->get('credissimo.attribute_query_service');
        $manufacture = $manufactureService->getManufacture($productForm->get('manufacture')->getData());
        $productService = $this->get('credissimo.product_service');
        $attributes = $attributeQueryService->getAttributesByCategory($manufacture->convertToDomain()->getCategory());

        $productCreate = new CreateNewProductCommand(
            $productForm->getData(),
            $manufacture,
            $attributes,
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

    /**
     * @return Form
     */
    private function createSearchForm()
    {
        $manufactureService = $this->get('credissimo.manufacture_query_service');
        $categoryService = $this->get('credissimo.category_query_service');
        return $this->createForm(
            new ProductSearchType(
                $manufactureService->getManufacturesAsOptionList(),
                $categoryService->getCategoriesAsOptionList()
            )
        );
    }

    /**
     * @param ProductRepresentation   $productRepresentation
     * @param Form                    $productForm
     * @param ManufactureQueryService $manufactureService
     * @param                         $productId
     */
    private function updateProduct(
        ProductRepresentation $productRepresentation,
        Form $productForm,
        ManufactureQueryService $manufactureService,
        $productId
    ) {
        $attributeQueryService = $this->get('credissimo.attribute_query_service');
        $manufacture = $manufactureService->getManufacture($productForm->get('manufacture')->getData());

        $attributes = $attributeQueryService->getAttributesByCategory($manufacture->getCategory());
        $productService = $this->get('credissimo.product_service');

        $description = $productService->transformToDescription($attributes, $productForm->getData());
        $productRepresentation
            ->setId($productId)
            ->setManufacture($manufacture)
            ->setCategory($manufacture->getCategory())
            ->setName($productForm->get('name')->getData())
            ->setModel($productForm->get('model')->getData())
            ->setDescription($description)
            ->setPrice($productForm->get('price')->getData())
            ->setSlug($productForm->get('slug')->getData())
            ->setYearOfManufacture($productForm->get('yearOfManufacture')->getData())
            ->setStatus($productForm->get('status')->getData())
            ->setProductImages([]);

        $updateProductCommand = new UpdateProductCommand($productRepresentation);

        $productService->update($updateProductCommand);
    }

    private function createActivateForm($getId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activate_product', array('id' => $getId)))
            ->setMethod('POST')
            ->getForm();
    }
}
