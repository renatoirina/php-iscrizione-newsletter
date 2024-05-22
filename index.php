<?php
// Includo il file functions.php una sola volta utilizzando il percorso assoluto
include_once __DIR__ . '/functions.php';

// Avvio della sessione se non è già avviata
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Logica di validazione dell'email
$email = '';
$emailValid = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se il form è stato inviato, prendo l'input email
    $email = $_POST["email"];
    
    // Verifico se l'email è valida usando la funzione dal file functions.php
    $emailValid = isEmailValid($email);

    if ($emailValid) {
        // Memorizzo l'email nella sessione
        $_SESSION['email'] = $email;
        // Reindirizzo alla pagina di ringraziamento
        header('Location: thankyou.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Form di Validazione Email</title>
    <!-- Includo il CSS di Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Inserisci il tuo indirizzo email</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <!-- Campo di input per l'email -->
                                <input type="text" class="form-control" name="email" placeholder="Inserisci la tua email" value="<?php echo htmlspecialchars($email); ?>" required>
                            </div>
                            <!-- Pulsante di invio -->
                            <button type="submit" class="btn btn-primary">Invia</button>
                        </form>

                        <!-- Mostro il risultato della validazione -->
                        <?php if ($emailValid === false): ?>
                            <div class="alert alert-danger mt-3">L'indirizzo email non è valido. Assicurati che contenga una chiocciola (@) e un punto (.).</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
