<?php
/**
 * @var $pdo
 */

$perPage = 5;
$stmt = $pdo->prepare("SELECT COUNT(*) from article" );
$stmt->execute();
$count = $stmt->fetchColumn();

$pages = ceil($count / $perPage);
$offset = 0;
$currentPage = (int)($_GET['page'] ?? null);
$currentPage = $currentPage > 0 ? $currentPage : 1;
$offset = ($currentPage - 1) * $perPage;

$stmt = $pdo->prepare("SELECT * from article ORDER BY id DESC LIMIT ?, ?" );
$stmt->execute([$offset, $perPage]);
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/index.php';

