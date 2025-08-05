# Image Upload and Profile Management System

A simple web application built with PHP, MySQL, HTML, and CSS that allows users to register, log in, upload images with captions, and view their profile with a gallery of uploaded images.

Features

- **User Registration and Login**: Users can create an account and log in securely using email and password.
- **Image Upload**: Authenticated users can upload images with captions.
- **Profile Page**: Displays user information and a gallery of their uploaded images.
- **Responsive Design**: Styled with CSS for a modern, mobile-friendly interface.
- **Secure Authentication**: Passwords are hashed using PHP’s `password_hash` function.
- **Session Management**: Uses PHP sessions to maintain user authentication state.

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Server**: Local server (e.g., XAMPP, WAMP, or LAMP)
- **Styling**: Custom CSS with responsive design

## Prerequisites

- PHP 7.4 or higher
- MySQL or MariaDB
- A web server (e.g., Apache) with PHP support
- A MySQL database
- A local or remote server environment (e.g., XAMPP, WAMP, or a hosting provider)

## Installation

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   ```

   Replace `your-username` and `your-repo-name` with your GitHub username and repository name.

2. **Set Up the Web Server**:

   - Place the project folder in your web server’s root directory (e.g., `htdocs` for XAMPP).
   - Ensure your web server (e.g., Apache) and MySQL are running.

3. **Create the Database**:

   - Create a MySQL database (e.g., `image_upload_db`).

   - Run the following SQL to create the necessary tables:

     ```sql
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         email VARCHAR(255) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL,
         profile_name VARCHAR(100) NOT NULL
     );
     
     CREATE TABLE images (
         id INT AUTO_INCREMENT PRIMARY KEY,
         profile_name VARCHAR(100) NOT NULL,
         image_path VARCHAR(255) NOT NULL,
         caption TEXT,
         upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

4. **Configure Database Connection**:

   - Open `register.php`, `upload.php`, `profile.php`, and `login.php`.

   - Update the following variables with your database credentials:

     ```php
     $servername = "localhost";
     $username = "your_database_username";
     $password = "your_database_password";
     $dbname = "your_database_name";
     ```

   - Replace `your_database_username`, `your_database_password`, and `your_database_name` with your actual MySQL credentials.

5. **Set Up Upload Directory**:

   - Create a folder named `Uploads` in the project root directory.
   - Ensure the `Uploads` folder has write permissions (e.g., `chmod 777 Uploads` on Linux).
   - Verify that the folder path in `upload.php` (`$target_dir = "Uploads/";`) matches your setup.

6. **Access the Application**:

   - Open your browser and navigate to `http://localhost/your-project-folder/index.html`.
   - Register a new account or log in to start using the application.

## Usage

1. **Home Page (**`index.html`**)**:
   - Provides links to log in or create a new account.
2. **Sign Up (**`signup.html`**)**:
   - Enter your email, password, and profile name to register.
3. **Login (**`login.html`**)**:
   - Log in with your email and password to access your profile.
4. **Profile (**`profile.php`**)**:
   - View your profile information and uploaded images.
   - Use the `+` button to navigate to the upload page.
5. **Upload (**`upload.html`**)**:
   - Upload an image with an optional caption.
   - Images are saved in the `Uploads` folder and displayed in the profile gallery.

## GitHub Deployment Notes

To ensure the project works smoothly when uploaded to GitHub, consider the following:

- **Database Credentials**:

  - The provided PHP files (`register.php`, `upload.php`, `profile.php`, `login.php`) contain placeholder database credentials (`username`, `password`, `dbname`). Update these with actual values before deployment.

  - **Do not commit sensitive credentials to GitHub**. Use a `.gitignore` file to exclude a configuration file (e.g., `config.php`) containing sensitive data:

    ```gitignore
    config.php
    Uploads/*
    ```

  - Create a `config.php` file to store database credentials and include it in the PHP files:

    ```php
    <?php
    $servername = "localhost";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "your_database_name";
    ?>
    ```

    Then, update the PHP files to include `config.php`:

    ```php
    include 'config.php';
    ```

- **Uploads Folder**:

  - The `Uploads` folder will store user-uploaded images. Since GitHub is not a hosting platform, you cannot directly run PHP or store uploaded files on GitHub. Host the project on a server (e.g., Heroku, a VPS, or a shared hosting provider) that supports PHP and MySQL.
  - Ensure the `Uploads` folder is included in the repository if you want to track its structure, but exclude actual uploaded files using `.gitignore`.

- **File Permissions**:

  - Ensure the `Uploads` folder has the correct permissions (e.g., `777` for testing, `755` for production) on your hosting server.
  - Verify that your hosting environment allows file uploads and that the PHP `upload_max_filesize` and `post_max_size` settings are sufficient.

- **Relative Paths**:

  - The project uses relative paths (e.g., `Uploads/`, `styles.css`). Ensure your hosting environment maintains the same directory structure.
  - If deploying to a subdirectory, adjust paths in `upload.php` and `profile.php` as needed.

- **Dependencies**:

  - The project has no external dependencies beyond PHP and MySQL, making it lightweight and easy to deploy.
  - Ensure your hosting provider supports PHP 7.4+ and MySQL.

- **Security Considerations**:

  - Validate and sanitize user inputs to prevent SQL injection and XSS attacks (current code uses prepared statements, which is good practice).
  - Consider adding file type validation in `upload.php` to restrict uploads to image files (e.g., PNG, JPG).
  - Use HTTPS on your production server to secure user data.

## Potential Issues

- **Database Connection Errors**: Ensure your database credentials are correct and the MySQL server is running.
- **File Upload Issues**: Verify that the `Uploads` folder exists and has write permissions. Check PHP’s `file_uploads` setting in `php.ini`.
- **Session Issues**: Ensure PHP sessions are enabled on your server.
- **GitHub Limitations**: GitHub is a version control platform, not a hosting service. You cannot run PHP or MySQL directly on GitHub. Use a hosting provider for deployment.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit (`git commit -m "Add feature"`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

#php #mysql #login #signup #authentication #webdevelopment #phpdeveloper #authsystem #xampp #backend #fullstack #webapp #html #css #javascript 
