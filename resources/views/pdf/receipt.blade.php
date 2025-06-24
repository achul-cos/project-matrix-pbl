<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk Topup - {{ $transaction->id }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 12px; }
        .container { width: 80mm; margin: 0 auto; padding: 10px; }
        .header { text-align: center; margin-bottom: 10px; }
        .title { font-weight: bold; font-size: 16px; margin-bottom: 5px; }
        .divider { border-top: 1px dashed #000; margin: 10px 0; }
        .item { display: flex; justify-content: space-between; margin-bottom: 5px; }
        .footer { text-align: center; margin-top: 15px; font-size: 10px; }
        .center { text-align: center; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Invoice Topup Token Matrix</div>
            <div>Politeknik Negeri Batam, Kota Batam</div>
            <div>Telp: (+62) 896-6891-4466</div>
        </div>
        
        <div class="divider"></div>
        
        <div class="item">
            <span>ID Transaksi:</span>
            <span>{{ $transaction->id }}</span>
        </div>
        <div class="item">
            <span>Tanggal:</span>
            <span>{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y, H:i') }}</span>
        </div>
        <div class="item">
            <span>Nama:</span>
            <span>{{ $transaction->user->username }}</span>
        </div>
        
        <div class="divider"></div>
        
        <div class="item">
            <span>Jumlah Token:</span>
            <span>{{ $transaction->tokens }}</span>
        </div>
        <div class="item">
            <span>Total:</span>
            <span>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
        </div>
        <div class="item">
            <span>Metode:</span>
            <span>
                @if($transaction->method === 'cash')
                    Tunai
                @elseif($transaction->method === 'transfer')
                    Transfer
                @elseif($transaction->method === 'online')
                    Online
                @else
                    Kupon
                @endif
            </span>
        </div>
        
        <div class="divider"></div>
        
        <div class="center bold" style="margin: 15px 0;">
            TERIMA KASIH TELAH TOPUP DAN ADA PC YANG GAK SABAR UNTUK DISEWA
        </div>
        
        <div class="footer">
            {{ $date }}<br>
            Copyrighted MATRIX 2025
        </div>
    </div>
</body>
</html>