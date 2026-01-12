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
| Blade + TailwindCSS | UI and layout              |
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

## To Install TailwindCSS In Laravel Project With Vite 👇

This guide explains how to install and configure **Tailwind CSS** using **Vite** for modern frontend development.

## 📦 Prerequisites

Make sure you have the following installed:

- Node.js (v16 or higher recommended)
- npm or yarn
- A project using Vite (or Laravel with Vite)

---

## 🚀 Step 1: Install Tailwind CSS and Dependencies

Run the following command to install Tailwind CSS and its required dependencies:

```bash
npm install -D tailwindcss postcss autoprefixer
````

Then generate the Tailwind configuration files:

```bash
npx tailwindcss init -p
```

This will create:

* `tailwind.config.js`
* `postcss.config.js`

---

## ⚙️ Step 2: Configure Tailwind Paths

Open `tailwind.config.js` and update the `content` section:

### For Vite (Vanilla / React / Vue):

```js
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx,vue}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

### For Laravel + Vite:

```js
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

---

## 🎨 Step 3: Add Tailwind Directives

Open your main CSS file (example: `resources/css/app.css` or `src/style.css`) and add:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

---

## 🔗 Step 4: Import CSS into Vite

Make sure the CSS file is imported in your main JavaScript entry file:

### Example (Vite):

```js
import './style.css'
```

### Example (Laravel Vite):

```js
import '../css/app.css';
```

---

## ▶️ Step 5: Run the Development Server

Start Vite:

```bash
npm run dev
```

---

## ✅ Step 6: Test Tailwind

Add a Tailwind class to your HTML or Blade file:

```html
<h1 class="text-3xl font-bold text-blue-600">
  Tailwind CSS is working!
</h1>
```

If styles appear correctly, Tailwind is successfully installed 🎉
