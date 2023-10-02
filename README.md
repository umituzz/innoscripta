# Installation Guide

Before proceeding with the installation, please make sure that Git and Docker are working smoothly on your system.

## Installation Steps

First, clone the project to the desired directory using Git:

```bash
git clone https://github.com/umituzz/innoscripta
```
Then navigate to the project directory:

```cd innoscripta```

## Docker Setup
Build docker images

``docker-compose up -d --build``

Check if there are any issues with your running containers using the following command:

``docker ps``

If there are any issues, inspect the logs, and ensure that Docker is functioning correctly on your computer.

## Database Setup

To interact with the Laravel container and perform database-related tasks, you can enter the container with the following command:

``docker exec -it backend bash``

You can reset the database and populate Redis with data using the following command. And also don't forget to execute jobs.

```
php artisan setup
php artisan queue:work
php artisan sync
```

Make sure the relevant keys in the .env file are set to use Redis:

```
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
```

## Admin and User Login Credentials
Admin user login: email: admin@innoscripta.com, password: 123456789
User user login: email: user@innoscripta.com, password: 123456789

## Scheduled Tasks
To monitor scheduled tasks, use the following command:

``php artisan schedule:work``

To monitor queued jobs, use the following command:

``php artisan queue:work``

## Email Configuration
To receive emails, you can use the free test application from mailtrap.io. Configure the email settings in the .env file with your mailtrap.io credentials:


```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=YOUR_USER_NAME
MAIL_PASSWORD=YOUR_PASSWORD
MAIL_FROM_NAME="${APP_NAME}"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
```

## Horizon Dashboard

You can view and manage queued jobs via the Horizon dashboard by running the following command inside the Laravel container:

``php artisan horizon``

## Customizing Scheduled Tasks
Scheduled tasks are set to run every minute for testing purposes. You can customize the schedule frequency in the Console/Kernel.php file. Check the <a href="https://laravel.com/docs/10.x/scheduling#schedule-frequency-options">Laravel documentation</a> for scheduling options.

## Running Tests and Viewing Coverage
You can run tests and view coverage reports using the following command:

``php artisan test --coverage-html=coverage``

This command will generate an HTML coverage report in the "coverage" directory, where you can see all coverage statistics.

## Postman Documentation Link
https://documenter.getpostman.com/view/4271692/2s9YJXZkTA#47977498-8c5e-4039-a64f-ec9c025bd8a6