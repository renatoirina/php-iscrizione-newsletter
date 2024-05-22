<?php
// Avvio della sessione se non è già avviata
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Controllo se l'indirizzo email è memorizzato nella sessione
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Mostro la pagina di ringraziamento solo se l'email è presente
if ($email):
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Grazie per esserti registrato!</title>
    <!-- Includo il CSS di Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Grazie per esserti registrato!</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead">Abbiamo registrato il tuo indirizzo email: <strong><?php echo htmlspecialchars($email); ?></strong></p>
                        <a href="index.php" class="btn btn-primary">Torna alla Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Distruggo la sessione dopo aver mostrato il messaggio di ringraziamento
session_destroy();
else:
    // Se l'email non è presente nella sessione, reindirizzo alla pagina principale
    header('Location: index.php');
    exit();
endif;
?>
