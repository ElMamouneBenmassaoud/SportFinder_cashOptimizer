<?php

namespace App\Models;

class ChangeCalculator
{
    /**
     * Optimise le rendu de monnaie pour un montant spécifique.
     *
     * Cette méthode détermine le nombre de billets de chaque type (10, 5, 2)
     * nécessaire pour rendre le montant donné en utilisant le moins de billets possible.
     *
     * @param int $amount Le montant pour lequel la monnaie doit être rendue.
     * @return array Retourne un tableau contenant soit un message d'erreur, soit les nombres de billets de chaque type.
     */
    public function optimizeChange($amount): array
    {
        if ($amount == null) {
            return ['bills' => []];
        }
        if ($amount < 2 || $amount == 3) {
            return ['error' => "Impossible de rendre la monnaie pour $amount €", 'bills' => []];
        }

        $billCounts = [
            '10' => 0,
            '5' => 0,
            '2' => 0,
        ];

        // Vérifiez d'abord s'il est possible d'utiliser un billet de 5 $
        if ($amount >= 5 && ($amount - 5) % 2 == 0) {
            $amount -= 5;
            $billCounts['5']++;
        }

        // Utilisation des billets de 10 € si possible
        $billCounts['10'] = intdiv($amount, 10);
        $amount %= 10;

        // Complétez avec des billets de 2 €
        $billCounts['2'] = intdiv($amount, 2);

        return ['bills' => $billCounts];
    }

    /**
     * Formate le résultat du rendu de monnaie en une chaîne de caractères lisible.
     *
     * @param array $billCounts Un tableau associatif indiquant le nombre de chaque type de billet utilisé.
     * @return string Une chaîne de caractères formatée indiquant le nombre de billets de chaque type.
     */
    public function formatResultString($billCounts): string
    {
        $resultParts = [];
        foreach ($billCounts as $bill => $count) {
            if ($count == 0) continue;
            $type = $bill == 2 ? "pièce" : "billet";
            $plural = $count > 1 ? "s" : "";
            $resultParts[] = "$count $type{$plural} de $bill €";
        }

        return join(', ', $resultParts);
    }
}
