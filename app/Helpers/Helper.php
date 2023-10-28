<?php

use App\Models\FeaturedService;
use App\Models\Setting;

    function getSettings(){
        return  Setting::first();
    }

function getServices(){
    $services = FeaturedService::leftJoin('services','services.id', 'featured_services.service_id')
    ->orderBy('sort_order', 'ASC')
    ->get();
    return $services;
}

?>