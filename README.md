# StuViS — Student Violation System

A lightweight web application to record, manage, and report student violations. Built with Laravel (PHP) and MySQL. Designed for Administrators, Teachers, Students and Parents.

## Intended users & roles
- Administrator
    - Full system access: manage users, roles, settings, violation types, run reports, and view all records.
- Teacher
    - Create and update violations for students, view class-level reports, and communicate with parents.
- Student
    - View personal violation history, submit appeals, and receive notifications.
- Parent
    - View their child's violation history, receive notifications, and respond to teacher messages where applicable.

## Key features
- Role-based access (Admin, Teacher, Student, Parent)
- Record and categorize student violations with severity, status, and evidence
- Manage students, staff, parents, and violation types
- Violation history, filtering, and export (CSV/PDF)
- Notifications and basic messaging between teachers and parents
- Import/export (CSV) and basic search/filter
- Audit logs and activity history

## Tech stack
- Backend: Laravel (PHP 8+)
- Database: MySQL 5.7+/8.x
- Frontend: Blade, optional Vue/React
- Tooling: Composer, Artisan, npm (optional)

## Requirements
- PHP 8.0+
- Composer
- MySQL
- Node.js & npm (if using frontend assets)
- Git

## Installation

1. Clone repository
```bash
git clone git@github.com:hqms/StuViS.git stuvis
cd stuvis
```

2. Install PHP dependencies
```bash
composer install
```

3. Copy environment file and generate app key
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure MySQL in `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stuvis_db
DB_USERNAME=stuvis_user
DB_PASSWORD=your_password
```

5. Run migrations and seeders (seeder creates default roles and sample users)
```bash
php artisan migrate --seed
```

6. (Optional) Install frontend dependencies and build assets
```bash
npm install
npm run dev    # or npm run build
```

7. Serve application
```bash
php artisan serve
# Visit http://127.0.0.1:8000
```

## Sample accounts (after seeding)
- Admin: admin@example.com / password
- Teacher: teacher@example.com / password
- Student: student@example.com / password
- Parent: parent@example.com / password
(Adjust credentials in seeders or .env for production.)

## Usage notes
- Administrators: configure roles and permissions, create violation categories, and run system-wide reports.
- Teachers: use class roster to add violations, attach evidence, and notify parents.
- Students & Parents: authenticate to view records, notifications, and submit/respond to appeals.

## Testing
Run the test suite:
```bash
php artisan test
```

## Deployment notes
- Use proper APP_ENV and APP_DEBUG settings in production
- Secure environment variables and DB credentials
- Configure queue workers and scheduler if background jobs are used
- Use supervised process (e.g., Supervisor) for queue and horizon
- Enable HTTPS and set up backups for the database

## Project structure (high level)
- app/ — core application logic (Models, Policies, Services)
- database/ — migrations & seeders (roles, sample users)
- resources/views — Blade templates
- routes/ — web and api routes
- tests/ — automated tests

## Contributing
- Fork the repo, create a feature branch, open a PR
- Follow PSR-12 and Laravel conventions
- Write tests for new features/bugs

## License
MIT

## Maintainers
- [hqms](https://github.com/hqms)
- [zhafranmrakha-netizen](https://github.com/zhafranmrakha-netizen)
