from bs4 import BeautifulSoup
import xml.etree.ElementTree as ET
import json
import requests
import re

def entries_parse(filename):
	soup = BeautifulSoup(open(filename))
	table = soup.findAll('table')
	rows = table[1].findAll('tr')
	for tr in rows:
		cols = tr.findAll('td')
		if len(cols)>0:
			name = re.sub(r'\([^)]*\)', '',(str(cols[1].text)).lower().strip().strip('.')).strip()
			horse_names.append(name)
			horse_weights.append((str(cols[4].text)).lower().strip().strip('.'))
			jockey_names.append((str(cols[5].text)).lower().strip().strip('.'))
			trainer_names.append((str(cols[6].text)).lower().strip().strip('.'))

def pp_parse(filename):
	tree = ET.parse(filename)
	root = tree.getroot()
	xml = list(root.iter('text'))

	#extract weather temperature forecast
	for child in xml:
		#print child.tag,child.attrib
		if 'ADVANCED' in child.text:
			forecast = child.text	
			break

	#extract speed last race,prime power,class rating,best speed at distance
	count = 0 
	
	for child in xml:
		count+=1
		if 'Best Speed at Dist' in child.text:
			#print child.text
			break


	#extract best speed last race
	for j in range(3):
		horse = []
		horse.append(xml[count].text)
		horse.append(xml[count+1].text)
		horse.append(xml[count+2].text)
		last_race.append(horse)
		count += 3
	
	#extract class rating
	for j in range(3):
		horse = []
		horse.append(xml[count].text)
		horse.append(xml[count+1].text)
		horse.append(xml[count+2].text)
		class_rating.append(horse)
		count += 3
	#print class_rating
	#print

	#extract best_speed
	for j in range(3):
		horse = []
		horse.append(xml[count].text)
		horse.append(xml[count+1].text)
		horse.append(xml[count+2].text)
		best_speed.append(horse)
		count += 3
	
	#extract data per horse
	j=0
	for i in range(0,len(horse_names)):
		# print "i: {}, j : {}".format(i,j)
		# print horse_names[i]

		while not(horse_names[i] in xml[j].text.lower() and (xml[j].attrib)['font'] =='6') :
				j=j+1
			#	print "------>{}".format(j)
		
		#extract data for ith horse
		while jockey_names[i] not in xml[j].text.lower():
			j=j+1 
		jockey_stats.append(xml[j].text)
		while 'Sire' not in xml[j].text:
			j=j+1
		j=j-1
		horse_info.append(xml[j].text)
		while 'Brdr' not in xml[j].text:
			j=j+1
		breeders.append(xml[j].text)
		while trainer_names[i] not in xml[j].text.lower():
			j=j+1 
		trainer_stats.append(xml[j].text)
		while 'Prime Power' not in xml[j].text:
			j=j+1
		prime_power.append(xml[j].text)
		while 'Life' not in xml[j].text:
			j=j+1
		j+=1
		horse_stats.append(xml[j].text)
		#print '__________________________________________'	

def write_to_db():
	url = 'http://localhost/se-derby/write_data.php'

#Sending Data one horse at a time
	for i in range(len(horse_names)):
		temp=horse_info[i].split(" ")
		#extract sex
		if temp[1].strip() == 'g.':
			sex = 'gelding'
		elif temp[1].strip() == 'c.':
			sex = 'colt'
		elif temp[1].strip() == 'f.':
			sex = 'filly'
		elif temp[1].strip() == 'h.':
			sex = 'horse'
		elif temp[1].strip() == 'm.':
			sex = 'mare'
		elif temp[1].strip() == 'r.':
			sex = 'ridgeling'

		#extract color
		if temp[0].strip() == 'Ch.':
			color = 'chestnut'
		elif temp[0].strip() == 'B.':
			color = 'bay';
		elif temp[0].strip() == 'Dkbbr.':
			color = 'brown/dark bay'
		elif temp[0].strip() == 'Bl.':
			color = 'black'
		elif temp[0].strip() == 'Wh.':
			color = 'white'
		elif temp[0].strip() == 'Gr/ro.':
			color = 'gray/roan'

		#extract age
		age = temp[2].strip()

		#extract prime power
		power = prime_power[i].split(":")[1].split(" ")[1].strip()

		#extract breeder
		breeder = breeders[i].split(":")[1].strip()

		#extract horse stats
		temp=horse_stats[i].split(" ")
		h_mounts = temp[0]
		h_wins = temp[1]
		h_second = temp[3]
		h_third = temp[5]

		#extract jockey stats
		temp=jockey_stats[i].split(" ")
		stat = temp[-3].split("-")
		j_percent = temp[-1].strip(")").strip("%")
		j_mounts = temp[-5].strip("(")
		j_wins = stat[0]
		j_second = stat[1]
		j_third = stat[2]

		#extract jockey stats
		temp=trainer_stats[i].split(" ")
		stat = temp[-3].split("-")
		t_percent = temp[-1].strip(")").strip("%")
		t_mounts = temp[-5].strip("(")
		t_wins = stat[0]
		t_second = stat[1]
		t_third = stat[2]


		
		payload = {'horse': horse_names[i].title(), 'jockey': jockey_names[i].title(),'trainer':trainer_names[i].title(),
					'breeder':breeder,'weight':horse_weights[i],'power':power,"age":age,"color":color,
					"sex":sex,'h_mounts':h_mounts,'h_wins':h_wins,'h_second':h_second,'h_third':h_third,'j_mounts':j_mounts,
					'j_wins':j_wins,"j_second":j_second,'j_third':j_third,'j_percent':j_percent,'t_mounts':j_mounts,
					't_wins':j_wins,'t_second':j_second,'t_third':j_third,'t_percent':j_percent}
		r = requests.post(url, data=json.dumps(payload))
		print (r.text)


if __name__ == '__main__':
	for i in range(1,4):
		horse_names=[]
		jockey_names=[]
		trainer_names=[]
		horse_weights=[]
		best_speed = []
		class_rating = []
		last_race = []
		prime_power = []
		forecast="";
		jockey_stats=[]
		trainer_stats=[]
		horse_info=[]
		horse_stats=[]
		breeders=[]
		# print "_____________________________________________"
		entries_parse("entries{}.html".format(i))
		# print horse_names
		pp_parse("race{}.xml".format(i))
		write_to_db()
	
	