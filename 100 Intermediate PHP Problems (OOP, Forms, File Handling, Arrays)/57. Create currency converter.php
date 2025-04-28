<?php
// Currency rates (relative to USD)
$exchange_rates = [
    'USD' => 1,
    'EUR' => 0.85,
    'GBP' => 0.75,
    'JPY' => 110,
    'INR' => 74,
];

$converted_amount = null;

if (isset($_POST['convert'])) {
    $amount = floatval($_POST['amount']);
    $from_currency = $_POST['from_currency'];
    $to_currency = $_POST['to_currency'];

    if (isset($exchange_rates[$from_currency]) && isset($exchange_rates[$to_currency])) {
        // Convert amount to USD first, then to target currency
        $amount_in_usd = $amount / $exchange_rates[$from_currency];
        $converted_amount = $amount_in_usd * $exchange_rates[$to_currency];
    } else {
        echo "Invalid currency selected.";
    }
}
?>

<h2>Simple Currency Converter</h2>

<form method="POST">
    Amount: <input type="text" name="amount" required><br><br>

    From: 
    <select name="from_currency" required>
        <?php foreach ($exchange_rates as $currency => $rate) {
            echo "<option value='$currency'>$currency</option>";
        } ?>
    </select><br><br>

    To: 
    <select name="to_currency" required>
        <?php foreach ($exchange_rates as $currency => $rate) {
            echo "<option value='$currency'>$currency</option>";
        } ?>
    </select><br><br>

    <button type="submit" name="convert">Convert</button>
</form>

<?php
if ($converted_amount !== null) {
    echo "<h3>Converted Amount: " . number_format($converted_amount, 2) . " $to_currency</h3>";
}
?>
