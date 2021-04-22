<?php

namespace UserFrosting\Sprinkle\Site\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Site\Database\Models\Company;
use UserFrosting\Sprinkle\Site\Database\Models\Employee;

use UserFrosting\Sprinkle\Core\Facades\Debug;
use Slim\Route;
use  \UserFrosting\Sprinkle\Core\Alert\AlertStream;

class EmployeesController extends SimpleController
{
    public function pageList(Request $request, Response $response, $args)
    {   
        $employees = Employee::where('company_id', $args[company_name]);
        Debug::debug('////employees////');
        Debug::debug($args[company_name]);
        return $this->ci->view->render($response, 'pages/employees.html.twig', [
            'employees' => $employees
        ]);
    }

    public function showCompany(Request $request, Response $response, $args)
    {
       
    }

    public function createCompany(Request $request, Response $response, $args = [])
    {   
        
    }

    public function deleteCompany(Request $request, Response $response, $args)
    {
       
    }

    public function edit(Request $request, Response $response, $args)
    {
       
    }

    public function update(Request $request, Response $response, $args)
    {
        
    }


}