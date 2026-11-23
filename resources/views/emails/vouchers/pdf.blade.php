<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .voucher { padding: 30px; border: 4px dashed #333; }
        .header { text-align: center; margin-bottom: 20px; }
        .code { font-size: 28px; font-weight: bold; margin-top: 10px; }
        .details { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="voucher">
        <div class="header">
            <h1>Bon de formation</h1>
            <div class="code">{{ $voucher->code }}</div>
            <div>Valable jusqu'au : {{ optional($voucher->expires_at)->format('d/m/Y') ?? 'Voir conditions' }}</div>
        </div>

        <div class="details">
            <p><strong>Montant :</strong> {{ number_format($voucher->amount) }} {{ $voucher->currency }}</p>
            <p><strong>Bénéficiaire :</strong> {{ $voucher->beneficiary_email ?? 'Non renseigné' }}</p>
            <p>{{ $voucher->message }}</p>
        </div>
    </div>
</body>
</html>
