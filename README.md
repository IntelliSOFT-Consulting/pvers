# PVERS
This project is meant to allow the members of the public and patients to report adverse drug reactions, adverse events following vaccination, incidents involving medical devices or poor quality medicinal products.

## Getting Started 
Please check the official cakephp installation guide for server requirements before you start. [Official Documentation](https://book.cakephp.org/2/en/installation.html).

At a glance, you'll need:
- **PHP**
- **Apache**
- **Mysql**

Clone the repository

    git clone https://github.com/IntelliSOFT-Consulting/pvers.git

Switch to the repo folder

    cd pvers

Install all the dependencies using composer

    composer install

Copy the database.php.default and email.php.default files under app/Config and make the required configuration changes

    cp database.php.default database.php & cp email.php.default email.php

Run the application using the comand below

    app/Console/cake server

This will expose the application on port 8765

## Alerts and Notifications

Email/SMS notifications are sent on every submission/review. To ensure this is achieved, please create a background service that will handle this command.

    app/Console/cake queue runworker


## Report Components

The project comprises of the following reports
- SADRs
- AEFI 
- PQMPs
- Medical Devices
- Medical Errors
- Transfussion 

More details can be found [here](https://pv.pharmacyboardkenya.org/pages/about)
 
## License
[![License](http://img.shields.io/:license-gnu-blue.svg?style=flat-square)](http://badges.gnu-license.org) 

Licensed under the GNU General Public License, Version 3.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    https://github.com/IntelliSOFT-Consulting/pvers/blob/master/LICENSE.md

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
