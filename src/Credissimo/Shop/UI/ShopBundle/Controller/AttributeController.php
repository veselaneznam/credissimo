<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\Attribute\CreateNewAttributeCommand;
use Credissimo\Shop\UI\ShopBundle\Form\AttributeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin/attribute")
 */
class AttributeController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/", name="attribute_list")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $attributeQueryService = $this->get('credissimo.attribute_query_service');

        return $this->render('@Shop/attribute/list.html.twig', array(
            'attributes' => $attributeQueryService->getAttributes()
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/add", name="create_attribute")
     * @return Response
     */
    public function addAction(Request $request)
    {
        $categoryQueryService = $this->get('credissimo.category_query_service');

        $form = $this->createForm(new AttributeType($categoryQueryService->getCategoriesAsOptionList()));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->createAttribute($form);

            return $this->redirectToRoute('attribute_list');
        }

        return $this->render('@Shop/entity.html.twig', array(
            'form' => $form->createView(),
            'title' => 'New Attribute',
            'backUrl' => '/attribute'
        ));
    }

    private function createAttribute($form)
    {
        $attributeService = $this->get('credissimo.attribute_service');
        $categoryQueryService = $this->get('credissimo.category_query_service');
        $createCommand = new CreateNewAttributeCommand(
            $form->get('name')->getData(),
            $form->get('label')->getData(),
            $form->get('type')->getData(),
            $categoryQueryService->getCategory($form->get('category')->getData())
        );
        $attributeService->create($createCommand);
    }
}
