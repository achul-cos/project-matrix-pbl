<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Topup - {{ $transaction->id }}</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif;
      background-color: #EDF7E1;
      padding: 20px;
      color: #333;
    }

    .receipt {
      max-width: 520px;
      background-color: #fff;
      border-radius: 16px;
      margin: auto;
      padding: 28px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 2px dashed #4D7A00;
    }

    .receipt-header {
      background-color: #4D7A00;
      padding: 24px;
      border-radius: 12px;
      text-align: center;
      color: #fff;
      position: relative;
    }

    .logo-container {
      position: absolute;
      top: -30px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 60px;
      background-color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .logo-container img {
      max-width: 50px;
      max-height: 50px;
      border-radius: 50%;
    }

    .receipt-header h2 {
      margin-top: 40px;
      font-size: 22px;
      font-weight: bold;
    }

    .receipt-header p {
      margin-top: 4px;
      font-size: 14px;
      color: #e0e0e0;
    }

    .section {
      margin-top: 28px;
    }

    .section-title {
      font-weight: 700;
      font-size: 16px;
      margin-bottom: 12px;
      border-bottom: 2px solid #4D7A00;
      padding-bottom: 6px;
      color: #4D7A00;
    }

    .row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .row span:first-child::after {
      content: ": ";
    }

    .row span:first-child {
      color: #555;
    }

    .row span:last-child {
      font-weight: 600;
    }

    .footer {
      margin-top: 32px;
      text-align: center;
      font-size: 12px;
      color: #888;
    }

    .thank-you {
      text-align: center;
      margin-top: 30px;
      padding: 14px;
      background: #F0FAEA;
      color: #3B6F00;
      border-radius: 10px;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="receipt">
    <div class="receipt-header">
      <div class="logo-container">
        <img 
        src="img/logo/Matrix_Icon_Square_Logo_Green.png" 
        alt="Logo"
        class="logo-hijau">
      </div>
      <h2>MATRIX WARNET</h2>
      <p>Politeknik Negeri Batam</p>
    </div>

    <div class="section">
      <div class="section-title">Informasi Transaksi</div>
      <div class="row"><span>ID Transaksi</span><span>{{ $transaction->id }}</span></div>
      <div class="row"><span>Tanggal</span><span>{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y, H:i') }}</span></div>
      <div class="row"><span>Status</span><span style="color: green;">Berhasil</span></div>
      <div class="row"><span>Metode Pembayaran</span><span>{{ ucfirst($transaction->method) }}</span></div>
    </div>

    <div class="section">
      <div class="section-title">Informasi Pengguna</div>
      <div class="row"><span>Nama Pengguna</span><span>{{ $transaction->user->username }}</span></div>
      <div class="row"><span>Email</span><span>{{ $transaction->user->email ?? '-' }}</span></div>
      <div class="row"><span>ID Pengguna</span><span>{{ $transaction->user->id }}</span></div>
    </div>

    <div class="section">
      <div class="section-title">Detail Pembayaran</div>
      <div class="row"><span>Jumlah Token</span><span>{{ $transaction->tokens }} Token</span></div>
      <div class="row"><span>Harga per Token</span><span>Rp 2.000</span></div>
      <div class="row"><span>Subtotal</span><span>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span></div>
      <div class="row"><span>Pajak</span><span>Rp 0</span></div>
      <div class="row" style="border-top:1px solid #ccc; margin-top: 10px; padding-top: 10px;">
        <span><strong>Total</strong></span>
        <span><strong>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</strong></span>
      </div>
    </div>

    <div class="thank-you">
      Terima kasih telah melakukan top up. Komputer siap disewa dengan token baru Anda!
    </div>

    <div class="footer">
      &copy; {{ date('Y') }} MATRIX WARNET. Seluruh hak cipta dilindungi.
    </div>
  </div>
</body>
</html>
