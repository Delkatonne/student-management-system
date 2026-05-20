# Student Management System 📚

Système complet de gestion des étudiants en PHP - Une application web moderne pour gérer les inscriptions, les notes et les dossiers des étudiants.

## 🌟 Fonctionnalités

- ✅ Gestion complète des étudiants (création, modification, suppression)
- ✅ Gestion des cours et inscriptions
- ✅ Suivi des notes et performances
- ✅ Système d'authentification sécurisé
- ✅ Tableau de bord administrateur
- ✅ Génération de rapports
- ✅ Interface responsive et intuitive

## 📋 Prérequis

- **PHP** >= 7.4
- **MySQL** ou **MariaDB**
- **Apache** ou **Nginx** (avec support `.htaccess` pour Apache)
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js** et **npm** (optionnel, pour les outils de build)

## 🚀 Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/Delkatonne/student-management-system.git
cd student-management-system
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configurer la base de données

```bash
# Copier le fichier de configuration
cp config/.env.example config/.env

# Éditer config/.env avec vos paramètres MySQL
nano config/.env
```

Fichier `.env` exemple :
```
DB_HOST=localhost
DB_PORT=3306
DB_NAME=student_management
DB_USER=root
DB_PASSWORD=votre_password
```

### 4. Créer la base de données

```bash
php bin/migrate.php
```

### 5. Démarrer le serveur

**Avec PHP intégré :**
```bash
php -S localhost:8000 -t public
```

**Avec Apache :**
- Configurer le `DocumentRoot` vers le dossier `public/`
- S'assurer que `mod_rewrite` est activé

## 📁 Structure du projet

```
student-management-system/
├── public/              # Fichiers publics (index.php, CSS, JS)
├── src/
│   ├── Controllers/     # Contrôleurs
│   ├── Models/          # Modèles de données
│   ├── Views/           # Templates
│   └── Utils/           # Fonctions utilitaires
├── config/              # Configuration
├── database/
│   ├── migrations/      # Migrations SQL
│   └── seeders/         # Données d'exemple
├── tests/               # Tests unitaires
├── vendor/              # Dépendances Composer
└── README.md
```

## 🔐 Authentification par défaut

Après l'installation, vous pouvez vous connecter avec :

- **Utilisateur :** `admin@example.com`
- **Mot de passe :** `admin123`

⚠️ **Changez ces identifiants dès la première connexion !**

## 📖 Utilisation

### Accéder à l'application

Ouvrez votre navigateur et allez à :
```
http://localhost:8000
```

### Principales pages

- **Tableau de bord :** `/dashboard`
- **Gestion des étudiants :** `/students`
- **Gestion des cours :** `/courses`
- **Notes et résultats :** `/grades`
- **Paramètres :** `/settings`

## 🧪 Tests

```bash
vendor/bin/phpunit
```

## 🐛 Dépannage

### Erreur "Permission denied" sur les dossiers

```bash
chmod -R 755 storage/
chmod -R 755 public/uploads/
```

### Erreur de connexion à la base de données

- Vérifier que MySQL est démarré
- Vérifier les identifiants dans `.env`
- Vérifier que la base de données existe

### Page blanche après l'installation

Vérifier les logs dans `storage/logs/error.log`

## 📚 Documentation supplémentaire

- [Guide du développeur](docs/DEVELOPER.md)
- [API Reference](docs/API.md)
- [FAQ](docs/FAQ.md)

## 🤝 Contribution

Les contributions sont bienvenues ! Pour contribuer :

1. Créer une branche (`git checkout -b feature/AmazingFeature`)
2. Commiter vos changements (`git commit -m 'Add some AmazingFeature'`)
3. Pousser vers la branche (`git push origin feature/AmazingFeature`)
4. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 📧 Support

Pour toute question ou problème, veuillez ouvrir une [issue](https://github.com/Delkatonne/student-management-system/issues).

---

**Développé avec ❤️ par [Delkatonne](https://github.com/Delkatonne)**