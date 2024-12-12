<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DailyMonitoringUnit;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $filterBy = $request->input('filter_by');
        $query = $request->input('query', '');

        $unit = Unit::query()
            ->with(['project'])
            ->firstWhere('user_id', $user->id);
        $todayChecklist = $unit->firstTodayDailyMonitoringUnit();
        $historyChecklist = DailyMonitoringUnit::query()
            ->with(['user', 'project'])
            ->where('unit_id', $unit->id)
            ->when($filterBy, function ($q) use ($filterBy, $query) {
                if ($filterBy === 'project') {
                    return $q->whereRelation('project', 'name', 'like', "%$query%");
                } else {
                    return $q->whereRelation('user', 'name', 'like', "%$query%");
                }
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('user.dashboard', [
            'user' => $user,
            'unit' => $unit,
            'todayChecklist' => $todayChecklist,
            'history' => $historyChecklist,
        ]);
    }
}
