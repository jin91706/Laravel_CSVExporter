<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employees;
use App\Salaries;

class CsvExport extends Controller
{

    public function index() {

    	$data = $this->getEmployees();

        return view('csvexport', ['data' => $data]);
    }

    public function csvexport() {

        $data = $this->getEmployees();

        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=Employees.csv");

        $out = fopen('php://output', 'w');
        fputcsv($out, array('Employee ID','First Name','Last Name','Gender','DOB','Hire Date','Current Salary'));

        foreach ($data as $emp) {

            fputcsv($out, array($emp->emp_no, $emp->first_name, $emp->last_name, $emp->gender, $emp->birth_date, $emp->hire_date, $emp->salaries[0]->salary));
            
        }

        fclose($out);
    }

    public function getEmployees() {
        try {

            $data = Employees::with('salaries')->take(25)->get();

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $data;
    }
}
