<?php
namespace App\Controller;

use App\Service\DateInfoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DateInfoServiceController extends AbstractController
{
    /**
     * @Route("/dateinfo")
     */
    public function index(DateInfoService $dateInfoService)
    {
        $soapServer = new \SoapServer('/home/gunarspujats/public_html/soap_server/src/WSDL/dateinfowsdl.xml');
        $soapServer->setObject($dateInfoService);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }
}
