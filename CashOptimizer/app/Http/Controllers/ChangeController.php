<?php

namespace App\Http\Controllers;

use App\Models\ChangeCalculator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Classe ChangeController
 *
 * Cette classe contient des méthodes pour optimiser le rendu de monnaie.
 */
class ChangeController extends Controller
{
    protected $calculator;

    public function __construct(ChangeCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Calcule le rendu de monnaie optimal pour un montant donné.
     *
     * @param Request $request La requête contenant le montant à changer.
     * @return Application|Factory|View Retourne une vue avec le résultat du rendu de monnaie.
     */
    public function calculateChange(Request $request)
    {
        $amount = $request->input('amount');
        $billCounts = $this->calculator->optimizeChange($amount);

        $viewData = [
            'amount' => $amount,
            'bills' => $billCounts['bills'] ?? [],
            'result' => '',
            'error' => $billCounts['error'] ?? null,
        ];

        if (!isset($viewData['error'])) {
            $viewData['result'] = $this->calculator->formatResultString($viewData['bills']);
        }

        return view('change', $viewData);
    }

}
