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
        $employees = Employee::all()->where('company_id', $args[company_name]);
        $company = Company::find($args[company_name]);
        //Debug::debug($employees);
        return $this->ci->view->render($response, 'pages/employees.html.twig', [
            'employees' => $employees,
            'company' => $company
        ]);
    }

    public function showCompany(Request $request, Response $response, $args)
    {
       
    }

    public function createEmployee(Request $request, Response $response, $args = [])
    {   
         $first_name = $request->getParsedBody()['first_name'];
         $last_name = $request->getParsedBody()['last_name'];
         $email = $request->getParsedBody()['email'];
         $phone_number = $request->getParsedBody()['phone_number'];
         $company_id = $request->getParsedBody()['company_id'];
         $id = explode(">", $company_id)[0];//company_id doesnt return just id, it returns all a string from which we can extract id
         $employee = new Employee(['first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone_number'=>$phone_number,'company_id'=>$id]);
         $employee->save();
         $this->ci->alerts->addMessage('success', 'The employee has been added', [
             ]);
         return  $response->withRedirect('/companies/' . $id . '/employees');
    }

    public function deleteEmployee(Request $request, Response $response, $args)
    {
        $employee = Employee::find($args['employee_id']);
        $employee->delete();
        $this->ci->alerts->addMessage('success', 'The employee has been deleted', [
        ]);
        return $response->withRedirect('/companies/'.$args[company_name].'/employees');
    }

    public function edit(Request $request, Response $response, $args)
    {
        $employee = Employee::find($args['employee_id']);
        return $this->ci->view->render($response, 'pages/edit_employee.html.twig', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, Response $response, $args)
    {
        
    }


}