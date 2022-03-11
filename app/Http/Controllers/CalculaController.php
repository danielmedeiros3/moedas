<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CalculaController extends Controller
{
    public function calcula(Request $request)
    {
        $validate = $request->validate([
            'moedaDestino' => 'required',
            'formaPag' => 'required',
            'valor' => 'required|numeric|max:100|min:1'
        ]);

        $moeda = $request->input('moedaDestino');
        $forma = $request->input('formaPag');
        $valor = $request->input('valor');
        $valor *= 1000;
        $taxaConversao = $valor <= 3700 ? $valor * 0.02 : $valor * 0.01;
        $taxaCompra = $forma == 1 ? $valor * 0.0137 : $valor * 0.0773;
        $valorComprado = $valor - $taxaConversao - $taxaCompra;
        $url = 'https://economia.awesomeapi.com.br/json/last/' . $moeda . '-BRL';
        $key = $moeda."BRL";
        $response = Http::get($url);
        $json = $response->json();
        $bid = $json[$key]['bid'];
        $valorAdquirido = number_format($valorComprado / $bid, 2, ",", ".");
        $dados = [
            'valor' => number_format($valor, 2, ",", "."),
            'valorComprado' => number_format($valorComprado, 2, ",", "."),
            'taxaConversao' => number_format($taxaConversao, 2, ",", "."),
            'taxaCompra' => number_format($taxaCompra, 2, ",", "."),
            'forma' => $forma == 1 ? "Boleto" : "Cartão de crédito",
            'moeda' => $moeda,
            'bid' => number_format($bid, 2, ",", "."),
            'valorAdquirido' => $valorAdquirido
        ];

        return view('calcula', $dados);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
