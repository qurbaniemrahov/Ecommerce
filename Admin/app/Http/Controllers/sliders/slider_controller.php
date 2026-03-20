<?php
session_start();
include __DIR__ . "/../../../../config/connection.php";

$redirectUrl = "/Ecommerce/Admin/public/banner.php";
$uploadDir = __DIR__ . "/../../../../public/uploads/sliders";
$publicUploadBase = "/Ecommerce/Admin/public/uploads/sliders";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

function redirectWithMessage(string $type, string $message, string $redirectUrl): void
{
    $_SESSION['banner_flash'] = [
        'type' => $type,
        'message' => $message,
    ];

    header("Location: {$redirectUrl}");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithMessage('warning', 'Invalid request method.', $redirectUrl);
}

$action = $_POST['action'] ?? 'create';

if ($action === 'delete') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($id <= 0) {
        redirectWithMessage('danger', 'Slider ID is invalid.', $redirectUrl);
    }

    $stmt = $pdo->prepare("SELECT image FROM sliders WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $slider = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$slider) {
        redirectWithMessage('warning', 'Slider not found.', $redirectUrl);
    }

    $deleteStmt = $pdo->prepare("DELETE FROM sliders WHERE id = :id");
    $deleteStmt->execute([':id' => $id]);

    $imagePath = $slider['image'] ?? '';
    if ($imagePath !== '' && !empty($_SERVER['DOCUMENT_ROOT'])) {
        $localImage = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . $imagePath;
        if (is_file($localImage)) {
            unlink($localImage);
        }
    }

    redirectWithMessage('success', 'Slider deleted successfully.', $redirectUrl);
}

$title = trim($_POST['title'] ?? '');
$image = $_FILES['image'] ?? null;

if ($title === '') {
    redirectWithMessage('danger', 'Slider title is required.', $redirectUrl);
}

if (!$image || ($image['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
    redirectWithMessage('danger', 'Please choose an image to upload.', $redirectUrl);
}

$allowedMimeTypes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp',
];

$detectedMimeType = mime_content_type($image['tmp_name']);

if (!isset($allowedMimeTypes[$detectedMimeType])) {
    redirectWithMessage('danger', 'Only JPG, PNG, or WEBP images are allowed.', $redirectUrl);
}

if (($image['size'] ?? 0) > 5 * 1024 * 1024) {
    redirectWithMessage('danger', 'Image size must be 5 MB or smaller.', $redirectUrl);
}

$safeTitle = preg_replace('/[^A-Za-z0-9_-]+/', '-', strtolower($title));
$safeTitle = trim($safeTitle ?? 'slider', '-');
$extension = $allowedMimeTypes[$detectedMimeType];
$fileName = uniqid($safeTitle . '-', true) . '.' . $extension;
$targetPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
$dbPath = $publicUploadBase . '/' . $fileName;

if (!move_uploaded_file($image['tmp_name'], $targetPath)) {
    redirectWithMessage('danger', 'Image upload failed.', $redirectUrl);
}

$stmt = $pdo->prepare("INSERT INTO sliders (title, image) VALUES (:title, :image)");
$stmt->execute([
    ':title' => $title,
    ':image' => $dbPath,
]);

redirectWithMessage('success', 'Slider uploaded successfully.', $redirectUrl);
?>
