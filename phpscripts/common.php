<?php
    /* Returns the root path of the project */
    function getRootPath() {
        return realpath(__DIR__ . '/..');
    }

    /* Returns the full path for the database file */
    function getDatabasePath() {
        return getRootPath() . '/data/data.sqlite';
    }

    /* Returns the sqlite connection string */
    function getDsn() {
        return 'sqlite:' . getDatabasePath();
    }

    /* Returns the PDO object for database access */
    function getPDO() {
        return new PDO(getDsn());
    }

    /* Escapes HTML for safe output */
    function htmlEscape($html) {
        return htmlspecialchars($html, ENT_HTML5, 'UTF-8');
    }

    function redirectAndExit($script) {
        // Get the domain-relative URL (e.g. /blog/whatever.php or /whatever.php) and work
        // out the folder (e.g. /blog/ or /).
        $relativeUrl = $_SERVER['PHP_SELF'];
        $urlFolder = substr($relativeUrl, 0, strrpos($relativeUrl, '/') + 1);

        // Redirect to the full URL (http://myhost/blog/script.php)
        $host = $_SERVER['HTTP_HOST'];
        $fullUrl = 'http://' . $host . $urlFolder . $script;
        header('Location: ' . $fullUrl);
        exit();
    }

    function determineSeverityColor($avg) {
        if ($avg >= 8) {
            return " sev-red";
        }
        if ($avg >= 6) {
            return " sev-orange";
        }
        if ($avg >= 4) {
            return " sev-yellow";
        }

    }
?>
