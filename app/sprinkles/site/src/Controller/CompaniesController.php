<?php

namespace UserFrosting\Sprinkle\Site\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Site\Database\Models\Company;
use UserFrosting\Sprinkle\Core\Facades\Debug;

class CompaniesController extends SimpleController
{
    public function pageList(Request $request, Response $response, $args)
    {   
        $companies = Company::all();
        return $this->ci->view->render($response, 'pages/companies.html.twig', [
            'companies' => $companies
        ]);
    }

    public function showCompany(Request $request, Response $response, $args)
    {
        $company = Company::all();
        return $this->ci->view->render($response, 'pages/companies.html.twig', [
            'companies' => $companies
        ]);
    }

    public function create(Request $request, Response $response, $args)
    {
       
    }

    public function delete(Request $request, Response $response, $args)
    {
       
    }

    public function update(Request $request, Response $response, $args)
    {
       
    }


}