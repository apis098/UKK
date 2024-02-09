<?php

$uploadDirectory = 'uploads/';

if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $files = $_FILES['file'];

    foreach ($files['name'] as $key => $name) {
        $fileSize = $files['size'][$key];
        $fileName = $files['name'][$key];
        $fileTmp = $files['tmp_name'][$key];
        $fileError = $files['error'][$key];

        if ($fileError === UPLOAD_ERR_OK) {
            $destination = $uploadDirectory . $fileName;
            move_uploaded_file($fileTmp, $destination);

            $response[] = [
                'name' => $fileName,
                'size' => $fileSize,
                'destination' => $destination,
                'status' => 'success',
            ];
        } else {
            $response[] = [
                'name' => $fileName,
                'status' => 'failed',
                'error' => $fileError,
            ];
        }
    }
} else {
    $response = [
        'status' => 'failed',
        'message' => 'No file received.',
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
