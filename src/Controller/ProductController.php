<?php

namespace App\Controller;

use Pimcore\Model\DataObject;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends FrontendController
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
        return $this->render('products/create.html.twig');
    }

    public function showProductsAction(Request $request)
    {
        $items = new DataObject\Product\Listing();
        $list = array(array());

        $i = 0;

        foreach ($items as $item) {
            $object = DataObject::getByPath($item);
            $list[$i][0] = $object->getName('en');
            $list[$i][1] = "http://localhost" .$object->getThumb();
            $list[$i][2] = $object->getDescription('en');
            $list[$i][3] = $object->getPrice();
            $list[$i][4] = $object->getCategory();
            $i++;
        }
        return $this->render('products/show.html.twig',['items' =>  $list]);
    }

    public function store(Request $request) {
        $parameters = json_decode($request->getContent(), true);
  
        try {
            $bytes = md5(uniqid(rand(), true));
            $product = new DataObject\Product();
            $product->setParentId('12');
            $product->setKey(\Pimcore\Model\Element\Service::getValidKey($bytes, 'object'));
            $product->setDescription($parameters['description']);
            $product->setWidth(new DataObject\Data\QuantityValue($parameters['width'], 4));
            $product->setHeight(new DataObject\Data\QuantityValue($parameters['height'], 4));
            $product->setWeight(new DataObject\Data\QuantityValue($parameters['height'], 2));
            $product->setPrice($parameters['price']);
            $product->setThumb(null);
            $product->setName($parameters['nameen'], 'en');
            $product->setName($parameters['namefa'], 'fa');
            $product->setCategory(null, 'en');
            $product->setCategory(null, 'fa');
            $product->save();
        } catch (\Throwable $th) {
            echo $th;
        }


         $response = new Response();
         $response->headers->set('Content-Type', 'application/json');
         return $response->setContent(json_encode([
            'data' => 123,
        ]));
    }
}
