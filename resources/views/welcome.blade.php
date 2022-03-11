<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moedas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <div class="container">
        <form method="POST" action="/calcula">
            @csrf
            <div class="row">
                <div class="col-4 mb-4">
                    <select class="form-select @error('moedaDestino') is-invalid @enderror" name="moedaDestino">
                        <option value="">Moeda</option>
                        <option value="USD">USD - Dólar americano</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="BTC">BTC - Bitcoin</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-4">
                    <select class="form-select @error('formaPag') is-invalid @enderror" name="formaPag">
                        <option value="">Forma de pagamento</option>
                        <option value="1">Boleto</option>
                        <option value="2">Cartão de crédito</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mb-4">
                    <div class="input-group align-self-center">
                        <span class="input-group-text">(BRL) R$</span>
                        <input name="valor" class="form-control @error('valor') is-invalid @enderror" type="number" min="1" max="100">
                        <span class="input-group-text">.000,00</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="d-grid">
                        <button class="btn btn-secondary" type="submit">Calcular</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
