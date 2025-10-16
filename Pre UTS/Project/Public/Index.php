<?php
require_once __DIR__ . '/../app/Controllers/Karyawancontrollers.php';

$controller = new KaryawanController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action) {
    case 'index':
        $controller->index();
        break;
    
    case 'create':
        $controller->create();
        break;
    
    case 'store':
        $controller->store();
        break;
    
    case 'edit':
        if(isset($_GET['nik'])) {
            $controller->edit($_GET['nik']);
        } else {
            // === PERBAIKAN DI SINI ===
            header("Location: index.php");
            exit();
        }
        break;
    
    case 'update':
        $controller->update();
        break;
    
    case 'delete':
        if(isset($_GET['nik'])) {
            $controller->delete($_GET['nik']);
        } else {
            // === PERBAIKAN DI SINI ===
            header("Location: index.php");
            exit();
        }
        break;
    
    default:
        $controller->index();
        break;
}
?>