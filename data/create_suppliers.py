from random import *

download_dir = "suppiers.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

supplier_name_list = ["Lowes", "Home Depot", "Concrete Supply Co", "Gateway Supply Co",
						"Builders First Source", "Blue Linx Corp", "HD Supply White Cap", "ABC Supply Co",
						"Pro Build Holdings", "Roofing Supply Group", "L AND W  Supply", "84 Lumber",
						"Beacon Roofing Supply", "Allied Building Products", "Yella Wood"]

supplier_location_name_list = ["Douthit Hills", "HWY 123 - HWY 76", "River St. Downtown", "Pleasantburg Shopping"
						"Furman Student Center", "Epicentre", "Mint Street Parking Deck", "Lincoln Heights",
						"Hemming Plaza", "N Georgia - Gator Bowl Blvd", "Bank of America FL", "Georgia Tech Student Center",
						"Administrative Services Clemson", "Jaxonville City Hall"]

product_type_list = ["nails", "steel", "flooring", "lumber", "tile", "hand tools", "power tools",
					"trucks", "dirt", "cement", "doors", "windows", "roofing"]

first_name = ["Jack", "Alex", "Alexa", "Katie", "Catherine", "Kyle", "Ross", "Peter", "John", "Brett",
			"Liz", "Nick", "Caitlin", "Lyla", "Colin", "Patrick", "Cameron", "Anna"]
last_name = ["Smith", "Doe", "Simpson", "Williams", "Powell", "Watson", "Carr", "Brady", "Adams",
			"Shoemaker", "Washington"]

columnTitleRow = "supplier_name, supplier_location_name, product_type, contact_name, phone_number\n"
#csv.write(columnTitleRow)

index = 1
for name in supplier_name_list:
	toWrite = ""
		
	toWrite = toWrite + "" + name + ","

	location_name_num = randint(0, len(supplier_location_name_list) - 1)
	toWrite = toWrite + "" + supplier_location_name_list[location_name_num] + " - " + str(randint(0, 100)) + ","

	product_type_num = randint(0, len(product_type_list) - 1)
	toWrite = toWrite + "" + product_type_list[product_type_num] + ","

	first_name_num = randint(0, len(first_name) - 1)
	last_name_num = randint(0, len(last_name) - 1)
	toWrite = toWrite + "" + first_name[first_name_num] + " " + last_name[last_name_num] + ","

	contact_num_1 = randint(100, 999)
	contact_num_2 = randint(100, 999)
	contact_num_3 = randint(1000, 9999)
	toWrite = toWrite + "" + str(contact_num_1) + "-" + str(contact_num_2) + "-" + str(contact_num_3) + "\n"

	csv.write(toWrite)
	index = index + 1