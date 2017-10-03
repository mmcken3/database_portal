-- ------------------------------------------
-- Create the base schema for the datbase
-- ------------------------------------------

-- ------------------------------------------
-- Create table for 'employees'
-- ------------------------------------------
CREATE TABLE IF NOT EXISTS employees (
	user_name VARCHAR(25) NOT NULL UNIQUE PRIMARY KEY,
	first_name VARCHAR(25),
	last_name VARCHAR(25),
	admin_rights BOOLEAN NOT NULL, 
	user_pass VARCHAR(25), 
	user_id INT NOT NULL UNIQUE AUTO_INCREMENT,
	phone VARCHAR(25),
	user_address VARCHAR(25),
	project_id INT,
	department_id INT
);

-- ------------------------------------------
-- Create table for 'suppliers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS suppliers (
	supplier_id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
	supplier_name VARCHAR(25),
	location_id INT NOT NULL,
	product_type VARCHAR(25),
	contact_name VARCHAR(25),
	phone_number VARCHAR(30)
);

-- ------------------------------------------
-- Create table for 'inventory'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS inventory (
	inventory_id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
	inventory_type VARCHAR(30),
	category VARCHAR(30),
	supplier_id INT NOT NULL,
	location_id INT NOT NULL,
	number_of INT NOT NULL
);

-- ------------------------------------------
-- Create table for 'locations'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS locations (
	location_id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
	location_name VARCHAR(30),
	location_type VARCHAR(30),
	loc_address VARCHAR(30),
	city VARCHAR(30),
	loc_state VARCHAR(30),
	zip INT
);

-- ------------------------------------------
-- Create table for 'projects'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS projects (
	project_id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
	project_name VARCHAR(30),
	customer_id INT,
	project_type VARCHAR(30),
	location_id INT
);

-- ------------------------------------------
-- Create table for 'customers'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS customers (
	customer_id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
	customer_name VARCHAR(30),
	contact_name VARCHAR(30),
	contact_number VARCHAR(30),
	location_id INT
);

-- ------------------------------------------
-- Create table for 'departments'
-- ------------------------------------------

CREATE TABLE IF NOT EXISTS departments (
	department_id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
	department_name VARCHAR(30),
	dept_manager_id INT
);
-- ------------------------------------------
-- Add foreign key relations
-- ------------------------------------------

ALTER TABLE employees ADD FOREIGN KEY (project_id) REFERENCES projects(project_id);
ALTER TABLE employees ADD FOREIGN KEY (department_id) REFERENCES departments(department_id);
ALTER TABLE suppliers ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE inventory ADD FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id);
ALTER TABLE inventory ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE projects ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE projects ADD FOREIGN KEY (customer_id) REFERENCES customers(customer_id);
ALTER TABLE customers ADD FOREIGN KEY (location_id) REFERENCES locations(location_id);
ALTER TABLE departments ADD FOREIGN KEY (dept_manager_id) REFERENCES employees(user_id);
