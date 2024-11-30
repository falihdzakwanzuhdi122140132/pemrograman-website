<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea,
        select,
        button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Form Pendaftaran</h1>
    <form id="registrationForm" method="POST" action="process.php" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" required minlength="3" maxlength="50">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Umur</label>
        <input type="number" id="age" name="age" required min="1" max="100">

        <label for="gender">Jenis Kelamin</label>
        <select id="gender" name="gender" required>
            <option value="">Pilih...</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="file">Upload File (.txt)</label>
        <input type="file" id="file" name="file" required accept=".txt">

        <button type="submit">Submit</button>
    </form>

    <script>
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const age = document.getElementById('age').value.trim();
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];

            if (name.length < 3 || name.length > 50) {
                alert('Nama harus antara 3-50 karakter.');
                return false;
            }

            if (age <= 0 || age > 100) {
                alert('Umur harus antara 1-100.');
                return false;
            }

            if (file) {
                const fileSize = file.size / 1024 / 1024;
                const fileType = file.type;

                if (fileType !== 'text/plain') {
                    alert('File harus berformat .txt.');
                    return false;
                }

                if (fileSize > 2) {
                    alert('Ukuran file tidak boleh melebihi 2MB.');
                    return false;
                }
            } else {
                alert('File harus diunggah.');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>