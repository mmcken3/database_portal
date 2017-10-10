# Data Manager

This will contain the code for the data manager of the database. Below here we will see all of the SQL queries that need to be implemented into PHP.

# MySQL Queries

Select all queries.

```
SELECT * FROM employees;
SELECT * FROM departments;
SELECT * FROM projects;
SELECT * FROM locations;
SELECT * FROM inventory;
SELECT * FROM customers;
SELECT * FROM suppliers;
```

Search with params

```
SELECT * FROM employees WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
SELECT * FROM departments WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
SELECT * FROM projects WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
SELECT * FROM locations WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
SELECT * FROM inventory WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
SELECT * FROM customers WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
SELECT * FROM suppliers WHERE (addition of [field][operation][value];) ORDER BY (selection) (DESC if selection);
```