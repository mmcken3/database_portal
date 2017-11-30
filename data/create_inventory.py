from random import *

download_dir = "inventory.csv" #where you want the file to be downloaded to 

csv = open(download_dir, "w") 
#"w" indicates that you're writing strings to the file

inv_type_list = ["fencing", "concrete blocks", "tile", "marble", "2x4 lumber", "7x7 lumber",
            "dry wall nails", "lumber nails", "roofing nails", "cement nails", "nail gun", 
            "drill", "roofing", "plastic siding", "steel beams", "wooden siding"]

category_list = ["nails", "steel", "flooring", "lumber", "tile", "hand tools", "power tools",
					"trucks", "dirt", "cement", "doors", "windows", "roofing"]

inv_supplier_list = ["Lowes", "Home Depot", "Concrete Supply Co", "Gateway Supply Co",
						"Builders First Source", "Blue Linx Corp", "HD Supply White Cap", "ABC Supply Co",
						"Pro Build Holdings", "Roofing Supply Group", "L AND W Supply", "84 Lumber",
						"Beacon Roofing Supply", "Allied Building Products", "Yella Wood"]

inv_location_name_list = ["Hemming Plaza - 24"]

product_type_list = ["nails", "steel", "flooring", "lumber", "tile", "hand tools", "power tools",
					"trucks", "dirt", "cement", "doors", "windows", "roofing"]

columnTitleRow = "inventory_type, category, number_of, inv_supplier_name, inv_location_name\n"
#csv.write(columnTitleRow)

index = 1
while index < 400:
    toWrite = ""

    inv_type_num = randint(0, len(inv_type_list) - 1)
    toWrite = toWrite + "" + inv_type_list[inv_type_num] + " - " + str(randint(0, 400)) + ","

    category_num = randint(0, len(category_list) - 1)
    toWrite = toWrite + "" + category_list[category_num] + ","

    number_of = randint(0, 10000)
    toWrite = toWrite + "" + str(number_of) + ","

    supplier_name_num = randint(0, len(inv_supplier_list) - 1)
    toWrite = toWrite + "" + inv_supplier_list[supplier_name_num] + ","

    toWrite = toWrite + "" + "Hemming Plaza - 24" + "\n"

    csv.write(toWrite)
    index = index + 1