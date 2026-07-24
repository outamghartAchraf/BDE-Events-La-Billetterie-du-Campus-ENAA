# 🎓 PDE Event Management System

A web application developed with **Laravel** to manage university events. The platform allows administrators (BDE) to create and manage events, while students can register online and receive a unique digital ticket.

---

## 📌 Project Overview

The PDE Event Management System simplifies the organization of university events by providing two separate interfaces:

- **Admin Dashboard** for managing events and registrations.
- **Student Dashboard** for browsing events, registering, and viewing tickets.

---
## 📌 diagram de class
<img width="565" height="259" alt="1" src="https://github.com/user-attachments/assets/1efbe3d3-fce2-4d54-9203-8168b54f5d5e" />
## 📌 diagram ERD
<img width="558" height="251" alt="2" src="https://github.com/user-attachments/assets/5cd9e140-34e6-46eb-be01-f2271abe0e19" />
## 📌 diagram de use case
<img width="555" height="434" alt="3" src="https://github.com/user-attachments/assets/ce0c1ace-9d54-49b7-a7c8-2fea4e56235d" />


## ✨ Features

### 👨‍💼 Admin

- Secure authentication
- Dashboard with statistics
- Create events
- Edit events
- Delete events
- Upload event images
- Manage registrations
- View registration details
- Update registration status
- Monitor remaining seats

### 👨‍🎓 Student

- Register & Login
- Browse available events
- View event details
- Register for free events
- Prevent duplicate registrations
- View personal tickets
- Download/View digital ticket
- Edit profile
- Update password

---

## 🛠 Technologies Used

| Technology | Description |
|------------|-------------|
| Laravel 12 | Backend Framework |
| PHP 8.2 | Programming Language |
| MySQL | Database |
| Blade | Template Engine |
| Tailwind CSS | UI Design |
| JavaScript | Frontend Interactions |
| Vite | Asset Bundler |
| Git & GitHub | Version Control |

---

## 📂 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Middleware/
│
├── Models/
│
├── Policies/
│
├── Providers/
│
resources/
├── views/
│
routes/
├── web.php
│
database/
├── migrations/
├── seeders/
```

---

## 🗄 Database

Main tables:

- users
- events
- registrations

Relationships:

- One User → Many Registrations
- One Event → Many Registrations
- Registration belongs to User
- Registration belongs to Event

---

## 🔐 Authorization

Laravel Policies are used to protect resources.

Only administrators can:

- Create events
- Update events
- Delete events
- Manage registrations

Students can:

- Register to events
- View their own tickets
- Update their profile

---

## 🎫 Registration Process

1. Student logs in.
2. Student chooses an event.
3. System checks:

- Event is not full.
- Student is not already registered.

4. Registration is created.
5. A unique ticket code is generated.

Example:

```
BDE-2026-X8K4P
```

---

## 📸 Event Images

Administrators can upload an image for each event.

Images are stored using Laravel Storage:

```
storage/app/public/events
```

and displayed with:

```php
asset('storage/' . $event->image_path)
```

---

## 📊 Admin Dashboard

Statistics include:

- Total Events
- Total Students
- Total Registrations
- Remaining Seats

---

## 👤 Student Dashboard

Students can view:

- Available Events
- My Tickets
- Confirmed Registrations
- Profile Information

---

## 🚀 Installation

Clone the repository

```bash
git clone https://github.com/yourusername/pde-event-management.git
```

Enter the project

```bash
cd pde-event-management
```

Install dependencies

```bash
composer install
```

Install frontend packages

```bash
npm install
```

Copy environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure your database in `.env`

Run migrations

```bash
php artisan migrate
```

Create storage link

```bash
php artisan storage:link
```

Start the application

```bash
php artisan serve
```

Compile assets

```bash
npm run dev
```

---

## 📷 Screenshots

- Home Page
- Student Dashboard
- Admin Dashboard
- Event Details
- Registration Ticket
- Profile
- Event Management

*(Add screenshots here after finishing the project.)*

---

## 📋 Project Rules

- Only admins can manage events.
- Students cannot register twice.
- Capacity cannot be exceeded.
- Every registration has a unique ticket code.
- Event capacity must be greater than zero.

---

## 👨‍💻 Author

**Achraf Outamghart**

Full Stack Web Development Student

Laravel • PHP • MySQL • Tailwind CSS • JavaScript

---

## 📄 License

This project was developed for educational purposes.
