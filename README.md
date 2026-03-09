# Espace d'Emploi

<div align="center">
  <p>A professional platform connecting Candidates and Recruiters, featuring real-time messaging, connections, and sophisticated job application management.</p>
</div>

## ✨ Features

- **RBAC & Authentication:** Robust role-based access control with Spatie Laravel Permission (Recruiter vs Candidate).
- **Candidate Dashboard:** Manage Profiles, Resumes (CVs), Educations, Experiences, and apply for Vacancies.
- **Recruiter Dashboard:** Post job Vacancies, review Candidate applications, and control job offers.
- **Real-Time Messaging:** Powered by Laravel Reverb for real-time WebSocket communication between connected users.
- **Connections System:** Send, accept, or decline friend/professional connection requests.
- **Modern UI:** Built seamlessly with Livewire, Tailwind CSS, and AlpineJS for a fast, SPA-like feel.

## 🛠️ Tech Stack

- **Backend:** Laravel 12.0 API, PHP 8.2+
- **Frontend:** Livewire 4.1, AlpineJS, Tailwind CSS
- **Real-Time:** Laravel Reverb & Laravel Echo
- **Database:** PostgreSQL (configurable)
- **Roles/Permissions:** Spatie Laravel Permission

## 🚀 Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone <repo_url>
   cd Espace-d-Emploi
   ```

2. **Install PHP and Node dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Update your `.env` file to configure your Database credentials (e.g., PostgreSQL settings) and configure Laravel Reverb variables.*

4. **Run Migrations & Seeders:**
   ```bash
   php artisan migrate --seed
   ```

## 💻 Running the Project

To run the project locally, you need to spin up multiple services (Server, Queue, Vite, and Reverb). Simply run:

```bash
npm run dev
```

*This command utilizes `concurrently` to start `php artisan serve`, `queue:listen`, and `vite` all at once.*
To start the WebSocket server explicitly:
```bash
php artisan reverb:start
```

## 🤝 Contribution Guidelines

1. Fork the Project.
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`).
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the Branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

## 📜 License

This project is licensed under the MIT License.
