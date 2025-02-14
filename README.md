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

Build frontend by using npm:

```bash
npm run build
```

### Step 3: Set Up Environment Variables

1. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```
2. Update the `.env` file with your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=aglet_movies
    DB_USERNAME=<your_mysql_username>
    DB_PASSWORD=<your_mysql_password>
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

## Technology Choices and Rationale

### Framework Choice: Laravel

I chose Laravel as the primary framework for this project for several key reasons:

1. **Robust Authentication System**: Given the requirement for user authentication (login functionality for favorites), Laravel's built-in authentication system provides a secure, well-tested solution that handles user sessions and security out of the box.

2. **Eloquent ORM**: For managing the relationship between users and their favorite movies, Laravel's Eloquent ORM makes it straightforward to define and work with database relationships. This was particularly important for maintaining the favorites list functionality.

3. **API Integration**: Laravel's HTTP client and Guzzle integration makes it clean and efficient to interact with The Movie Database API. The framework's service container allows for easy management of API configurations and rate limiting.

4. **Request Validation**: The framework's request validation features help ensure robust data handling, particularly important for the contact form and favorites management.

### Database Choice: MySQL

MySQL was selected as the database solution for the following reasons:

1. **Structured Data**: The project primarily deals with structured data (users, favorite movies) with clear relationships, making a relational database like MySQL an ideal choice.

2. **Performance**: MySQL's indexing capabilities ensure quick retrieval of user favorites and efficient joins between tables, which is crucial for the favorites listing interface.

3. **Data Integrity**: The requirement to maintain user accounts and their associated favorite movies benefits from MySQL's ACID compliance and foreign key constraints, ensuring data consistency.

4. **Scalability**: While the current scope is limited to handling individual user favorites, MySQL's ability to handle increasing data volumes makes it future-proof if the application needs to scale.

### Additional Technical Decisions

1. **Pagination Implementation**: Used Laravel's built-in pagination features to handle the 9-movie-per-page requirement efficiently, reducing unnecessary database loads.

2. **Cache Layer**: Implemented caching for the movie data from the external API to reduce API calls and improve response times.

3. **Repository Pattern**: Adopted the repository pattern to separate database logic from controllers, making the code more maintainable and testable.

## These technology choices prioritize maintainability, security, and performance while providing a solid foundation for potential future enhancements.

## Contact

For any questions or feedback, please contact:

-   **Brendon Chirume**
-   **Email:** brendonchirume@example.com
-   **GitHub:** [BrendonChirume](https://github.com/BrendonChirume)

---

Thank you for reviewing my project! 🚀
