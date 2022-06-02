<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class DestroyAllController extends Controller
{
    //
    public function AllPassengerDestroy()
    {
      Passenger::getQuery()->delete();
      // User::where('role', '!=', 'A')->truncate();
      return back()->with('deleted', 'All Passenger Has Been Deleted');
    }

    public function AllPassengerDownload()
    {
      Passenger::getQuery()->delete();
      // User::where('role', '!=', 'A')->truncate();
      return back()->with('deleted', 'All Passenger Has Been Deleted');
    }
}
