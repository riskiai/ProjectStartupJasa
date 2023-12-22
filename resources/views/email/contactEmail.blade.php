<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        section {
            padding: 20px;
        }

        h2 {
            color: #007bff;
        }

        p {
            line-height: 1.6;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Ada Pesan Masuk nih BOSS!!</h1>
        </header>
        <section>
            <h2>Ada Pesan Masuk Nih</h2>
            <p><strong>Name:</strong> {{ $mailData['name'] }}</p>
            <p><strong>Email:</strong> {{ $mailData['email'] }}</p>
            <p><strong>Phone:</strong> {{ $mailData['phone'] }}</p>
            <p><strong>Message:</strong> {{ $mailData['message'] }}</p>
        </section>
        <footer>
            <p>Terima kasih</p>
        </footer>
    </div>

</body>
</html>
