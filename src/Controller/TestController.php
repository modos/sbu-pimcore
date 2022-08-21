<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    /**
     * @Template
     *
     * @param Request $request
     *
     * @return array
     */
    public function defaultAction(Request $request)
    {
        
        return [];
    }

    public function number(string $id): Response
    {
        return new Response($id);
    }
}