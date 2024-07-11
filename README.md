# Full Stack Engineer Assessment

## Overview

This repository contains the completed technical assessment for the Junior Full Stack Engineer position.


## How to Run

1. **Clone the repository:**
   ```bash
   git clone [repository link]
   cd [repository directory]
   ```
2. **Copy the .env.example file to .env:**
   ```bash
   cp .env.example .env
   ```
3. **Configure the .env file:**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
4. **Start the application:**
   ```bash
   php artisan app:start
   ```
5. **Access the application:**
   ```bash
   http://127.0.0.1:8000
   ```
## Running Tests
To ensure the application is working correctly, you can run the unit tests using the following command:
   ```bash
   php artisan test
   ```

## GitHub Actions
This repository includes a GitHub Actions workflow that runs the tests automatically on each push or pull request to the main branch. The workflow is defined in .github/workflows/laravel.yml.
