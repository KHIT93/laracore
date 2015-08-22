<?php

namespace App\Http\Controllers;

use App\LogEntry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Installer;

class ReportController extends Controller
{
    public function getIndex()
    {
        return view('admin.reports.index');
    }

    public function getStatus()
    {
        $installer = new Installer();
        //Check if the requirements are passed
        $validator = $installer->checkRequirementsAndStoragePermisions();
        return view('admin.reports.status', [
            'requirements' => $validator['requirements'],
            'storageperms' => $validator['storageperms'],
            'php_version' => $validator['php_version'],
        ]);
    }

    public function getLog()
    {
        return view('admin.reports.log', ['entries' => LogEntry::paginate(25)]);
    }

    public function getClearLog()
    {
        \DB::table('log')->truncate();
        \Flash::info('Application log is cleared');
        return redirect('admin/reports/log');
    }

    public function getUpdates()
    {
        //dd(json_decode(file_get_contents(base_path('composer.json'))));
        return view('admin.reports.updates', ['updates' => []]);
    }

    public function getPageNotFound()
    {
        $results = \DB::table('log')
            ->select(\DB::raw('count(*) as count, url, created_at'))
            ->where('type', '=', 404)
            ->groupBy('url')
            ->get();
        return view('admin.reports.404', ['entries' => $results]);
    }
}
