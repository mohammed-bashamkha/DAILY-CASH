# DAILY-CASH

A simple **daily cashier management system** built with Laravel, designed for small shops, restaurants, or businesses to track daily sales, expenses, and net profit.

---

## 🚀 Features

* Record daily sales operations
* Add and track expenses
* Calculate net income (Sales − Expenses)
* Simple and user‑friendly dashboard
* Edit and delete financial records
* User accounts and roles (if enabled)

---

## 🛠️ Tech Stack

| Technology        | Purpose                    |
| ----------------- | -------------------------- |
| Laravel (PHP)     | Core application framework |
| MySQL             | Database                   |
| Blade + Bootstrap | UI and layout              |
| Git & GitHub      | Version control            |

---

## 📥 Installation

```bash
git clone https://github.com/mohammed-bashamkha/DAILY-CASH.git
cd DAILY-CASH

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## ⚙️ Configure .env

```env
DB_DATABASE=daily_cash
DB_USERNAME=root
DB_PASSWORD=
```

> Update values according to your local environment.

---

## ▶️ Run the Project

```bash
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000
```

---

## 👤 Author

**Mohammed Bashamkha**
GitHub: [https://github.com/mohammed-bashamkha](https://github.com/mohammed-bashamkha)

---

Feel free to fork, improve, and contribute to the project!
