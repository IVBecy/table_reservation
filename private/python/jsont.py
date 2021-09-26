# Script is used to create a JSON structure for the data that
# will be inserted into the database

# Modules
import json

# Variables
days = 31
all_data = {}
max_people = 40
times = [
  "12:00",
  "12:15",
  "12:30",
  "12:45",
  "13:00",
  "13:15",
  "13:30",
  "13:45",
  "14:00",
  "17:00",
  "17:15",
  "17:30",
  "17:45",
  "18:00",
  "18:15" ,
  "18:30",
  "18:45",
  "19:00",
  "19:15",
  "19:30",
  "19:45",
  "20:00",
  "20:15",
  "20:30",
]

# Making the dictionary
for day in range(1,days+1):
  all_data[day] = max_people

# Add dictionary to JSON file
with open('dataset.json', 'w') as w:
  json.dump(all_data, w)