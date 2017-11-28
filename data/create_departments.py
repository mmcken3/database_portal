from random import *

download_dir = "departments.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

department_name_list = ["roadwork", "machine operators", "finance", "sales",
						"building design", "site workers", "woodwork", "metalwork"]

department_manager_name_list = ["Douthit Hills", "HWY 123 - HWY 76", "River St. Downtown", "Pleasantburg Shopping"
						"Furman Student Center", "Epicentre", "Mint Street Parking Deck", "Lincoln Heights",
						"Hemming Plaza", "N Georgia - Gator Bowl Blvd", "Bank of America FL", "Georgia Tech Student Center",
						"Administrative Services Clemson", "Jaxonville City Hall"]

first_name = ["Jack", "Alex", "Alexa", "Katie", "Catherine", "Kyle", "Ross", "Peter", "John", "Brett",
			"Liz", "Nick", "Caitlin", "Lyla", "Colin", "Patrick", "Cameron", "Anna"]
last_name = ["Smith", "Doe", "Simpson", "Williams", "Powell", "Watson", "Carr", "Brady", "Adams",
			"Shoemaker", "Washington"]

columnTitleRow = "department_name, department_manager_name\n"
#csv.write(columnTitleRow)

index = 1
for name in department_name_list:
	toWrite = ""
		
	toWrite = toWrite + "" + name + "\n"

	#first_name_num = randint(0, len(first_name) - 1)
	#last_name_num = randint(0, len(last_name) - 1)
	#toWrite = toWrite + "" + first_name[first_name_num] + " " + last_name[last_name_num] + "\n"

	csv.write(toWrite)
	index = index + 1