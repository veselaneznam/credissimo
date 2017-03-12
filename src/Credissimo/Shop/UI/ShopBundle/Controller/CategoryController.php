<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\Category\CreateCategoryCommand;
use Credissimo\Shop\UI\ShopBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin/category")
 */
class CategoryController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/", name="category_list")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $categoryQueryService = $this->get('credissimo.category_query_service');

        return $this->render('@Shop/category/list.html.twig', array(
            'categories' => $categoryQueryService->getCategories()
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/add", name="create_category")
     * @return Response
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new CategoryType());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->createCategory($form);

            return $this->redirectToRoute('category_list');
        }

        return $this->render('@Shop/entity.html.twig', array(
            'form' => $form->createView(),
            'title' => 'New Category',
            'backUrl' => '/admin/category'
        ));
    }

    /**
     * @param $form
     */
    private function createCategory($form)
    {
        $categoryService = $this->get('credissimo.category_service');
        $createCommand = new CreateCategoryCommand(
            $form->get('name')->getData()
        );
        $categoryService->create($createCommand);
    }
}
