<?php
namespace App\Controller;

use App\Service\HasherService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HasherServiceController extends AbstractController
{
    /**
     * @Route("/hasher")
     */
    public function index(HasherService $hasherService)
    {
        $soapServer = new \SoapServer('/home/gunarspujats/public_html/soap_server/src/WSDL/hasher.wsdl');
        $soapServer->setObject($hasherService);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }
}
