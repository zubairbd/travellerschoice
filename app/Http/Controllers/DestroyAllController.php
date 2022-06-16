<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class DestroyAllController extends Controller
{
    //
    public function AllInsuranceDestroy()
    {
      Insurance::getQuery()->delete();
      // User::where('role', '!=', 'A')->truncate();
      return back()->with('deleted', 'All Insurance Has Been Deleted');
    }

    public function AllInsuranceDownload()
    {
      Insurance::getQuery()->delete();
      // User::where('role', '!=', 'A')->truncate();
      return back()->with('deleted', 'All Insurance Has Been Deleted');
    }
}
