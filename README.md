# Aglet Movies - Laravel 11 Project

## Overview

This project is a web application built with **Laravel 11** that allows users to browse movies, view details, and add movies to their favourites list. It integrates with **The Movie Database (TMDB) API** to fetch movie data. The application includes user authentication, a favourites system, and a responsive UI.

## Features

-   Browse movies and TV shows.
-   View details about movies, including ratings, release dates, and posters.
-   Add movies to a favourites list.
-   User authentication (login/logout).
-   Responsive design for seamless use on all devices.

---

## Setup Instructions

### Prerequisites

Before setting up the project, ensure you have the following installed:

-   **PHP 8.2+**
-   **Composer** (for PHP dependency management)
-   **Node.js** (for frontend dependencies)
-   **MySQL** (or any other supported database)
-   **Git** (for version control)

### Step 1: Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/BrendonChirume/aglet-movies.git
cd aglet-movies
```

### Step 2: Install Dependencies

Install PHP dependencies using Composer:

```bash
composer install
```

Install frontend dependencies using npm:

```bash
npm install
```

### Step 3: Set Up Environment Variables

1. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

### Step 4: Generate Application Key

Generate a Laravel application key:

```bash
php artisan key:generate
```

### Step 5: Run Migrations and Seeders

Run the database migrations and seeders to set up the database:

```bash
php artisan migrate --seed
```

### Step 6: Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

Visit the application in your browser at `http://localhost:8000`.

### Step 7: Compile Frontend Assets

Compile the frontend assets using Vite:

```bash
npm run dev
```

---

## Default Login Details

Use the following credentials to log in:

-   **Email:** `jointheteam@aglet.co.za`
-   **Password:** `@TeamAglet`

---

## Database Dump

A database dump (`aglet_movies.sql`) is included in the repository. You can import it into your MySQL database using the following command:

```bash
mysql -u <your_mysql_username> -p aglet_movies < aglet_movies.sql
```

---

## Rationale and Approach

### Why Laravel?

-   **Rapid Development:** Laravel provides a robust framework with built-in features like authentication, routing, and database migrations, which significantly speed up development.
-   **Ecosystem:** Laravel has a rich ecosystem with tools like Eloquent ORM, Blade templating, and Artisan CLI, making it ideal for building scalable web applications.
-   **Community Support:** Laravel has a large and active community, ensuring access to plenty of resources and third-party packages.

### Why Alpine.js?

-   **Lightweight:** Alpine.js is a minimal JavaScript framework that adds interactivity to the UI without the overhead of larger frameworks like Vue or React.
-   **Ease of Use:** Alpine.js integrates seamlessly with Laravel Blade templates, making it ideal for small, dynamic UI components like the favourites button.

---

## Project Structure

-   **Controllers:** Handle application logic and API requests.
-   **Models:** Represent database tables and relationships.
-   **Views:** Blade templates for rendering the UI.
-   **Routes:** Define application endpoints.
-   **Migrations:** Database schema definitions.
-   **Seeders:** Populate the database with initial data.
-   **Public Assets:** Compiled CSS and JavaScript files.

---

## License

This project is open-source and available under the [MIT License](LICENSE).

---

## Contact

For any questions or feedback, please contact:

-   **Brendon Chirume**
-   **Email:** brendonchirume@example.com
-   **GitHub:** [BrendonChirume](https://github.com/BrendonChirume)

---

Thank you for reviewing my project! 🚀
