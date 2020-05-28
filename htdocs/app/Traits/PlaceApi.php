<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait PlaceApi
{

    /**
     * get timezone by lat lon
     *
     * @param double $lat lat.
     * @param double $lon long.
     * @return array|null Refer: https://developers.google.com/maps/documentation/timezone/intro#Responses
     */
    protected function getTimezoneByLatLon($lat, $lon) {
        $api = sprintf(env('TIMEZONE_API'), microtime(true), $lat, $lon, config('googlemap.key'));
        return $this->request($api);
    }

    /**
     * get place from text.
     * @param  string $inputQuery keyword.
     * @return array|null Refer: https://developers.google.com/places/web-service/search#find-place-examples
     */
    protected function getPlacesFromText($inputQuery)
    {
        $api = sprintf(env('FIND_PLACE_API'), $this->encodeQuery($inputQuery), config('googlemap.key'));
        return $this->request($api);
    }

    /**
     * get place by keyword (using for places autocomplete).
     * @param  string $inputQuery keyword.
     * @param  array $options optional parameters.
     * @return array|null Refer: https://developers.google.com/places/web-service/autocomplete?hl=vi
     */
    protected function getPlaces($inputQuery, $options = [])
    {
        $api = sprintf(env('PLACES_API'), $this->encodeQuery($inputQuery), (string) Uuid::generate(4), config('googlemap.key'));

        // add more optional parameters
        if (empty($options) !== true) {
            $api .= '&' . http_build_query($options);
        }

        return $this->request($api);
    }

    /**
     * get place details by place id.
     * @param  string $placeID place id.
     * @return array|null Refer: https://developers.google.com/places/web-service/details#PlaceDetailsRequests
     */
    protected function getPlaceDetails($placeID)
    {
        $api = sprintf(env('PLACE_DETAILS_API'), $placeID, config('googlemap.key'));
        return $this->request($api);
    }

    /**
     * [getDirection description]
     * @param  string $placeIDFrom place id.
     * @param  string $placeIDTo place id.
     * @return array|null Refer: https://developers.google.com/maps/documentation/directions/start
     */
    protected function getDirection($placeIDFrom, $placeIDTo)
    {
        $api = sprintf(env('DIRECTION_API'), $placeIDFrom, $placeIDTo, env('GOOGLE_API_KEY'));
        return $this->request($api);
    }

    /**
     * request to api.
     * @param  string $api api url.
     * @return array|null
     */
    private function request($api)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $api, 'verify' => env('SSL_CERTIFICATE_API')]);
        $res = $client->request('GET');
        if ($res->getStatusCode() === config('constants.http_status_ok')) {
            return json_decode($res->getBody()->getContents(), true);
        }
        return null;
    }

    /**
     * support encode query
     *
     * @param string $inputQuery
     * @return string
     */
    protected function encodeQuery($inputQuery) {
        return rawurlencode($this->entityDecodeUTF8($inputQuery));
    }

    /**
     * entity decode utf-8
     *
     * @param string $inputQuery
     * @return string
     */
    protected function entityDecodeUTF8($inputQuery) {
        return html_entity_decode($inputQuery, ENT_QUOTES, config('constants.settings.utf8'));
    }
}
