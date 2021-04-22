<?php

namespace UserFrosting\Sprinkle\Site\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Site\Database\Models\Company;
use UserFrosting\Sprinkle\Core\Facades\Debug;
use Slim\Route;
// use Slim\App;
// use Slim\Http\Environment;

class CompaniesController extends SimpleController
{
    public function pageList(Request $request, Response $response, $args)
    {   
        $companies = Company::all();
       // Debug::debug($companies);
        return $this->ci->view->render($response, 'pages/companies.html.twig', [
            'companies' => $companies
        ]);
    }

    public function showCompany(Request $request, Response $response, $args)
    {
        $company = Company::find($args['company_name']);
        // $company = Company::where('id', $args['company_name'])->get();
        // Debug::debug($company);
        return $this->ci->view->render($response, 'pages/company.html.twig', [
            'company' => $company
        ]);
    }

    public function createCompany(Request $request, Response $response, $args = [])
    {   
        //Debug::debug($request->getParsedBody());
        $company_name = $request->getParsedBody()['company_name'];
        $company_email = $request->getParsedBody()['email'];
        $company_logo = $request->getParsedBody()['logo'];
        $company_website = $request->getParsedBody()['website'];
        $company = new Company(['company_name'=>$company_name,'email'=>'s','logo'=>'t','website'=>'er']);
        $company->save();
        return  $response->withRedirect('/companies');
    }

    public function deleteCompany(Request $request, Response $response, $args)
    {
        $company = Company::find($args['company_name']);
       // Debug::debug($company);
        $company->delete();
        return $response->withRedirect('/companies');
    }

    public function update(Request $request, Response $response, $args)
    {
       
    }


}