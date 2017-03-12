<?php

namespace Credissimo\Shop\UI\ShopBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/", name="home")
     * @return Response
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('login'));
    }
}
