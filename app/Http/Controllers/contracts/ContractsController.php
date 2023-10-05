<?php

namespace App\Http\Controllers\contracts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    public function cacheDemo(Repository $cache)
    {
        // Check if the item exists in the cache
        if ($cache->has('example_key')) {
            $cachedData = $cache->get('example_key');
            return "Data from cache: " . $cachedData;
        }

        // If not found in cache, store it in cache
        $data = "This is some data to cache.";
        $cache->put('example_key', $data, 60); // Cache for 60 minutes

        return "Data not found in cache, but now it's cached: " . $data;
    }
}
