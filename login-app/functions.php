<?php 

function setActiveClass($pageName) {
    $current_page = basename($_SERVER['PHP_SELF']);
    return ($current_page === $pageName) ? "active": '';
}

function getPageClass() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

function is_user_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function redirect($location) {
    header("Location:$location");
    exit;
}

function full_month($reg_date) {
    return date("F j", strtotime($reg_date));
}