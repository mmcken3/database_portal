from random import *

download_dir = "exampleCsv.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

location_name_list = ["Douthit Hills", "HWY 123 - HWY 76", "River St. Downtown", "Pleasantburg Shopping"
						"Furman Student Center", "Epicentre", "Mint Street Parking Deck", "Lincoln Heights",
						"Hemming Plaza", "N Georgia - Gator Bowl Blvd", "Bank of America FL", "Georgia Tech Student Center",
						"Administrative Services Clemson", "Jaxonville City Hall"]

location_type_list = ["type1", "type2", "type3", "type4", "type5"]

location_address_list = ["Oak Terrace", "1303 Tiger Blvd", "536-598 River Street", "3275 N Pleasantburg Dr",
						"3300 Pointsett Hwy", "307-339 E 4th St", "410 Mint St", "2121 Beatties Ford Rd",
						"N Hogan St", "2-98 N Georgia St", "50 N Laura St", "350 Ferst Dr NW"]

location_city_list = ["Charlottle", "Charleston", "Jaxonville", "Greenville", "Atlanta", "Clemson", "Portland"]

location_state_list = ["SC", "NC", "FL", "GA", "OR"]

location_zip_list = ["12345", "28202", "29631", "29601", "29492", "29466"]

columnTitleRow = "location_id, location_name, location_type, loc_address, city, loc_state, zip\n"
#csv.write(columnTitleRow)

index = 1
while index < 100:
	toWrite = "" + str(index) + ", "
	
	location_name_num = randint(0, len(location_name_list) - 1)
	toWrite = toWrite + "'" + location_name_list[location_name_num] + "', "

	location_type_num = randint(0, len(location_type_list) - 1)
	toWrite = toWrite + "'" + location_type_list[location_type_num] + "', "

	location_address_num = randint(0, len(location_address_list) - 1)
	toWrite = toWrite + "'" + location_address_list[location_address_num] + "', "

	location_city_num = randint(0, len(location_city_list) - 1)
	toWrite = toWrite + "'" + location_city_list[location_city_num] + "', "

	location_state_num = randint(0, len(location_state_list) - 1)
	toWrite = toWrite + "'" + location_state_list[location_state_num] + "', "

	location_zip_num = randint(0, len(location_zip_list) - 1)
	toWrite = toWrite + location_zip_list[location_zip_num] + "\n"

	csv.write(toWrite)
	index = index + 1
