START TRANSACTION;
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Douthit Hills", "Oak Terrace", "Clemson", "SC", 29631);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("HWY 123 - HWY 76", "1303 Tiger Blvd", "Clemson", "SC", 29631);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("River St. Downtown", "536-598 River Street", "Greenvile", "SC", 29601);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Pleasantburg Shopping", "3275 N Pleasantburg Dr", "Greenville", "SC", 29609);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Furman Student Center", "3300 Pointsett Hwy", "Greenville", "SC", 29613);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Epicentre", "307-339 E 4th St", "Charlotte", "NC", 28202);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Mint Street Parking Deck", "410 Mint St", "Charlotte", "NC", 28202);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Lincoln Heights", "2121 Beatties Ford Rd", "Charlotte", "NC", 28216);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Hemming Plaza", "N Hogan St", "Jaxonville", "FL", 32202);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("N Georgia - Gator Bowl Blvd", "2-98 N Georgia St", "Jaxonville", "FL", 32202);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Bank of America, FL", "50 N Laura St", "Jaxonville", "FL", 32202);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Georgia Tech Student Center", "350 Ferst Dr NW", "Atlanta", "GA", 30332);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Administrative Services Clemson", "108 Perimeter Rd", "Clemson", "SC", 29631);
insert into locations (location_name, loc_address, city, loc_state, zip) VALUES ("Jaxonville City Hall", "117 W Duval St", "Jaxonville", "FL", 32202);
COMMIT;

START TRANSACTION;
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Bank of America", 11, "Bank of America, FL", "John Smith", "123-456-7891");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Clemson University", 13, "Administrative Services Clemson", "Cam Newton", "634-145-1245");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Georgia Tech University", 12, "Georgia Tech Student Center", "Matt Ryan", "124-654-3493");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Furman University", 5, "Furman Student Center", "Sam Ponder", "386-362-9851");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Heming Plaza Offices", 9, "Hemming Plaza", "Emily Ryan", "735-085-8452");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("City of Jaxonville", 14, "Jaxonville City Hall", "Carson Palmer", "563-981-1245");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Pleasantburg Shopping Center", 4, "Pleasantburg Shopping", "Kate Adams", "124-987-1455");
insert into customers (customer_name, cust_location_id, cust_location_name, contact_name, contact_number) VALUES ("Peace Center Offices", 3, "River St. Downtown", "Tom Brady", "642-623-0981");
COMMIT;

START TRANSACTION;
insert into projects (project_name, proj_customer_id, proj_customer_name, project_type, proj_location_id, proj_location_name) VALUES ("123-76 Road Repave", 2, "Clemson University", "road work", 2, "HWY 123 - HWY 76");
insert into projects (project_name, proj_customer_id, proj_customer_name, project_type, proj_location_id, proj_location_name) VALUES ("New Campus Buildings", 2, "Clemson University", "buildings", 1, "Douthit Hills");
insert into projects (project_name, proj_customer_id, proj_customer_name, project_type, proj_location_id, proj_location_name) VALUES ("JX Intersection Repave", 6, "City of Jaxonville", "roadwork", 10, "N Georgia - Gator Bowl Blvd");
insert into projects (project_name, proj_customer_id, proj_customer_name, project_type, proj_location_id, proj_location_name) VALUES ("Parking Garage, BOA", 1, "Bank of America", "buildings", 7, "Mint Street Parking Deck");
insert into projects (project_name, proj_customer_id, proj_customer_name, project_type, proj_location_id, proj_location_name) VALUES ("Jaxonville Warehouse", null, null, "warehouse", 9, "Hemming Plaza");
COMMIT;

START TRANSACTION;
insert into departments (department_name, dept_manager_id, dept_manager_name) VALUES ("road work", null, null);
insert into departments (department_name, dept_manager_id, dept_manager_name) VALUES ("sales", null, null);
insert into departments (department_name, dept_manager_id, dept_manager_name) VALUES ("machine operators", null, null);
insert into departments (department_name, dept_manager_id, dept_manager_name) VALUES ("woodwork", null, null);
insert into departments (department_name, dept_manager_id, dept_manager_name) VALUES ("metalwork", null, null);
insert into departments (department_name, dept_manager_id, dept_manager_name) VALUES ("finance", null, null);
COMMIT;

