-- ------------------------------------------
-- Create the base schema for the datbase
-- ------------------------------------------

-- ------------------------------------------
-- Create table for 'employees'
-- ------------------------------------------
CREATE TABLE IF NOT EXISTS employees (
	user_name VARCHAR(25) NOT NULL UNIQUE,
	first_name VARCHAR(25),
	last_name VARCHAR(25),
	admin_rights BOOLEAN NOT NULL, 
	password VARCHAR(25), 
	user_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	project_id INT,
	department_id INT,
	PRIMARY KEY (user_id)
);

-- ------------------------------------------
-- Create table for 'suppliers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS suppliers (
	supplier_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	supplier_name VARCHAR(25),
	location_id INT NOT NULL,
	product_type VARCHAR(25),
	contact_name VARCHAR(25),
	phone_number VARCHAR(30),
	PRIMARY KEY (supplier_id)
);

-- ------------------------------------------
-- Create table for 'inventory'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS inventory (
	inventory_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	inventory_type VARCHAR(30),
	category VARCHAR(30),
	supplier_id INT NOT NULL,
	project_id INT,
	location_id INT NOT NULL,
	number_of INT NOT NULL,
	PRIMARY KEY (inventory_id)
);

-- ------------------------------------------
-- Create table for 'locations'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS locations (
	location_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	location_name VARCHAR(30),
	location_type VARCHAR(30),
	address VARCHAR(30),
	city VARCHAR(30),
	state VARCHAR(30),
	zip INT,
	PRIMARY KEY (location_id)
);

-- ------------------------------------------
-- Create table for 'projects'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS projects (
	project_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	project_name VARCHAR(30),
	customer_id INT,
	project_type VARCHAR(30),
	location_id INT,
	PRIMARY KEY (project_id)
);

-- ------------------------------------------
-- Create table for 'customers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS customers (
	customer_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	customer_name VARCHAR(30),
	contact VARCHAR(30),
	location_id INT,
	PRIMARY KEY (customer_id)
);

-- ------------------------------------------
-- Create table for 'departments'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS departments (
	department_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	department_name VARCHAR(30),
	dept_manager_id INT,
	PRIMARY KEY (department_id)
);
-- ------------------------------------------
-- Add foreign key relations
-- ------------------------------------------

ALTER TABLE employees ADD FOREIGN KEY (project_id) REFERENCES projects(project_id);
ALTER TABLE employees ADD FOREIGN KEY (department_id) REFERENCES departments(department_id);
ALTER TABLE suppliers ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE inventory ADD FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id);
ALTER TABLE inventory ADD FOREIGN KEY (project_id) REFERENCES projects(project_id);
ALTER TABLE projects ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE projects ADD FOREIGN KEY (customer_id) REFERENCES customers(customer_id);
ALTER TABLE customers ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE departments ADD FOREIGN KEY (dept_manager_id) REFERENCES employees(user_id);
