<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = intval($_POST['age']);
    $gender = trim($_POST['gender']);

    // Validasi server-side
    if (empty($name) || strlen($name) < 3 || strlen($name) > 50) {
        die('Nama tidak valid.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Email tidak valid.');
    }
    if ($age <= 0 || $age > 100) {
        die('Umur tidak valid.');
    }
    if (empty($gender)) {
        die('Jenis kelamin tidak valid.');
    }

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = mime_content_type($fileTmpPath);

        if ($fileType !== 'text/plain') {
            die('File harus berupa teks (.txt).');
        }

        if ($fileSize > 2 * 1024 * 1024) { // 2MB
            die('Ukuran file terlalu besar (maksimum 2MB).');
        }


        $fileContents = file($fileTmpPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        session_start();
        $_SESSION['data'] = [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'gender' => $gender,
            'fileContents' => $fileContents,
            'browser' => $_SERVER['HTTP_USER_AGENT']
        ];

        header('Location: result.php');
        exit;
    } else {
        die('File gagal diunggah.');
    }
} else {
    die('Metode request tidak valid.');
}
