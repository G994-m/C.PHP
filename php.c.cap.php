<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ITC Workshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
        }

        header {
            background: #f0dae7;
            color: #000c0f;
            padding: 15px;
            position: relative;
            text-align: center;
        }

      
        .logo-section img {
            position: absolute;
            top: 10px;
            left:9px;
            width: 90px;
        }

        nav {
            background: #eee;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #333;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            padding: 20px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        p {
            line-height: 1.6;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-bottom: 30px;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        tr:nth-child(even) {
            background: #fff5fd;
        }

        form {
            background: #fff;
            padding: 20px;
            width: 350px;
            margin: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"] {
            background: #27ae60;
            color: #fff;
        }

        button[type="reset"] {
            background: #c0392b;
            color: #fff;
        }

        .msg {
            padding: 10px;
            margin-bottom: 14px;
            border-radius: 9px;
            text-align: center;
        }

      footer {
    background:#f0dae7;
    color:#000c0f;
    text-align: center;
    padding: 15px;
    margin-top: 40px;
}


.section {
    text-align: center;
    margin: 20px 0;
}

.center-img {
    width: 300px;
    display: block;
    margin: auto;
}

    </style>
</head>

<body>

<header>
    <div class="logo-section">
        <img src="w.jpg" alt="workshop_img">
    </div>
    <h1>ITC WORKSHOP</h1>
</header>

<nav>
    <a href="#">HOME</a>
    <a href="#">ABOUT US</a>
    <a href="#">HELP</a>
</nav>

<main>

<h2>Software Development Workshop (SDW01)</h2>
<div class="section">
    <img src="w.jpeg" alt="logo" class="center-img">
</div>

<p>
This workshop supports new trainers by providing a secure way to communicate
with other trainers and their enrolled workshop team.
</p>

<h2>What trainers are going to learn</h2>
<ul>
    <li>Access workshop information</li>
    <li>View workshop details</li>
    <li>Submit a registration request</li>
</ul>

<h2>Workshop Details</h2>
<table>
    <tr><td>Workshop ID</td><td>1</td></tr>
    <tr><td>Name</td><td>Software Development Workshop</td></tr>
    <tr><td>Code</td><td>SDW01</td></tr>
    <tr><td>Level</td><td>Beginner</td></tr>
    <tr><td>Delivery Mode</td><td>Blended</td></tr>
    <tr><td>Location</td><td>Qatif</td></tr>
    <tr><td>Duration</td><td>6 Weeks</td></tr>
    <tr><td>Start Date</td><td>2026-01-05</td></tr>
    <tr><td>End Date</td><td>2026-02-15</td></tr>
    <tr><td>Seats Available</td><td>20</td></tr>
</table>

<h2>Workshop Registration</h2>

<?php
$host = 'localhost';
$dbname = 'workshop_db';
$user = 'root';
$pass = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $workshop = $_POST['workshop'];

    if ($id && $name && $date && $workshop) {
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $stmt = $conn->prepare(
                "INSERT INTO registrations (user_id, name, date, workshop)
                 VALUES (?, ?, ?, ?)"
            );
            $stmt->execute([$id, $name, $date, $workshop]);

            echo "<div class='msg' style='background:#d4edda;color:#155724'>
                  Registration successful!
                  </div>";
        } catch (PDOException $e) {
            echo "<div class='msg' style='background:#f8d7da;color:#721c24'>
                  Error occurred
                  </div>";
        }
    } else {
        echo "<div class='msg' style='background:#f8d7da;color:#721c24'>
              Please fill all fields
              </div>";
    }
}
?>

<form method="POST">
    <label>Date</label>
    <input type="date" name="date" required>

    <label>ID</label>
    <input type="text" name="id" required>

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Workshop</label>
    <select name="workshop" required>
        <option value="">Select Workshop</option>
        <option value="Web Development">Web Development</option>
        <option value="Mobile Apps">Mobile Apps</option>
        <option value="Data Science">Data Science</option>
    </select>

    <div style="margin-top:15px;">
        <button type="submit">Submit</button>
        <button type="reset">Cancel</button>
    </div>
</form>

</main>

<footer>
    <p>© 2023 | Designed by Ghala | ITC Workshop</p>
</footer>

</body>
</html>