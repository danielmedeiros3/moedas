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
				<div class="col-5">
					<div class="input-group mb-1">
						<span class="input-group-text">Moeda de origem</span>
						<span class="input-group-text bg-light">BRL</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Moeda de destino</span>
						<span class="input-group-text bg-light">{{ $moeda }}</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Valor para conversão</span>
						<span class="input-group-text bg-light">R$ {{ $valor }}</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Forma de pagamento</span>
						<span class="input-group-text bg-light">{{ $forma }}</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Valor de {{ $moeda }} usado para conversão</span>
						<span class="input-group-text bg-light">$ {{ $bid }}</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Taxa de pagamento</span>
						<span class="input-group-text bg-light">R$ {{ $taxaCompra }}</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Taxa de conversão</span>
						<span class="input-group-text bg-light">R$ {{ $taxaConversao }}</span>
					</div>
					<div class="input-group mb-1">
						<span class="input-group-text">Valor utilizado para conversão descontando as taxas</span>
						<span class="input-group-text bg-light">R$ {{ $valorComprado }}</span>
					</div>
					<div class="input-group">
						<span class="input-group-text">Valor comprado em {{ $moeda }}</span>
						<span class="input-group-text bg-light">$ {{ $valorAdquirido }}</span>
					</div>
					<a class="btn btn-secondary mt-2 col-12" href="/">Voltar</a>
				</div>
			</div>
		</form>
	</div>
</body>

</html>
