<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DownloadsController extends Controller
{

    public function downloadCsv()
    {
        $sql = "SELECT  dpt.departmentName, departmentID, count(*) as Number_of_ideas
                FROM ideas 
                LEFT JOIN departments dpt ON  ideas.departmentID = dpt.id
                GROUP BY  departmentID;";
        $ideas_per_dept = DB::select($sql);
        $csvData = ["Department", "Department Number", "Number of Ideas"];
        foreach ($ideas_per_dept as $user) {
            $csvData[] = [$user->departmentName, $user->departmentID, $user->Number_of_ideas];
        }

        // Set the response headers.
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="ideas_per_dept.csv"');

        // Send the CSV data to the browser.
        readfile(fopen('php://memory', 'r+', false, $csvData));
    }
}
