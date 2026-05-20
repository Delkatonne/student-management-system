<?php

session_start();

// Charger autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Charger les classes de l'application
require_once dirname(__DIR__) . '/src/Config/Database.php';
require_once dirname(__DIR__) . '/src/Controllers/AuthController.php';
require_once dirname(__DIR__) . '/src/Controllers/StudentController.php';
require_once dirname(__DIR__) . '/src/Controllers/CourseController.php';
require_once dirname(__DIR__) . '/src/Controllers/GradeController.php';
require_once dirname(__DIR__) . '/src/Controllers/DashboardController.php';
require_once dirname(__DIR__) . '/src/Models/User.php';
require_once dirname(__DIR__) . '/src/Models/Student.php';
require_once dirname(__DIR__) . '/src/Models/Course.php';
require_once dirname(__DIR__) . '/src/Models/Grade.php';
require_once dirname(__DIR__) . '/src/Utils/Helper.php';

use App\Config\Database;
use App\Controllers\AuthController;
use App\Controllers\StudentController;
use App\Controllers\CourseController;
use App\Controllers\GradeController;
use App\Controllers\DashboardController;

// Initialiser la base de données
Database::getInstance();

// Récupérer la route
$request = $_GET['page'] ?? 'dashboard';
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Router simple
try {
    switch ($request) {
        case 'login':
            if ($method === 'POST') {
                AuthController::login();
            } else {
                AuthController::showLoginForm();
            }
            break;

        case 'logout':
            AuthController::logout();
            break;

        case 'dashboard':
            requireLogin();
            DashboardController::index();
            break;

        case 'students':
            requireLogin();
            StudentController::index();
            break;

        case 'student-create':
            requireLogin();
            if ($method === 'POST') {
                StudentController::create();
            } else {
                StudentController::showCreateForm();
            }
            break;

        case 'student-edit':
            requireLogin();
            $id = $_GET['id'] ?? null;
            if ($method === 'POST') {
                StudentController::update($id);
            } else {
                StudentController::showEditForm($id);
            }
            break;

        case 'student-delete':
            requireLogin();
            $id = $_GET['id'] ?? null;
            StudentController::delete($id);
            break;

        case 'student-view':
            requireLogin();
            $id = $_GET['id'] ?? null;
            StudentController::show($id);
            break;

        case 'courses':
            requireLogin();
            CourseController::index();
            break;

        case 'course-create':
            requireLogin();
            if ($method === 'POST') {
                CourseController::create();
            } else {
                CourseController::showCreateForm();
            }
            break;

        case 'course-edit':
            requireLogin();
            $id = $_GET['id'] ?? null;
            if ($method === 'POST') {
                CourseController::update($id);
            } else {
                CourseController::showEditForm($id);
            }
            break;

        case 'course-delete':
            requireLogin();
            $id = $_GET['id'] ?? null;
            CourseController::delete($id);
            break;

        case 'grades':
            requireLogin();
            GradeController::index();
            break;

        case 'grade-create':
            requireLogin();
            if ($method === 'POST') {
                GradeController::create();
            } else {
                GradeController::showCreateForm();
            }
            break;

        case 'grade-edit':
            requireLogin();
            $id = $_GET['id'] ?? null;
            if ($method === 'POST') {
                GradeController::update($id);
            } else {
                GradeController::showEditForm($id);
            }
            break;

        case 'grade-delete':
            requireLogin();
            $id = $_GET['id'] ?? null;
            GradeController::delete($id);
            break;

        default:
            header('HTTP/1.0 404 Not Found');
            echo "Page non trouvée";
            break;
    }
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}

/**
 * Vérifier si l'utilisateur est connecté
 */
function requireLogin()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: ?page=login');
        exit;
    }
}
