<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Credissimo\Shop\Application\Manufacture\CreateNewManufactureCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
/**
 * @Route("/admin/manufacture")
 */
class ManufactureController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/", name="manufacture_list")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $manufactureService = $this->get('credissimo.manufacture_query_service');

        return $this->render('@Shop/manufacture/list.html.twig', array(
            'manufactures' => $manufactureService->getManufactures()
        ));
    }

    /**
     * @param Request $request
     *
     * @Route("/add", name="create_manufacture")
     * @return Response
     */
    public function addAction(Request $request)
    {
        $categoryQueryService = $this->get('credissimo.category_query_service');

        $form = $this->createFormBuilder();
        $form->add('name', TextType::class)
            ->add('category', ChoiceType::class, ['choices' => $categoryQueryService->getCategoriesAsOptionList()])
            ->add('Save', SubmitType::class);

        $form = $form->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->createManufacture($form);

            return $this->redirectToRoute('manufacture_list');
        }
        return $this->render('@Shop/entity.html.twig', array(
            'form' => $form->createView(),
            'title' => 'New Manufacture',
            'backUrl' => '/manufacture'
        ));
    }

    private function createManufacture($form)
    {
        $manufactureService = $this->get('credissimo.manufacture_service');
        $categoryQueryService = $this->get('credissimo.category_query_service');
        $createCommand = new CreateNewManufactureCommand(
            $form->get('name')->getData(),
            $categoryQueryService->getCategory($form->get('category')->getData())
        );
        $manufactureService->create($createCommand);
    }
}
