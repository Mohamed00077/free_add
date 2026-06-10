# free_add

# 📢 Plateforme d'Annonces — Laravel

Une plateforme web complète permettant aux utilisateurs de publier et consulter des annonces (articles, services, offres diverses), facilitant la mise en relation entre acheteurs et vendeurs.

---

## 🚀 Technologies utilisées

- **Framework** : Laravel 11
- **Language** : PHP 8.2+
- **Base de données** : MySQL
- **Frontend** : Blade + Tailwind CSS
- **Stockage fichiers** : Laravel Storage (images des annonces)

---

## ✨ Fonctionnalités

- 📝 Publier une annonce (titre, description, prix, catégorie, images)
- 🔍 Rechercher et filtrer les annonces par catégorie, prix, localisation
- 👤 Gestion des comptes utilisateurs (inscription, connexion, profil)
- 🗂️ Tableau de bord utilisateur (mes annonces)
- 🛡️ Panel d'administration (modération des annonces)

---

## ⚙️ Installation

### Prérequis

- PHP >= 8.2
- Composer
- MySQL


### Étapes

```bash
# 1. Cloner le projet
git clone git@github.com:Mohamed00077/free_add.git   
cd free_add\MmsShop

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier d'environnement
cp .env.example .env

# 4. Générer la clé de l'application
php artisan key:generate

# 5. Configurer la base de données dans .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=plateforme_annonces
DB_USERNAME=root
DB_PASSWORD=

# 6. Lancer les migrations et les seeders
php artisan migrate --seed

# 7. Créer le lien symbolique pour le stockage
php artisan storage:link

# 8. Démarrer le serveur
php artisan serve
```

L'application sera accessible sur `http://localhost:8000`

---

## 🗂️ Structure du projet

```
├── app/
│   ├── Http/Controllers/
│   │   ├── AnnonceController.php
│   │   ├── CategorieController.php
│   │   └── ProfileController.php
│   ├── Models/
│   │   ├── Annonce.php
│   │   ├── Categorie.php
│   │   └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── annonces/
│       ├── auth/
│       └── layouts/
└── routes/
    └── web.php
```

---

## 🗄️ Modèle de base de données

| Table        | Description                          |
|--------------|--------------------------------------|
| `users`      | Comptes utilisateurs                 |
| `ads`        | Annonces publiées                    |


---

## 🔐 Rôles

| Rôle          | Permissions                                      |
|---------------|--------------------------------------------------|
| `visiteur`    | Consulter et rechercher des annonces             |
| `utilisateur` | Publier, modifier, supprimer ses propres annonces|
| `admin`       | Modérer toutes les annonces et les utilisateurs  |

---

## 📸 Captures d'écran

<img width="960" height="510" alt="image" src="https://github.com/user-attachments/assets/3a959d1b-3ffb-4fc0-875a-b9798520c149" />


---

## 🤝 Contribuer

Les contributions sont les bienvenues !

```bash
# Crée une branche
git checkout -b feature/ma-fonctionnalite

# Commit tes changements
git commit -m "feat: ajout de ma fonctionnalité"

# Push et ouvre une Pull Request
git push origin feature/ma-fonctionnalite
```

---



## 👤 Auteur

**Ton Nom** — [GitHub](https://github.com/Mohamed00077) 
