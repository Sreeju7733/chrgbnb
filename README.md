# chrgbnb ⚡
### The Airbnb for EV Charging

**chrgbnb** is a decentralized, community-driven electric vehicle (EV) charging network. It allows homeowners and businesses (Hosts) to list their private charging stations, and EV owners (Drivers) to find, book, and pay for charging sessions seamlessly.

![Version](https://img.shields.io/badge/version-1.0.0-blue)
![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![License](https://img.shields.io/badge/license-MIT-green)

---

## 🌟 Key Features

### 🏡 Premium Landing Page
- **"ChargeBnB" Experience**: A high-end public storefront for guests.
- **AOS Animations**: Modern scroll-based animations for an interactive feel.
- **Public Map Discovery**: Guests can browse chargers and locations without logging in.

### 🚗 Driver Experience
- **Interactive Search**: Leaflet.js powered map with real-time location filtering.
- **Dynamic Pricing**: Intelligent cost estimation based on charger type, power, and time of day.
- **Booking Management**: Seamless flow from discovery to reservation.
- **History Tracking**: View past charging sessions and total energy consumed.

### 🏠 Host Experience
- **Station Management**: Add, edit, and monitor charging stations.
- **QR Code System**: Generate unique QR codes for physical stations for instant driver access.
- **Revenue Tracking**: Monitor earnings from shared energy.
- **Status Control**: Toggle stations between 'Active' and 'Maintenance' modes.

### 👑 Admin Suite
- **Global Overview**: Monitor the entire network, users, and bookings.
- **User Management**: Oversee Hosts and Drivers.

---

## 🛠️ Tech Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade, Bootstrap 5, Vanilla JavaScript
- **Maps**: Leaflet.js (OpenStreetMap)
- **Styling**: Premium Custom CSS (Glassmorphism, Dark/Light modes)
- **Animations**: AOS (Animate On Scroll), FontAwesome 6
- **Database**: MySQL / PostgreSQL

---

## 🚀 Installation Process

Follow these steps to get your local development environment running:

### 1. Clone the Repository
```bash
git clone https://github.com/Sreeju7733/hackathon.git
cd hackathon
```

### 2. Install Dependencies
```bash
composer install
npm install && npm run build
```

### 3. Environment Configuration
Copy the example environment file and configure your database settings:
```bash
cp .env.example .env
```
*Open `.env` and update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.*

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Database Setup & Seeding
Run the migrations and seed the database with demo accounts (Admin, Host, Driver) and chargers:
```bash
php artisan migrate:fresh --seed
```

### 6. Start the Server
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` to see the landing page!

---

## 👤 Demo Credentials

| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `admin@example.com` | `password` |
| **Driver** | `driver@example.com` | `password` |
| **Host** | `host@example.com` | `password` |

---

## 📄 License

The chrgbnb platform is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---
Developed with ❤️ by **Antigravity**
