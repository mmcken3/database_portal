from random import *

download_dir = "employees.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

project_name_list = ["Abuja Light Rail", "Badagry Deep Sea Port", "Fourth Mainland Bridge", "Lagos-Calabar Railway",
						"Lagos-Kano Standard Gauge Railway", "Lagos Rail Mass Transit", "Lekki Port", "Third Mainland Bridge",
						"Hyderabad Metro Rail", "Navi Mumbai International Airport", "123-76 Road Repave", "JX Intersection Repave",
						"New Campus Buildings", "Parking Garage BOA", "Riyadh Metro", "Blanka tunnel complex", "Coastal Highway E39",
                        "Southwest Calgary Ring Road", "Eglinton Crosstown LRT", "Port Mann Bridge", "LaGuardia Airport Project"]

department_name_list = ["roadwork", "machine operators", "finance", "sales",
						"building design", "site workers", "woodwork", "metalwork"]

first_name = ["Jack", "Alex", "Alexa", "Katie", "Catherine", "Kyle", "Ross", "Peter", "John", "Brett",
			"Liz", "Nick", "Caitlin", "Lyla", "Colin", "Patrick", "Cameron", "Anna", "Mitchell", "Jace",
            "Alexander", "Allysa", "Mellisa", "Nikki", "Aaron"]
last_name = ["Smith", "Doe", "Simpson", "Williams", "Powell", "Watson", "Carr", "Brady", "Adams",
			"Shoemaker", "Washington", "Schmitt", "Durham", "Drohan", "Schwartz", "Cavanos", "Manning"]

streetname = ["Main", "Scott", "South Park", "West Broad", "East Bay", "Market", "Smith Ct.", "Westcott Cr.",
                "King", "St. Peter"]
location_state_list = ["Charleston SC", "Charlotte NC", "Jaxonville FL", "Atlanta GA", "Portland OR", 
                        "Birmingham AL", "Culpepper VA", "New York City NY", "Boston MA", "Knoxville TN", 
                        "Charleston WV", "East Lansing MI"]

columnTitleRow = "user_name, first_name, last_name, admin_rights, user_pass, phone, user_address, emp_project_name, emp_department_name\n"

index = 1
while index < 100:
    toWrite = ""

    #make this be first 3 of first name and first 3 of last        
    toWrite = toWrite + "userName" + str(index) + ", "

    first_name_num = randint(0, len(first_name) - 1)
    last_name_num = randint(0, len(last_name) - 1)
    toWrite = toWrite + "" + first_name[first_name_num] + ", " + last_name[last_name_num] + ","

    toWrite = toWrite + "0,"
    toWrite = toWrite + "password,"

    contact_num_1 = randint(0, 999)
    contact_num_2 = randint(0, 999)
    contact_num_3 = randint(0, 9999)
    toWrite = toWrite + "" + str(contact_num_1) + "-" + str(contact_num_2) + "-" + str(contact_num_3) + ","

    address = "" + str(randint(0, 600))
    address = address + " " + streetname[randint(0, len(streetname) - 1)]
    address = address + " " + location_state_list[randint(0, len(location_state_list) - 1)]
    toWrite = toWrite + address + ","

    project_name_num = randint(0, len(project_name_list) - 1)
    toWrite = toWrite + "" + project_name_list[project_name_num] + ","

    department_name_num = randint(0, len(department_name_list) - 1)
    toWrite = toWrite + "" + department_name_list[department_name_num] + "\n"

    csv.write(toWrite)
    index = index + 1