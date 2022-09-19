<?php

namespace App\Http\Controllers;
use App\Http\Resources\Project as ResourcesProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard');
    }



       public function dashboard(Request $request)
    {
        $countData = DB::select("SELECT (SELECT COUNT(*) FROM employees) as employee_count,
        (SELECT COUNT(*) FROM projects WHERE deleted_at IS NULL) as project_count,
        (SELECT COUNT(*) FROM projects WHERE status = 'open' AND deleted_at IS NULL) as open_projects,
        (SELECT COUNT(*) FROM projects WHERE status = 'pending' AND deleted_at IS NULL) as pending_projects,
        (SELECT COUNT(*) FROM projects WHERE status = 'hold' AND deleted_at IS NULL) as hold_projects,
        (SELECT COUNT(*) FROM projects WHERE status = 'rejected' AND deleted_at IS NULL) as rejected_projects,
        (SELECT COUNT(*) FROM projects WHERE status = 'closed' AND deleted_at IS NULL) as closed_projects")[0];

    //    dd($countData->employee_count);
        //    dd($projects);
            if ($request->is('api/*')) {

                return new ResourcesProject($countData);
            }
            else
        return view('dashboard', ['countData' => $countData]);
    }
}

