# Exercise with UserFrosting 

### Two Tables
 Companies -> | Company name | email | logo | website | 

Employees -> | First name | Last name | Email | Phone number | 


### CRUD for both 
### Prevent users to register

## Few screenshots

### List of companies
![List of companies](screenshots/list_companies.png)

### Company page 
![Company page](screenshots/show_company.png)

### Add/Create company
![Add/Create company](screenshots/add_company.png)

### Edit company
![Edit company](screenshots/edit_company.png)

### List of employees
![List of employees](screenshots/list_employees.png)

### Employee page 
![Employee page](screenshots/show_employee.png)

### Add/Create employee
![Add/Create employee](screenshots/add_employee.png)

### Edit employee
![Edit employee](screenshots/edit_employee.png)

## Installation

Clone the repositery 

In terminal enter the following command lines:
```
  docker-compose build --no-cache
  docker-compose up -d
  docker-compose exec app sh -c "composer update"
  docker-compose exec app sh -c "php bakery bake"
```
run migrations and seed:
```
  php bakery migrate
  php bakery seed DefaultCompanies DefaultEmployees
```
Account to connect : 
* email : dnr94110@gmail.com  
* password : azertyui
