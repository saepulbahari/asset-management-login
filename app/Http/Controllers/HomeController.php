<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::all();
        $locations = Location::all();

        $sum = Asset::withTrashed()->sum('value');

        $assets = Asset::with(['category', 'location'])
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'ilike', "%$search%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'ilike', "%$search%");
                    })
                    ->orWhereHas('location', function ($q) use ($search) {
                        $q->where('name', 'ilike', "%$search%");
                    });
            })
            ->when($request->category_id, function ($query, $value) {
                return $query->where('category_id', $value);
            })
            ->when($request->location_id, function ($query, $value) {
                return $query->where('location_id', $value);
            })
            ->orderBy('name')
            ->withTrashed()
            ->paginate(10)->withQueryString();

        return view('home', compact('assets', 'categories', 'locations', 'request', 'sum'));
    }
}
