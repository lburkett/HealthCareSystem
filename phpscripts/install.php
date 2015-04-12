<?php
    function installBlog() {
        // Get the PDO DSN string
        $root = getRootPath();
        $database = getDatabasePath();

        $error = '';

        // Avoids anyone resetting the database if it already exists
        if (is_readable($database) && filesize($database) > 0) {
            $error = 'Please delete the existing database manually before installing it afresh.';
        }

        // Create an empty file for the database
        if (!$error) {
            $createdOk = @touch($database);
            if (!$createdOk) {
                $error = sprintf(
                    'Could not create the database, please allow the server to create new files in \'%s\'',
                    dirname($database)
                );
            }
        }

        // Grab the SQL commands we want to run on the database
        if (!$error) {
            $sql = file_get_contents($root . '/data/init.sql');

            if ($sql === false) {
                $error = 'Cannot find SQL file';
            }
        }

        // Connect to the new database and try to run the SQL commands
        if (!$error) {
            $pdo = getPDO();
            $result = $pdo->exec($sql);
            if ($result === false) {
                $error = 'Could not run SQL: ' . print_r($pdo->errorInfo(), true);
            }
        }

        // See how many rows we created, if any
        $count = array();

        foreach(array('patient', 'doctor') as $tableName) {
            if (!$error) {
                $sql = "SELECT COUNT(*) AS c FROM " . $tableName;
                $stmt = $pdo->query($sql);
                if ($stmt) {
                    // We store each count in an associative array
                    $count[$tableName] = $stmt->fetchColumn();
                }
            }
        }

        return array($count, $error);
    }

    function createDoctor(PDO $pdo, $username, $length = 10) {
        // Creates a random password
        $alpha = range(ord('A'), ord('z'));
        $alphaLength = count($alpha);

        $password = '';
        for($i = 0; $i < $length; $i++) {
            $letterCode = $alphabet[rand(0, $alphaLength - 1)];
            $password .= chr($letterCode);
        }

        $error = '';
        // Insert credentials into database
        $sql = "INSERT INTO doctor(name, profession, email, password)
                VALUES (:name, :profession, :email, :password)";
        $stmt = $pdo->prepare($sql);
        if($stmt === false) {
            $error = 'Could not prepare the user creation';
        }

        // Password hash
        if (!$error) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if ($hash === false) {
                $error = 'Password hashing failed';
            }
        }

        if (!$error) {
            $result = $stmt->execute(
                array(
                    'name' => "admin",
                    'profession' => "admin",
                    'email' => $username,
                    'password' => $hash
                )
            );
            if($result === false) {
                $error = 'Could not run the user creation';
            }
        }

        if ($error) {
            $password = '';
        }
        return array($password, $error);
    }
?>
