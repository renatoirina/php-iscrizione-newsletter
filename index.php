<?php
// Logica di validazione dell'email
$email = '';  // Inizializzo la variabile email come stringa vuota
$emailValid = null;  // Inizializzo la variabile per tracciare la validità dell'email

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se il form è stato inviato, prendo l'input email
    $email = $_POST["email"];
    // Pulisco l'email per rimuovere caratteri non validi
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Controllo se l'email contiene una "@" e un "."
    if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
        $emailValid = true;  // L'email è valida
    } else {
        $emailValid = false;  // L'email non è valida
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
                        <?php if ($emailValid === true): ?>
                            <p class="text-success mt-3">L'indirizzo email è valido.</p>
                        <?php elseif ($emailValid === false): ?>
                            <p class="text-danger mt-3">L'indirizzo email non è valido. Assicurati che contenga una chiocciola (@) e un punto (.).</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
