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
        return $this->ci->view->render($response, 'pages/EmployeesPages/employees.html.twig', [
            'employees' => $employees,
            'company' => $company
        ]);
    }

    public function showEmployee(Request $request, Response $response, $args)
    {
        $employee = Employee::find($args['employee_id']);
        $company = Company::find($args['company_name']);
        return $this->ci->view->render($response, 'pages/EmployeesPages/employee.html.twig', [
            'employee' => $employee,
            'company' => $company
        ]);
    }

    public function createEmployee(Request $request, Response $response, $args = [])
    {   
         $company_id = $request->getParsedBody()['company_id'];
         $id = explode(">", $company_id)[0];//company_id doesnt return just id, it returns all a string from which we can extract id
         $first_name = $request->getParsedBody()['first_name'];
         $first_name_length=strlen($first_name);
         if($first_name_length<1){
              $this->ci->alerts->addMessage('danger', "First name can't be blank", []);
              return $response->withRedirect('/companies/'.$id . '/employees');
         }
         $last_name = $request->getParsedBody()['last_name'];
         $last_name_length=strlen($last_name);
         if($last_name_length<1){
              $this->ci->alerts->addMessage('danger', "Last name can't be blank", []);
              return $response->withRedirect('/companies/'.$id . '/employees');
         }
         $email = $request->getParsedBody()['email'];
         $email_length=strlen($email);
         if(strpos($email, '@') === false){
             $this->ci->alerts->addMessage('danger', 'Wrong email format', []);
             return $response->withRedirect('/companies/'.$id . '/employees');
         }
         $phone_number = $request->getParsedBody()['phone_number'];
         $number_length=strlen($phone_number);
         if($number_length<6){
              $this->ci->alerts->addMessage('danger', 'Phone number must have minimum 6 characters', []);
              return $response->withRedirect('/companies/'.$id . '/employees');
         }
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
        $company = Company::find($args['company_name']);
        return $this->ci->view->render($response, 'pages/EmployeesPages/edit_employee.html.twig', [
            'employee' => $employee,
            'company' => $company
        ]);
    }

    public function update(Request $request, Response $response, $args)
    {
        $first_name = $request->getParsedBody()['first_name'];
        $last_name = $request->getParsedBody()['last_name'];
        $email = $request->getParsedBody()['email'];
        $phone_number = $request->getParsedBody()['phone_number'];
        $company_id = $args['company_name'];
        $id = $args['employee_id'];
        Employee::where('id', $id)->update(['first_name' => $first_name]);
        Employee::where('id', $id)->update(['last_name' => $last_name]);
        Employee::where('id', $id)->update(['email' => $email]);
        Employee::where('id', $id)->update(['phone_number' => $phone_number]);
        $this->ci->alerts->addMessage('success', "Employee's informations updated", [
            ]);
        return $response->withRedirect('/companies/'.$company_id.'/employees');
    }


}