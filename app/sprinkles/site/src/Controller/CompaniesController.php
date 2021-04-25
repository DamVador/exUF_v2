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
use  \UserFrosting\Sprinkle\Core\Alert\AlertStream;
use UserFrosting\Fortress\RequestSchema;

class CompaniesController extends SimpleController
{
    public function pageList(Request $request, Response $response, $args)
    {   
        $companies = Company::all();
        return $this->ci->view->render($response, 'pages/CompaniesPages/companies.html.twig', [
            'companies' => $companies
        ]);
    }

    public function showCompany(Request $request, Response $response, $args)
    {
        $company = Company::find($args['company_name']);
        return $this->ci->view->render($response, 'pages/CompaniesPages/company.html.twig', [
            'company' => $company
        ]);
    }

    public function createCompany(Request $request, Response $response, $args = [])
    {   
        $schema = new RequestSchema('schema://data.json');

        $company_name = $request->getParsedBody()['company_name'];
        $name_length=strlen($company_name);
        if($name_length<2){
             $this->ci->alerts->addMessage('danger', 'Company Name is too short, minimum 2 characters', []);
             return $response->withRedirect('/companies');
        }
        $company_email = $request->getParsedBody()['email'];
        if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
            $this->ci->alerts->addMessage('danger', 'Invalid mail adress', []);
             return $response->withRedirect('/companies');
          }
        $company_logo = $request->getParsedBody()['logo'];
        $company_website = $request->getParsedBody()['website'];
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$company_website)) {
            $this->ci->alerts->addMessage('danger', 'Invalid url format', []);
             return $response->withRedirect('/companies');
          }
        $company = new Company(['company_name'=>$company_name,'email'=>$company_email,'logo'=>$company_logo,'website'=>$company_website]);
        $company->save();
        $this->ci->alerts->addMessage('success', 'The company has been created', []);
        return  $response->withRedirect('/companies');
    }

    public function deleteCompany(Request $request, Response $response, $args)
    {   
        $company = Company::find($args['company_name']);
        $company->delete();
        $this->ci->alerts->addMessage('success', 'The company has been deleted', []);
        return $response->withRedirect('/companies');
    }

    public function edit(Request $request, Response $response, $args)
    {
        $company = Company::find($args['company_name']);
        return $this->ci->view->render($response, 'pages/CompaniesPages/edit_company.html.twig', [
            'company' => $company
        ]);
    }

    public function update(Request $request, Response $response, $args)
    {
       
        $company_name = $request->getParsedBody()['company_name'];
        $name_length=strlen($company_name);
        if($name_length<2){
             $this->ci->alerts->addMessage('danger', 'Company Name is too short, minimum 2 characters', []);
             return $response->withRedirect('/companies/'.$args['company_name'].'/edit');
        }
        $company_email = $request->getParsedBody()['email'];
        if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
             $this->ci->alerts->addMessage('danger', 'Wrong email format', []);
             return $response->withRedirect('/companies/'.$args['company_name'].'/edit');
        }
        $company_logo = $request->getParsedBody()['logo'];
        $company_website = $request->getParsedBody()['website'];
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$company_website)) {
            $this->ci->alerts->addMessage('danger', 'Invalid url format', []);
            return $response->withRedirect('/companies/'.$args['company_name'].'/edit');
        }
        $id = $args['company_name'];
        Debug::debug($args['company_name']);
        Company::where('id', $id)->update(['company_name' => $company_name]);
        Company::where('id', $id)->update(['email' => $company_email]);
        Company::where('id', $id)->update(['logo' => $company_logo]);
        Company::where('id', $id)->update(['website' => $company_website]);
        $this->ci->alerts->addMessage('success', 'Datas have been updated', []);
        return $response->withRedirect('/companies');
    }


}