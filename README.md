# 📦 Inventory Management System using Laravel
A modern and efficient **Inventory Management System** built with **Laravel** to streamline stock management, sales tracking, and invoicing with user authentications.

## 🚀 Features
### 🛡 Authentication & Security
- **User Registration & Login**
- **OTP Verification Password Change & Reset**
- **JWT Token-Based Authentication**
- **Session Management & Middleware Authentication**

### 📊 Dashboard
- Overview of Customer, Category, and product stock
- Overview of sales, revenue, and vat collection


### 📁 Inventory Management
- **Category Management**: Add, edit, delete product categories
- **Product Management**: Add, update, delete products with stock tracking
- **Customer Management**: Store customer information and purchase history

### 💰 Sales & Invoices
- **Sales Management**: Track real-time sales transactions
- **Invoice Generation**: Create & manage invoices for customers
- **Reports**: View sales & stock reports

### 📱 Responsive Design
- Fully **responsive** for desktop, tablet, and mobile devices

## 🖥 Screenshots
### 📸 Login Page
<p align="center">
    <img src="Image/1.png" width="30%" alt="Login Page 1"/>
    <img src="Image/2.png" width="30%" alt="Login Page 2"/>
    <img src="Image/3.png" width="30%" alt="Login Page 3"/>
</p>

<p align="center">
    <img src="Image/4.png" width="30%" alt="Login Page 4"/>
    <img src="Image/5.png" width="30%" alt="Login Page 5"/>
</p>

### 📸 Dashboard
<p align="center">
    <img src="Image/6.png" width="49%" alt="Login Page 4"/>
    <img src="Image/7.png" width="49%" alt="Login Page 5"/>
</p>


### 📸 Category Management
<p align="center">
    <img src="Image/8.png" width="30%" alt="Login Page 1"/>
    <img src="Image/9.png" width="30%" alt="Login Page 2"/>
    <img src="Image/10.png" width="30%" alt="Login Page 3"/>
</p>
### 📸 Customer Management
<p align="center">
    <img src="Image/11.png" width="30%" alt="Login Page 1"/>
    <img src="Image/12.png" width="30%" alt="Login Page 2"/>
</p>

### 📸 Product Management
![Products](Image/13.png)
### 📸 Sales Management
![Sales](Image/14.png)
![Sales](Image/15.png)
### 📸 Sales Report Generation
![Sales](Image/16.png)
### invoice.pdf
![Sales](Image/17.png)

## 🛠 Installation Guide
### 📌 Prerequisites
- PHP 8.x  
- Composer  
- Laravel 10.x  
- MySQL  
- Node.js & NPM  

### 💡 Setup Instructions
1️⃣ Clone the repository:  
```bash
git clone https://github.com/labib108/Shop-Management-System.git
cd Shop-Management-System
```
2️⃣ Install dependencies:  
```bash
composer install
npm install && npm run dev
```
3️⃣ Configure `.env` file:  
```bash
cp .env.example .env
php artisan key:generate
```
4️⃣ Set up database and migrate:  
```bash
php artisan migrate --seed
```
5️⃣ Start the development server:  
```bash
php artisan serve
```
Now, visit **http://127.0.0.1:8000** to access the system.


## 🛠 Technologies Used
- **Backend**: Laravel, MySQL, JWT Authentication  
- **Frontend**: Blade, Bootstrap, JavaScript  
- **Security**: Middleware authentication, CSRF protection  