START TRANSACTION;
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("stDiggs", "Stephon", "Diggs", True, "password", "123-123-1245", "my address here", 1, "road work", 1, "123-76 Road Repave");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("alSmith", "Alex", "Smith", False, "password", "633-745-2346", "my address here", 3, "machine operators", 5, "Jaxonville Warehouse");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("drBrees", "Drew", "Brees", False, "password", "234-234-3145", "my address here", 3, "machine operators", 3, "JX Intersection Repave");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("peMan", "Peyton", "Manning", False, "password", "743-753-2346", "my address here", 1, "road work", 3, "JX Intersection Repave");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("clDemp", "Clint", "Dempsy", False, "password", "123-134-3643", "my address here", 5, "metalwork", 4, "Parking Garage, BOA");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("rxRyan", "Rex", "Ryan", True, "password", "none", "my address here", 3, "machine operators", 4, "Parking Garage, BOA");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("jaDoe", "Jane", "Doe", False, "password", "634-367-1235", "my address here", 5, "metalwork", 4, "Parking Garage, BOA");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("alAdams", "Alexa", "Adams", False, "password", "632-786-1245", "my address here", 2, "sales", null, null);
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("madSmit", "Maddie", "Smith", False, "password", "243-632-2345", "my address here", 2, "sales", null, null);
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("jCash", "John", "Cash", False, "password", "232-563-2356", "my address here", 3, "machine operators", 2, "New Campus Buildings");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("raTodd", "Rachel", "Todd", True, "password", "523-567-7543", "my address here", 5, "metalwork", 2, "New Campus Buildings");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("nCage", "Nick", "Cage", False, "password", "523-567-6783", "my address here", 1, "road work", 3, "JX Intersection Repave");
insert into employees (user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_department_id, emp_department_name, emp_project_id, emp_project_name) VALUES ("dCarr", "Derek", "Carr", True, "password", "none", "my address here", 3, "machine operators", 4, "Parking Garage, BOA");
COMMIT;

START TRANSACTION;
insert into departments (department_id, department_name) VALUES (1, "road work") ON DUPLICATE KEY UPDATE dept_manager_id=1, dept_manager_name="stDiggs";
insert into departments (department_id, department_name) VALUES (2, "sales") ON DUPLICATE KEY UPDATE dept_manager_id=9, dept_manager_name="madSmit";
insert into departments (department_id, department_name) VALUES (3, "machine operators") ON DUPLICATE KEY UPDATE dept_manager_id=13, dept_manager_name="dCarr";
insert into departments (department_id, department_name) VALUES (5, "metalwork") ON DUPLICATE KEY UPDATE dept_manager_id=11, dept_manager_name="raTodd";
COMMIT;

START TRANSACTION;
insert into suppliers (supplier_name, supp_location_id, supp_location_name, contact_name, product_type, phone_number) VALUES ("Pavement People", 6, "Epicentre", "John Adams", "pavement", "958-123-4567");
insert into suppliers (supplier_name, supp_location_id, supp_location_name, contact_name, product_type, phone_number) VALUES ("Lowes", 4, "Pleasantburg Shopping", "Colin Williams", "wood", "129-631-6525");
insert into suppliers (supplier_name, supp_location_id, supp_location_name, contact_name, product_type, phone_number) VALUES ("Home Depot", 4, "Pleasantburg Shopping", "Sam Smith", "metal", "715-981-7234");
insert into suppliers (supplier_name, supp_location_id, supp_location_name, contact_name, product_type, phone_number) VALUES ("Flooring Center", 8, "Lincoln Heights", "Nick Adams", "flooring", "887-971-9154");
COMMIT;

START TRANSACTION;
insert into inventory (inventory_type, category, inv_supplier_id, inv_supplier_name, inv_location_id, inv_location_name, number_of) VALUES ("2x4", "wood", 2, "Lowes", 9, "Hemming Plaza", 20);
insert into inventory (inventory_type, category, inv_supplier_id, inv_supplier_name, inv_location_id, inv_location_name, number_of) VALUES ("marble title", "flooring", 4, "Flooring Center", 9, "Hemming Plaza",20);
insert into inventory (inventory_type, category, inv_supplier_id, inv_supplier_name, inv_location_id, inv_location_name, number_of) VALUES ("black tile", "flooring", 4, "Flooring Center",9, "Hemming Plaza", 20);
insert into inventory (inventory_type, category, inv_supplier_id, inv_supplier_name, inv_location_id, inv_location_name, number_of) VALUES ("10 ft beams", "metal", 3, "Home Depot", 9, "Hemming Plaza", 20);
insert into inventory (inventory_type, category, inv_supplier_id, inv_supplier_name, inv_location_id, inv_location_name, number_of) VALUES ("pavement", "road work", 1, "Pavement People", 9, "Hemming Plaza", 20);
insert into inventory (inventory_type, category, inv_supplier_id, inv_supplier_name, inv_location_id, inv_location_name, number_of) VALUES ("nails", "accesories",  2, "Lowes", 9, "Hemming Plaza", 20);
COMMIT;