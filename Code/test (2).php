<?php
    if ($_POST["username"]) {
        // Get username and password values from the submitted form.
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Connect to the database.
        $db = new mysqli("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

        // Check if an error happened when connecting.
        if ($db->connect_error) {
            echo("Well an error happened");
        }

        // Query the database for the user and their actual password.
        $result = $db->query("SELECT password FROM users WHERE username={$username}");

        if ($result->num_rows > 0) {
            // Get the result row.
            $row = $result->fetch_assoc();

            // Get the user's actual password.
            $actualPassword = $row["password"];

            // Check if the provided password matches.
            if ($password === $actualPassword) {
                echo("YOU LOGGED IN, MUCH CONGRATULATIONS");

                // Start a session that will last between different pages.
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["username"] = $username;
            }
        }

    }
?>


<html>

<body>
    <form method="POST" action="test.php">
        <p>Enter username:</p><input type="text" name="username">
        <p>Enter password:</p><input type="password" name="password">
        <button type="submit">Submit</button>
    </form>
</body>

</html>