<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate Now</title>
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
    .container {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 420px;
      text-align: center;
    }
    h2 {
      color: #2e7d32;
      margin-bottom: 20px;
    }
    input, textarea {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }
    button {
      background: linear-gradient(135deg, #56ab2f, #3d8b40);
      color: white;
      padding: 12px;
      border: none;
      width: 100%;
      margin-top: 12px;
      cursor: pointer;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
    }
    button:hover {
      background: linear-gradient(135deg, #3d8b40, #2e7d32);
      transform: scale(1.03);
    }
    .note {
      margin-top: 15px;
      font-size: 13px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Donate Now</h2>
    <form action="process_donation.php" method="POST">
      <input type="text" name="company_name" placeholder="Company Name" required>
      <input type="number" name="quantity" placeholder="Food Quantity (kg)" required>
      <textarea name="address" placeholder="Company Address" required></textarea>
      <input type="tel" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required>
      <button type="submit">Donate</button>
    </form>
    <p class="note">Your small donation can bring a big change ❤️</p>
  </div>
</body>
</html>
