<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Top Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            color: #2F5F00;
            margin-bottom: 10px;
        }
        .info {
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="title">Struk Pembayaran Token</div>
    <div class="info"><span class="label">Tanggal:</span> {{ $date }}</div>
    <div class="info"><span class="label">ID Transaksi:</span> {{ $transaction->id }}</div>
    <div class="info"><span class="label">User:</span> {{ $transaction->user->username ?? '-' }}</div>
    <div class="info"><span class="label">Jumlah Token:</span> {{ $transaction->token_amount }}</div>
    <div class="info"><span class="label">Total Harga:</span> Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</div>
    <div class="info"><span class="label">Status:</span> {{ ucfirst($transaction->status) }}</div>

    <div class="footer">Terima kasih telah melakukan top up di layanan kami.</div>
</body>
</html>
