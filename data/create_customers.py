from random import *

download_dir = "customers.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

customer_name_list = ["Bank of Amercia", "Clemson University", "Georgia Tech University", "Furman University",
						"Heming Plaza Offices", "City of Jaxonville", "Pleasantburg Shopping Center", "Peace Center Offices",
						"Canadian Government", "Japanese Government", "City of Chicago", "Intel Corp",
						"IBM Corp", "New York City", "San Francisco"]

first_name = ["John", "Alex", "Alexa", "Katie", "Catherine", "Kyle", "Mitch", "Peter", "John", "Brett",
			"Betty", "Josh", "Caitlin", "Lyla", "Alexander", "Patrick", "Cameron", "Anna"]
last_name = ["Smith", "Doe", "Simpson", "Mckenzie", "Powell", "Watson", "Carr", "Brady", "Adams",
			"Shoemaker", "Washington"]

contact_number_list = ["261-613-1235", "135-134-6575", "166-123-7223", "3275 N Pleasantburg Dr",
						"3300 Pointsett Hwy", "307-339 E 4th St", "410 Mint St", "2121 Beatties Ford Rd",
						"N Hogan St", "2-98 N Georgia St", "50 N Laura St", "350 Ferst Dr NW"]

customer_location_name_list = ["Douthit Hills", "HWY 123 - HWY 76", "River St. Downtown", "Pleasantburg Shopping"
						"Furman Student Center", "Epicentre", "Mint Street Parking Deck", "Lincoln Heights",
						"Hemming Plaza", "N Georgia - Gator Bowl Blvd", "Bank of America FL", "Georgia Tech Student Center",
						"Administrative Services Clemson", "Jaxonville City Hall"]

columnTitleRow = "customer_name, contact_name, contact_number, customer_location_name\n"
#csv.write(columnTitleRow)

index = 1
for name in customer_name_list:
	toWrite = "" + str(index) + ", "
		
	toWrite = toWrite + "'" + name + "',"

	first_name_num = randint(0, len(first_name) - 1)
	last_name_num = randint(0, len(last_name) - 1)
	toWrite = toWrite + "'" + first_name[first_name_num] + " " + last_name[last_name_num] + "', "

	contact_num_1 = randint(0, 999)
	contact_num_2 = randint(0, 999)
	contact_num_3 = randint(0, 9999)
	toWrite = toWrite + "'" + str(contact_num_1) + "-" + str(contact_num_2) + "-" + str(contact_num_3) + "', "

	location_name_num = randint(0, len(customer_location_name_list) - 1)
	toWrite = toWrite + "'" + customer_location_name_list[location_name_num] + " - " + str(randint(0, 100)) + "'\n"

	csv.write(toWrite)
	index = index + 1