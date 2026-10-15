# Hostel Management System (HMS)

A full-stack web application designed for campus dormitory administration, student room allocations, booking requests, and administrative fee tracking.

## Overview

Managing student housing across multi-building campuses requires synchronized student records, room inventory tracking, and payment status verification. This application provides dual interfaces for students (booking requests, profile management, complaint logs) and administrators (room capacity allocation, lease tracking, and student directories).

## Features

- **Room Inventory & Capacity Tracking**: Real-time room status (vacant, partially occupied, full) by floor and room tier.
- **Student Profile Management**: Structured intake capturing emergency contact information, academic program, and assigned dormitory.
- **Admin Control Panel**: Approval workflows for room requests, tenant directory filtering, and fee collection summaries.
- **Relational Schema**: Relational MySQL schema with foreign key constraints guaranteeing referential integrity across students, rooms, and billing entries.

## Project Structure

```
Hostel-Management-System/
├── database/
│   └── hmsystem.sql        # Database schema, table structures, and seed administrative records
├── src/                    # PHP application controllers, templates, and database adapters
├── .gitignore              # OS and IDE ignore rules
├── LICENSE                 # MIT License
└── README.md               # Application overview and installation guide
```

## Getting Started

### Prerequisites
- PHP 7.4+ or PHP 8.x
- MySQL or MariaDB
- Web server (Apache, Nginx, or XAMPP)

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Siddhesh-Bhande/Hostel-Management-System.git
   cd Hostel-Management-System
   ```

2. Import the database schema:
   ```bash
   mysql -u <username> -p < database/hmsystem.sql
   ```

3. Configure database connection parameters inside `src/` to match your local database credentials.

4. Host via local PHP built-in server or Apache:
   ```bash
   php -S localhost:8000 -t src/
   ```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
