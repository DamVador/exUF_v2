<?php

$app->group('/companies/{company_name}', function () {

    $this->get('/employees', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:pageList');

    $this->post('/employees', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:createEmployee');

    $this->get('/employee/{employee_id}/delete', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:deleteEmployee');

    $this->get('/employee/{employee_id}/edit', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:edit');

    $this->post('/employee/{employee_id}/update', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:update');

    $this->get('/employee/{employee_id}', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:showEmployee');

});
$app->group('/employees', function () {

    $this->get('', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:pageFullList');

    $this->get('/{employee_id}/delete', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:delete');

});