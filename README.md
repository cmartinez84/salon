# _Salon

#### _A web page which suggests which coding track to take based on user inputs, September 15, 2016_

#### By _**Chris Martinez**_

## Description
_This page will search for word frequency._


## Specifications
| Behavior | Input Ex. | Output Ex. |
| --- | --- | --- |
| Enter Stylist Name, Date of Employment, Specialty (ie, male, female, kids etc)| "Suzzie Banshee", linked photo| "Suzzie Banshee", 11-11-2011, "Edgy punk-inspired cuts"|"Suzzie Banshee", 11-11-2011, "Edgy punk-inspired cuts"|

|Ability to Edit Stylist information| "Suzzie Baneshee"|changed to" Siouxsie Banshee"|

|clicking on stylist name produces list of regular clients and last date of appointment and next appointment scheduled| <click>|"Walter Ableman" ,11-12-2011, 11-24, 2011 |

|Enter Client information, including name, age, gender. clicking client name |"Remedios Varo", female, 25 |"Remedios Varo", female, 25 |"Remedios Varo", female, 25|
|clicking client name from stylist page brings up full profile of client|"Remedios Varo"|Name: "Remedios Varo" Age: 25, etc|
|clients have button to delete client|click "remove"| client is removed from database. neither client complier method will return client|


## Setup/Installation Requirements
* _Clone this repository to your desktop_
* _Run composer install from root_
* _Navigate to the web folder and begin your local server_
* _To enable databases, begin Apache server or other SQL enabeld server_
* _Change localhost routing in app.php (and php documents in tests folder) to localhost enabled for mySQL. ex mysql:...host=localhost:8889;dbname=...._
* _Databases for running app as well as tests are located in folder zipped, as "salon.zip" and "salon_test.zip". Import through localhost:8888/phpmyadmin, or other sql enabled server_




## Link
https://github.com/cmartinez84/string-word-search

## Known Bugs
_None yet_

## Support and contact details
_cardamomclouds@yahoo.com_

## Technologies Used
_HTML,
CSS,
Bootstrap,
JS,
jQuery
PHP,
TWIG,
Silex,
mySQL_

### License
The MIT License (MIT)

Copyright (c) 2016 **_Chris Martinez_**
