<?php
namespace App\Services;

use GoogleMaps\GoogleMaps;
use League\Csv\Reader;

class FileProcessor
{
    public function parseJson($file)
    {
        $cities = json_decode(file_get_contents($file), true);
        $origin = array_shift($cities);
        $waypoint = implode('|', $cities);
        $geoData = json_decode(\GoogleMaps::load('directions')
            ->setParam([
                'origin' => $origin,
                'destination' => $origin,
                'mode' => 'driving',
                'waypoints' => "optimize:true|$waypoint",
                'alternatives' => false,
                'avoid' => 'ferries',
                'units' => 'metric',
                'departure_time' => 'now',
            ])
            ->get(), true);

        $response = false;
        if ($geoData && $geoData['status'] == 'OK') {
            $distance = $duration = 0;
            foreach ($geoData['routes'][0]['legs'] as $route) {
                $paths[] = [
                    'from' => explode(',', $route['start_address'])[0],
                    'to' => explode(',', $route['end_address'])[0],
                    'distance' => $route['distance']['value'],
                    'duration' => $route['duration']['value']
                ];
                $waypoints[] = explode(',', $route['end_address'])[0];
                $distance += $route['distance']['value'];
                $duration += $route['duration']['value'];
            }
            array_pop($waypoints);

            $response['origin'] = $origin;
            $response['destination'] = $origin;
            $response['waypoints'] = $waypoints;
            $response['distance'] = $distance;
            $response['duration'] = $duration;
            $response['paths'] = $paths;
        }

        return $response;
    }

    public function parseCSV($file)
    {
        $data = null;
        $keys = null;
        $reader = Reader::createFromPath($file);
        $reader->setDelimiter(';');
        $list = $reader->fetch();

        if ($list) {
            foreach ($list as $row) {
                if (!$keys) {
                    $keys = $row;
                } else {
                    $data[] = array_combine($keys, $row);
                }
            }
        }

        $result = [];
        foreach ($data as $row) {
            $geoData = json_decode(\GoogleMaps::load('geocoding')
                ->setParam(['address' => $row['City']])
                ->get(), true);

            if ($geoData['status'] == 'OK') {
                $data = $geoData['results'][0];
                $city = false;
                foreach ($data['address_components'] as $current) {
                    if (in_array('locality', $current['types'])) {
                        $city = $current['long_name'];
                    }
                }

                $result[$city] = [
                    'name' => $city,
                    'formatted_address' => $data['formatted_address'],
                    'location' => $data['geometry']['location']
                ];
            }
        }
        return $result;
    }
}
