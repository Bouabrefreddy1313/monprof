@component('mail::message')
# Voici votre bon de formation : {{ $voucher->code }}

Bonjour,

Merci pour votre achat. Vous trouverez en pièce jointe votre bon de formation. 

**Détails :**
- Montant : {{ number_format($voucher->amount) }} {{ $voucher->currency }}
- Valable jusqu'au : {{ optional($voucher->expires_at)->format('d/m/Y') ?? '12 mois' }}
- Code : **{{ $voucher->code }}**

@component('mail::button', ['url' => route('vouchers.pdf', $voucher->id)])
Télécharger le bon (PDF)
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
