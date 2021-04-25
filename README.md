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
Seeds for companies and employees will run with the migrations.

These command lines might be useful
```
php bakery migrate:status
php bakery migrate:reset
php bakery migrate
```

To change the database informations enter this command line and adapt the different fields :
```
php bakery setup:db --db_driver=mysql --db_name=userfrosting --db_port=3306 --db_host=localhost --db_user=userfrosting --db_password=secret --force
```
And change the same informations inside docker-compose.yml using 'host.docker.internal' as host (for macos)

If you change the database and the docker-compose.yml, don't forget to restart the docker container and to relaunch the migration command lines to be able to use the app.

Go on your localhost (http://localhost:8591/ if you use docker)
