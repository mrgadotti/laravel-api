<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $courses = Partner::all();
        return response()->json($courses);
    }

    public function indexFormated()
{
    $partners = Partner::all();

    $partners = $partners->map(function ($partner) {
        $attributes = $partner->toArray();
        foreach ($attributes as $key => $value) {
            if (is_null($value)) {
                if (str_starts_with($key, 'cd_')) {
                    $attributes[$key] = 0;
                } elseif (str_starts_with($key, 'in_')) {
                    $attributes[$key] = '';
                } elseif (str_starts_with($key, 'ds_')) {
                    $attributes[$key] = '';
                } elseif (str_starts_with($key, 'qt_')) {
                    $attributes[$key] = '';
                }
            }
        }

        return $attributes;
    });

    return response()->json($partners);
}
}
