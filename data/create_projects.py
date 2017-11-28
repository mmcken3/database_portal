from random import *

download_dir = "projects.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

project_name_list = ["Abuja Light Rail", "Badagry Deep Sea Port", "Fourth Mainland Bridge", "Lagos-Calabar Railway",
						"Lagos-Kano Standard Gauge Railway", "Lagos Rail Mass Transit", "Lekki Port", "Third Mainland Bridge",
						"Hyderabad Metro Rail", "Navi Mumbai International Airport", "123-76 Road Repave", "JX Intersection Repave",
						"New Campus Buildings", "Parking Garage BOA", "Riyadh Metro", "Blanka tunnel complex", "Coastal Highway E39",
                        "Southwest Calgary Ring Road", "Eglinton Crosstown LRT", "Port Mann Bridge", "LaGuardia Airport Project"]

project_type_list= ["type1", "type2", "type3", "type4", "type5"]

proj_location_name_list = ["Douthit Hills", "HWY 123 - HWY 76", "River St. Downtown", "Pleasantburg Shopping"
						"Furman Student Center", "Epicentre", "Mint Street Parking Deck", "Lincoln Heights",
						"Hemming Plaza", "N Georgia - Gator Bowl Blvd", "Bank of America FL", "Georgia Tech Student Center",
						"Administrative Services Clemson", "Jaxonville City Hall"]

proj_customer_name_list = ["Bank of Amercia", "Clemson University", "Georgia Tech University", "Furman University",
						"Heming Plaza Offices", "City of Jaxonville", "Pleasantburg Shopping Center", "Peace Center Offices",
						"Canadian Government", "Japanese Government", "City of Chicago", "Intel Corp",
						"IBM Corp", "New York City", "San Francisco"]

columnTitleRow = "project_id, project_name, proj_customer_name, project_type, proj_location_name\n"
csv.write(columnTitleRow)

i = 0
for name in project_name_list:
    toWrite = ""

    toWrite = toWrite + "" + name + ","
        
    proj_customer_name_num = randint(0, len(proj_customer_name_list) - 1)
    toWrite = toWrite + "" + proj_customer_name_list[proj_customer_name_num] + ","

    project_type_num = randint(0, len(project_type_list) - 1)
    toWrite = toWrite + "" + project_type_list[project_type_num] + "\n"

    #location_name_num = randint(0, len(proj_location_name_list) - 1)
    #toWrite = toWrite + "" + proj_location_name_list[location_name_num] + " - " + str(randint(0, 100)) + "\n"

    csv.write(toWrite)
    i = i + 1