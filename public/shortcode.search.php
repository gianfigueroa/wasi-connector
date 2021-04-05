<?php

// shortocode: [wasi-properties]
function renderWasiSearch($parent, $instance) {

    if(isset($instance['formclass'])) {
        $instance['formClass'] = $instance['formclass'];
    }
    if(isset($instance['submitclass'])) {
        $instance['submitClass'] = $instance['submitclass'];
    }

    $instance = shortcode_atts(
        array(
            'formClass' => 'row',
            'submitClass' => 'btn btn-primary',
            'filtro'=>'',
            'countries'=>'',
            'btype'=>"0"
        ), $instance, 'wasi-search' );

    if(!$instance) { $instance = []; }
    $filter=explode(",", $instance['filtro']);
    $countries=explode(",", $instance['countries']);
    $propertyStatus = $parent->getAPIClient()->getPropertyStatus();
    $propertyTypes = $parent->getAPIClient()->getPropertyTypes();
    $wasiCountries = $parent->getAPIClient()->getCountries();
    // $atts['propertyTypes'] = $parent->getAPIClient()->getPropertyTypes();
    // $atts['propertyPage'] = get_post($parent->getWasiData()['property_single_page'])->post_name;

    ob_start();

    require_once('views/search.php');

    $out = ob_get_clean();
    return $out;
}
