<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Cache;
class MandiController extends Controller
{
    public function fetchCommoditiesData(Request $request)
    {
        // API endpoint and parameters
        $apiUrl = "https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070";
        $apiParams = [
            'api-key' => '579b464db66ec23bdd000001f79dfa824e0244ab4819b96329e250a4',
            'format' => 'json',
            'limit' => 9670,
        ];

        // Build API URL with query parameters
        $apiUrlWithParams = $apiUrl . '?' . http_build_query($apiParams);

        // Cache key based on API URL and filters
        $cacheKey = md5($apiUrlWithParams);

        // Fetch data from cache or API
        $apiData = Cache::remember($cacheKey, 86400, function () use ($apiUrlWithParams) {
            // Fetch data from API using Laravel's HTTP Client
            $response = Http::get($apiUrlWithParams);

            // Check if response is valid
            if ($response->failed()) {
                throw new \Exception('Unable to fetch data from API.');
            }

            // Decode JSON into PHP array
            $data = $response->json();

            // Ensure we have records in the response
            if (!isset($data['records'])) {
                throw new \Exception('No records found.');
            }

            return $data['records'];
        });

        // Add dynamic filters from the query string
        $filters = [
            'market' => $request->query('market'),
            'commodity' => $request->query('commodity'),
            'state' => $request->query('state'),
            'district' => $request->query('district'),
        ];

        // Filter data based on the provided filters
        $filteredData = $this->filterData($apiData, $filters);

        // Return filtered data as JSON
        return response()->json($filteredData);
    }

    /**
     * Filter data based on dynamic filters.
     *
     * @param array $data
     * @param array $filters
     * @return array
     */
    private function filterData(array $data, array $filters)
    {
        return array_values(array_filter($data, function ($record) use ($filters) {
            foreach ($filters as $key => $value) {
                if ($value && isset($record[$key]) && strcasecmp($record[$key], $value) !== 0) {
                    return false; // Exclude record if it doesn't match the filter
                }
            }
            return true; // Include record if all filters match
        }));
    }
    
    
    
    public function stateData(){
        
        
        $apiUrl = "https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070";
        $apiParams = [
            'api-key' => '579b464db66ec23bdd000001f79dfa824e0244ab4819b96329e250a4',
            'format' => 'json',
            'limit' => 9670,
        ];

        // Add dynamic filters from the query string if needed
        $filters = []; // Populate this array as needed

        // Cache key
        $cacheKey = 'unique_states';

        // Retrieve data from cache or fetch from the API
        $uniqueStates = Cache::remember($cacheKey, 86400, function () use ($apiUrl, $apiParams, $filters) {
            // Build API URL with query parameters
            $apiUrlWithParams = $apiUrl . '?' . http_build_query($apiParams);

            // Fetch data from API using Laravel's HTTP Client
            $response = Http::get($apiUrlWithParams);

            // Check if response is valid
            if ($response->failed()) {
                throw new \Exception('Unable to fetch data from API.');
            }

            // Decode JSON into PHP array
            $data = $response->json();

            // Ensure we have records in the response
            if (!isset($data['records'])) {
                throw new \Exception('No records found.');
            }

            // Filter data based on the provided filters
            $filteredData = $this->filterData($data['records'], $filters);

            // Get unique states
            return collect($filteredData)->pluck('state')->unique()->values();
        });

        // Return unique states as JSON response
        return response()->json($uniqueStates);
    }
}
