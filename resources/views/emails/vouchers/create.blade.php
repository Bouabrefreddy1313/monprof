
<div class="container">
    <h1>Offrez une formation !</h1>
    <p>Choisissez le montant et renseignez le bénéficiaire.</p>

    <form action="{{ route('vouchers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Montant</label>
            <input type="number" name="amount" class="form-control" value="50000" required>
        </div>

        <div class="form-group">
            <label>Devise</label>
            <select name="currency" class="form-control">
                <option value="XOF">XOF</option>
                <option value="EUR">EUR</option>
            </select>
        </div>

        <div class="form-group">
            <label>Email du bénéficiaire (optionnel)</label>
            <input type="email" name="beneficiary_email" class="form-control">
        </div>

        <div class="form-group">
            <label>Message (optionnel)</label>
            <textarea name="message" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Acheter le bon</button>
    </form>
</div>

