<?php

namespace App\Helpers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Colis;
use App\Models\DemandeModificationColi;
use App\Models\Depense;
use App\Models\Livreur;
use App\Models\Message;
use App\Models\Ramassagecoli;
use App\Models\Reclamation;
use App\Models\Remarque;
use App\Models\Role;
use App\Models\Tarif;
use App\Models\Ville;
use App\Models\Zone;
use Illuminate\Support\Str;

class Helpers
{
    public static function generateIdV()
    {
        $id_V = Str::random(15);
        while (Ville::where('id_V', $id_V)->exists()) {
            $id_V = Str::random(15);
        }
        return $id_V;
    }

    public static function generateIdAd()
    {
        $id_Ad = Str::random(15);
        while (Admin::where('id_Ad', $id_Ad)->exists()) {
            $id_Ad = Str::random(15);
        }
        return $id_Ad;
    }
    public static function generateIdCl()
    {
        $id_Cl = Str::random(15);
        while (Client::where('id_Cl', $id_Cl)->exists()) {
            $id_Cl = Str::random(15);
        }
        return $id_Cl;
    }
    public static function generateIdLiv()
    {
        $id_Liv = Str::random(15);
        while (Livreur::where('id_Liv', $id_Liv)->exists()) {
            $id_Liv = Str::random(15);
        }
        return $id_Liv;
    }

    public static function applyDateFilter($query, $request, $table = '')
    {
        if ($request->has('date_filter')) {
            switch ($request->date_filter) {
                case 'today':
                    $query->whereDate($table . 'created_at', today());
                    break;
                case 'yesterday':
                    $query->whereDate($table . 'created_at', today()->subDay());
                    break;
                case 'last_7_days':
                    $query->whereBetween($table . 'created_at', [now()->subDays(7), now()]);
                    break;
                case 'last_30_days':
                    $query->whereBetween($table . 'created_at', [now()->subDays(30), now()]);
                    break;
                case 'this_month':
                    $query->whereMonth($table . 'created_at', now()->month)
                        ->whereYear($table . 'created_at', now()->year);
                    break;
                case 'last_month':
                    $query->whereMonth($table . 'created_at', now()->subMonth()->month)
                        ->whereYear($table . 'created_at', now()->subMonth()->year);
                    break;
                case 'custom_range':
                    if ($request->has('start_date') && $request->has('end_date')) {
                        $query->whereBetween($table . 'created_at', [$request->start_date, $request->end_date]);
                    }
                    break;
            }
        }
        return $query;
    }
    public static function base64Image($path = 'storage/images/l.png')
    {
        // Check if the file exists
        if (!file_exists(public_path($path))) {
            return null; // or handle the error as needed
        }

        // Get the file type and contents
        $type = pathinfo(public_path($path), PATHINFO_EXTENSION);
        $data = file_get_contents(public_path($path));

        // Encode the file contents to base64
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    }
}
