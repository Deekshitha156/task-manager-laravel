# 📝 Simple Task Management System

## 📌 Project Description
This is a Laravel-based Task Management System that allows users to manage their daily tasks efficiently.  
Users can create, view, update, mark tasks as completed, and delete tasks.  
It is a single-user application with a clean and simple UI.

---

## 🚀 Features
- ➕ Add new tasks  
- 📋 View all tasks  
- ✏️ Edit task details  
- ✅ Mark tasks as completed  
- ❌ Delete tasks  
- 🎯 Set task priority (Low, Medium, High)  
- 📊 Track task status (Pending / Completed)  
- 🎨 Clean UI using Bootstrap  

---

## 📸 Screenshots

### 🏠 Home Page
![Home](screenshots/home.png)

### ➕ Create Task
![Create](screenshots/add_task.png)

### 📋 View Tasks
![View](screenshots/view_task.png)

### ✏️ Edit Task
![Edit](screenshots/edit_task.png)

---
## 🛠️ Technologies Used
- **Backend:** PHP (Laravel Framework)  
- **Frontend:** HTML, CSS, Bootstrap  
- **Database:** MySQL  
- **Tools:** Composer, Git, GitHub  

---

## ⚙️ Setup Instructions
Follow these steps to run the project locally:

### 1. Clone the repository
git clone https://github.com/Deekshitha156/task-manager-laravel.git

### 2. Navigate to project folder
cd task-manager-laravel

### 3. Install dependencies
composer install

### 4. Copy environment file
cp .env.example .env

### 5. Generate application key
php artisan key:generate

### 6. Configure database
Open `.env` file and update:
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=

### 7. Run migrations
php artisan migrate

### 8. Start development server
php artisan serve

### 9. Open in browser
http://127.0.0.1:8000/tasks

---

## 🗄️ Database Information
- Database is not included in the project  
- Tables are created using Laravel migrations  
- Run `php artisan migrate` to set up the database  

---

## 📁 Project Structure
- `app/` → Controllers & Models  
- `routes/` → Web routes  
- `resources/views/` → Blade templates  
- `database/migrations/` → Table structure  
- `public/` → Public assets  

---

## 🎯 Key Concepts Used
- MVC Architecture  
- Laravel Resource Routing  
- Form Validation  
- Blade Templating  
- Session Flash Messages  

---

## 👩‍💻 Author
**Deekshitha Poojary**

---

## ⭐ Conclusion
This project demonstrates a basic implementation of a Task Management System using Laravel, focusing on CRUD operations, clean UI, and proper MVC structure.
