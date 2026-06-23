
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ប្រព័ន្ធគ្រប់គ្រងសៀវភៅ</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; padding: 20px; }
        .form-container { 
            max-width: 600px; 
            margin: 0 auto; 
            background: #fff; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
        }
        input, select { 
            width: 100%; 
            padding: 10px; 
            margin-top: 5px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            box-sizing: border-box;
        }
        button { 
            margin-top: 15px; 
            padding: 10px 20px; 
            background-color: #007bff; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 16px;
        }
        button:hover { background-color: #0056b3; }
        a { text-decoration: none; color: #007bff; display: inline-block; margin-bottom: 15px; }
    </style>
</head>
<body>

    <div class="form-container">
        @yield('content')
    </div>

</body>
</html>