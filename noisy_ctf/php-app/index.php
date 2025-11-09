<?php
// Simple ads search (intentionally vulnerable for CTF)
$host = 'db';
$db   = 'ctf';
$user = 'ctf';
$pass = 'ctfpass';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "DB error"; exit;
}

$query = isset($_GET['query']) ? $_GET['query'] : '';

if ($query === '') {
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Noisy Echidna Security Centre</title>';
    echo '<style>body{font-family:Arial} .ad{border:1px solid #ddd;padding:8px;margin:8px 0}</style>';
    echo '</head><body><h1>Noisy Echidna Latest Security Efforts</h1>';
    echo '<form method="get" action="/index.php"><input name="query" placeholder="Echidna" size="40"/>';
    echo '<button>Search what Noisy Echidna is up to</button></form>';
    echo '<p>Example: search for "Echidna"</p>';
    echo '</body></html>';
    echo '<img src="/img/D.png" alt="Noisy Echidna Security Alert">';
    exit;
}



$blocked = ['union', 'select', 'into', 'outfile', 'dumpfile', 'load_file', 'drop', 'delete', 'update', 'insert', 'alter', 'create', 'exec', 'execute', 'UNION', 'SELECT', 'INTO', 'OUTFILE', 'DUMPFILE', 'LOAD_FILE', 'DROP', 'DELETE', 'UPDATE', 'INSERT', 'ALTER', 'CREATE', 'EXEC', 'EXECUTE'];

foreach ($blocked as $keyword) {
    if (strpos($query, $keyword) !== false) {
        echo "Blocked: suspicious query detected";
        exit;
    }
}

// VULNERABLE SQL: direct concatenation -> SQLi
$sql = "SELECT title, description FROM security_alerts WHERE title LIKE '%" . $query . "%' OR description LIKE '%" . $query . "%';";
try {
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Query error"; exit;
}

echo '<!doctype html><html><head><meta charset="utf-8"><title>Noisy Echidna Security Activity</title></head><body>';
echo '<h1>Search results</h1>';
foreach ($rows as $r) {
    echo '<div class="ad"><strong>' . htmlspecialchars($r['title']) . '</strong><p>' . htmlspecialchars($r['description']) . '</p></div>';
}

echo '<img src="/img/D.png" alt="Noisy Echidna Security Alert">';
echo '</body></html>';

