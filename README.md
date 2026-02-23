<div align="center">
  <h1>🚀 JobMutch</h1>
  <p><strong>Plateforme moderne de recrutement, de networking et de messagerie en temps réel.</strong></p>

  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire" alt="Livewire">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
  <img src="https://img.shields.io/badge/WebSockets-Reverb-blue?style=for-the-badge" alt="Reverb">
</div>

---

## 📖 À propos du projet

**JobMutch** est une application web innovante conçue pour connecter les recruteurs et les chercheurs d'emploi de manière fluide et interactive. Au-delà d'un simple site d'offres d'emploi, JobMutch intègre des fonctionnalités de réseau social professionnel (système d'amitié) et de **messagerie instantanée (Chat)** grâce à la puissance des WebSockets.

L'interface est rendue ultra-réactive (sans rechargement de page) grâce à **Laravel Livewire**.

---

## ✨ Fonctionnalités Principales

### 🔒 Sécurité & Accès (Géré via Spatie Permission)
- Authentification complète (Inscription, Connexion, Mot de passe oublié) via **Laravel Breeze/Jetstream**.
- Gestion stricte des rôles : **Recruteur** (Entreprise) & **Candidat** (Chercheur d'emploi).
- Modification de profil (Photo, Bio, Mot de passe avec vérification).

### 👨‍💻 Espace Chercheur d'Emploi
- **Profil type CV dynamique :** Gestion du titre (ex: Dev Fullstack), formations, expériences détaillées et compétences.
- **Networking :** Système de demandes d'amitié (Ajouter, Accepter, Refuser).
- **Emploi :** Recherche d'offres ciblées, consultation détaillée et postulation en un clic.

### 🏢 Espace Recruteur
- **Gestion des offres :** Création d'annonces (Titre, Description, Type de contrat, Image obligatoire).
- **Suivi :** Consultation des candidatures reçues pour chaque poste.
- **Clôture :** Possibilité de fermer une offre une fois le recrutement terminé.

### ⚡ Fonctionnalités Avancées (Tech Highlights)
- **💬 Chat en Temps Réel :** Messagerie instantanée entre utilisateurs propulsée par **Laravel Reverb**.
- **🔍 Recherche Optimisée :** Moteur de recherche d'utilisateurs par nom ou spécialité.
- **🚀 Lazy Loading :** Chargement différé des listes d'offres d'emploi via Livewire pour des performances optimales.

---

## 🛠 Stack Technique

* **Backend :** Laravel 11, PHP 8.2+
* **Frontend :** Laravel Livewire, Tailwind CSS, Alpine.js
* **Base de données :** MySQL (Relations Eloquent avancées : 1:1, 1:N, N:M)
* **WebSockets :** Laravel Reverb
* **Gestion des Rôles :** `spatie/laravel-permission`
* **Tests & Data :** Migrations, Seeders et Factories intégrés.

---

## ⚙️ Installation & Configuration

Suivez ces étapes pour installer le projet en local :

### 1. Cloner le dépôt
```bash
git clone [https://github.com/votre-username/jobmutch.git](https://github.com/votre-username/jobmutch.git)
cd jobmutch
2. Installer les dépendances
Bash
composer install
npm install
3. Configurer l'environnement
Dupliquez le fichier d'environnement et générez la clé d'application :

Bash
cp .env.example .env
php artisan key:generate
⚠️ N'oubliez pas de configurer vos accès de base de données (DB_*) et les variables Reverb (REVERB_APP_ID, REVERB_APP_KEY, etc.) dans le fichier .env.

4. Base de données (Migrations & Seeders)
Le projet contient des données de test (rôles, utilisateurs, offres) grâce aux Factories/Seeders :

Bash
php artisan migrate:fresh --seed
5. Compiler les assets
Bash
npm run build
# ou pour le développement : npm run dev
6. Lancer les serveurs
Pour faire fonctionner l'application complète (y compris le chat), vous avez besoin de lancer 3 processus dans des terminaux différents :

Terminal 1 : Serveur Web

Bash
php artisan serve
Terminal 2 : Serveur WebSockets (Reverb)

Bash
php artisan reverb:start
Terminal 3 : Vite (Assets)

Bash
npm run dev
🗄️ Architecture des Données (Relations)
Le modèle de données exploite pleinement Eloquent :

One-to-One : User ↔ Profile (CV, Bio, Photo).

One-to-Many : Recruiter ↔ Jobs | Job ↔ Applications.

Many-to-Many : Users ↔ Friends (Système d'amitié) | Users ↔ Skills.

<div align="center">
<i>Développé avec ❤️ passion et Laravel.</i>
</div>


**Quelques conseils supplémentaires pour ton repo GitHub :**
