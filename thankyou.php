<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #56ab2f, #a8e063);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .thankyou-box {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      text-align: center;
      max-width: 400px;
      animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    h1 {
      color: #2e7d32;
      margin-bottom: 15px;
    }
    p {
      font-size: 16px;
      color: #444;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: linear-gradient(135deg, #56ab2f, #3d8b40);
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      transition: 0.3s ease;
    }
    a:hover {
      background: linear-gradient(135deg, #3d8b40, #2e7d32);
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="thankyou-box">
    <h1>🎉 Thank You!</h1>
    <p>Your donation has been successfully recorded.  
       Your kindness will help feed someone in need ❤️</p>
    <a href="donate.php">Donate Again</a>
  </div>
</body>
</html>
