-- ------------------------------------------
-- Create the base schema for the datbase
-- ------------------------------------------

-- ------------------------------------------
-- Create table for 'employees'
-- ------------------------------------------
CREATE TABLE IF NOT EXISTS employees (
	user_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	user_name VARCHAR(40) NOT NULL UNIQUE,
	first_name VARCHAR(40),
	last_name VARCHAR(40),
	admin_rights BOOLEAN NOT NULL, 
	user_pass VARCHAR(40), 
	phone VARCHAR(40),
	user_address VARCHAR(40),
	emp_project_id INT,
	emp_project_name VARCHAR(40),
	emp_department_id INT,
	emp_department_name VARCHAR(40),
	PRIMARY KEY (user_name, user_id)
);

-- ------------------------------------------
-- Create table for 'suppliers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS suppliers (
	supplier_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	supplier_name VARCHAR(40) NOT NULL,
	supp_location_id INT NOT NULL,
	supp_location_name VARCHAR(40) NOT NULL,
	product_type VARCHAR(40),
	contact_name VARCHAR(40),
	phone_number VARCHAR(40),
	PRIMARY KEY (supplier_id, supplier_name)
);

-- ------------------------------------------
-- Create table for 'inventory'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS inventory (
	inventory_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	inventory_type VARCHAR(40) NOT NULL,
	category VARCHAR(40),
	number_of INT NOT NULL,
	inv_supplier_id INT NOT NULL,
	inv_supplier_name VARCHAR(40) NOT NULL,
	inv_location_name VARCHAR(40) NOT NULL,
	inv_location_id INT NOT NULL,
	PRIMARY KEY (inventory_id, inventory_type)
);

-- ------------------------------------------
-- Create table for 'locations'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS locations (
	location_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	location_name VARCHAR(40) NOT NULL,
	location_type VARCHAR(40),
	loc_address VARCHAR(40),
	city VARCHAR(40),
	loc_state VARCHAR(40),
	zip INT,
	PRIMARY KEY (location_id, location_name)
);

-- ------------------------------------------
-- Create table for 'projects'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS projects (
	project_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	project_name VARCHAR(40) UNIQUE NOT NULL,
	proj_customer_id INT,
	proj_customer_name VARCHAR(40),
	project_type VARCHAR(40),
	proj_location_id INT NOT NULL,
	proj_location_name VARCHAR(40) NOT NULL,
	PRIMARY KEY (project_name, project_id)
);

-- ------------------------------------------
-- Create table for 'customers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS customers (
	customer_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	customer_name VARCHAR(40) NOT NULL,
	contact_name VARCHAR(40),
	contact_number VARCHAR(40),
	cust_location_id INT,
	cust_location_name VARCHAR(40),
	PRIMARY KEY (customer_id, customer_name)
);

-- ------------------------------------------
-- Create table for 'departments'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS departments (
	department_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	department_name VARCHAR(40),
	dept_manager_id INT,
	dept_manager_name VARCHAR(40),
	PRIMARY KEY (department_id, department_name)
);
-- ------------------------------------------
-- Add foreign key relations
-- ------------------------------------------

ALTER TABLE employees ADD FOREIGN KEY (emp_project_id, emp_project_name) REFERENCES projects(project_id, project_name);
ALTER TABLE employees ADD FOREIGN KEY (emp_department_id, emp_department_name) REFERENCES departments(department_id, department_name);
ALTER TABLE suppliers ADD FOREIGN KEY (supp_location_id, supp_location_name) REFERENCES locations(location_id, location_name);
ALTER TABLE inventory ADD FOREIGN KEY (inv_supplier_id, inv_supplier_name) REFERENCES suppliers(supplier_id, supplier_name);
ALTER TABLE inventory ADD FOREIGN KEY (inv_location_id, inv_location_name) REFERENCES locations(location_id, location_name);
ALTER TABLE projects ADD FOREIGN KEY (proj_location_id, proj_location_name) REFERENCES locations(location_id, location_name);
ALTER TABLE projects ADD FOREIGN KEY (proj_customer_id, proj_customer_name) REFERENCES customers(customer_id, customer_name);
ALTER TABLE customers ADD FOREIGN KEY (cust_location_id, cust_location_name) REFERENCES locations(location_id, location_name);
ALTER TABLE departments ADD FOREIGN KEY (dept_manager_id, dept_manager_name) REFERENCES employees(user_id, user_name);
