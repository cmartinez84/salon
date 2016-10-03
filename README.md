# _Hair_Salon

#### _A website to manage client-stylist relations for a hair salon_

#### By _**Chris Martinez**_

## Description
_This app allows the user to enter, edit, and delete stylist information and clients for the stylist. This project explores one-to-many relationships, as each client will only belong to one client, and is a practice in CRUD functionality._


## Specifications
| Behavior | Input Ex. | Output Ex. |
| --- | --- | --- |
| Enter Stylist Name, Date of Employment, Specialty (ie, male, female, kids etc)| "Suzzie Banshee"| "Suzzie Banshee", 11-11-2011, "Edgy punk-inspired cuts"|"Suzzie Banshee", 11-11-2011, "Edgy punk-inspired cuts"|

|Ability to Edit Stylist information| "Suzzie Baneshee"|changed to" Siouxsie Banshee"|

|clicking on stylist name produces list of regular clients and last date of appointment and next appointment scheduled| <click>|"Walter Ableman" ,11-12-2011, 11-24, 2011 |

|Enter Client information, including name, age. clicking client name |"Remedios Varo", 25 |"Remedios Varo",  25|
|clicking client name from stylist page brings up full profile of client|"Remedios Varo"|Name: "Remedios Varo" Age: 25, etc|
|clients have button to delete client|click "remove"| client is removed from database. neither client complier method will return client|
|button to delete stylists| clicked| stylist deleted from database|


## Setup/Installation Requirements
* _Clone this repository to your desktop_
* _Run composer install from root_
* _Navigate to the web folder and begin your local server (php -S localhost:8000)_
 * _Begin MAMP_
* _Iinitialize new Database by doing the following:_
* _Begin MySql Shell by running $ /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot_
* _CREATE DATABASE hair_salon_
* _USE hair_salong_
* _CREATE TABLE stylists(id serial PRIMARY KEY, name VARCHAR(255), date_began VARCHAR(255), specialty VARCHAR(255))_
* _CREATE TABLE clients(id, serial PRIMARY KEY, name VARCHAR(255), last_appointment VARCHAR(255), next_appointment VARCHAR(255))_
* _Alternatively, unzip the database contained at the top level of this folder and import from phpmyadmin (http://localhost:8888/phpmyadmin/)_
* _in phpmyadmin, you may also  have to create another database for use with phpunit tests files by going to Operations> Copy Database To> and remaning database "hair_salon_test" and choosing "structure only"_

* _Change localhost routing in app.php (and php documents in tests folder) to localhost enabled for mySQL. ex mysql:...host=localhost:8889;dbname=....in MAMP, you can find this by going to  MAMP > Preferences > Ports> MySql Port_
* _In terminal, navigate to _
* _Open Browser and navigate to http://localhost:8000_
## Link
https://github.com/cmartinez84/hair_salon

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
