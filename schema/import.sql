-- ------------------------------------------
-- Create the base schema for the datbase
-- ------------------------------------------

-- ------------------------------------------
-- Create table for 'employees'
-- ------------------------------------------
CREATE TABLE IF NOT EXISTS employee (
	employee_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	user_name VARCHAR(40) NOT NULL UNIQUE,
	first_name VARCHAR(40),
	last_name VARCHAR(40),
	admin_rights BOOLEAN NOT NULL DEFAULT False,
	user_pass VARCHAR(40),
	phone VARCHAR(40),
	user_address VARCHAR(40),
	emp_project_name VARCHAR(40),
	emp_department_name VARCHAR(40),
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (user_name, employee_id)
);

-- ------------------------------------------
-- Create table for 'suppliers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS supplier (
	supplier_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	supplier_name VARCHAR(40) UNIQUE NOT NULL,
	supplier_location_name VARCHAR(40),
	product_type VARCHAR(40),
	contact_name VARCHAR(40),
	phone_number VARCHAR(40),
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (supplier_id, supplier_name)
);

-- ------------------------------------------
-- Create table for 'inventory'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS inventory (
	inventory_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	inventory_type VARCHAR(40) UNIQUE NOT NULL,
	category VARCHAR(40),
	number_of INT NOT NULL,
	inv_supplier_name VARCHAR(40),
	inv_location_name VARCHAR(40),
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (inventory_id, inventory_type)
);

-- ------------------------------------------
-- Create table for 'locations'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS location (
	location_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	location_name VARCHAR(40) UNIQUE NOT NULL,
	location_type VARCHAR(40),
	location_address VARCHAR(40),
	city VARCHAR(40),
	location_state VARCHAR(40),
	zip INT,
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (location_id, location_name)
);

-- ------------------------------------------
-- Create table for 'projects'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS project (
	project_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	project_name VARCHAR(40) UNIQUE NOT NULL,
	project_customer_name VARCHAR(40),
	project_type VARCHAR(40),
	project_location_name VARCHAR(40),
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (project_name, project_id)
);

-- ------------------------------------------
-- Create table for 'customers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS customer (
	customer_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	customer_name VARCHAR(40) UNIQUE NOT NULL,
	contact_name VARCHAR(40),
	contact_number VARCHAR(40),
	customer_location_name VARCHAR(40),
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (customer_id, customer_name)
);

-- ------------------------------------------
-- Create table for 'departments'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS department (
	department_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	department_name VARCHAR(40) UNIQUE,
	department_manager_name VARCHAR(40),
	last_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (department_id, department_name)
);
-- ------------------------------------------
-- Add foreign key relations
-- ------------------------------------------

ALTER TABLE employee ADD FOREIGN KEY (emp_project_name) REFERENCES project(project_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE employee ADD FOREIGN KEY (emp_department_name) REFERENCES department(department_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE supplier ADD FOREIGN KEY (supplier_location_name) REFERENCES location(location_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE inventory ADD FOREIGN KEY (inv_supplier_name) REFERENCES supplier(supplier_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE inventory ADD FOREIGN KEY (inv_location_name) REFERENCES location(location_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE project ADD FOREIGN KEY (project_location_name) REFERENCES location(location_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE project ADD FOREIGN KEY (project_customer_name) REFERENCES customer(customer_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE customer ADD FOREIGN KEY (customer_location_name) REFERENCES location(location_name) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE department ADD FOREIGN KEY (department_manager_name) REFERENCES employee(user_name) ON UPDATE CASCADE ON DELETE SET NULL;
