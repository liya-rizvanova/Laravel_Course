<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PdfGeneratorController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Пользователь не найден'], 404);
        }

        $pdf = PDF::loadView('resume', ['user' => $user]);
        $pdf->setPaper('A4');
        $pdf->getDomPDF()->getOptions()->set('defaultFont', 'Open Sans');

        return $pdf->stream('resume.pdf');
    }
}

