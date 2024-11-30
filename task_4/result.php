<?php
session_start();
if (!isset($_SESSION['data'])) {
    die('Tidak ada data yang tersedia.');
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Data Pendaftaran</h1>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= htmlspecialchars($data['gender']) ?></td>
        </tr>
        <tr>
            <td>Browser/Sistem Operasi</td>
            <td><?= htmlspecialchars($data['browser']) ?></td>
        </tr>
    </table>

    <h2>Isi File</h2>
    <table>
        <tr>
            <th>Baris</th>
            <th>Konten</th>
        </tr>
        <?php foreach ($data['fileContents'] as $index => $line): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>