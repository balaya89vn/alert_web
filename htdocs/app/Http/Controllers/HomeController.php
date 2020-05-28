<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\PlaceApi;

class HomeController extends Controller
{
    //
    use PlaceApi;

    function index() {
        $startPlace = "EkFD4bqndSBWxrDhu6N0IExpbmggWHXDom4sIFRo4bunIMSQ4bupYywgSG8gQ2hpIE1pbmggQ2l0eSwgVmlldG5hbSIuKiwKFAoSCe_uEXuAJ3UxEWGFV9hrmQsPEhQKEglfOV44ZSd1MREO4nqoutEcfQ";
        $endPlace = "ChIJqYuPuevddDERWFwwyNm2wqI";
        $resDirection = $this->getDirection($startPlace, $endPlace);
       return view('welcome');
    }
}
