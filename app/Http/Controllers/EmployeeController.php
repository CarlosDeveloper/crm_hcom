<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use App\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{

    private $employeeService;
    private $companieService;

    public function __construct( EmployeeService $employeeService,
                                 CompanyService $companieService ) {
        $this->employeeService = $employeeService;
        $this->companieService = $companieService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
           
            $data = [
                'employees' => $this->employeeService->getAll()
            ];
            
            return view('employees.index', $data);
        } catch (QueryException $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'Ocurrió algún error al guardar');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'companies' => $this->companieService->getAll()
        ];
        return view('employees.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        try{ 
            $employee = $this->employeeService->create( $request->all() );
            return redirect()->route('employees.index')->with('success', 'Was saved correctly');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'Ocurrió algún error al guardar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employeeService->findByID($id);
        $data = [
            'employee' => $employee,
            'companies' => $this->companieService->getAll()
        ];
        return view('employees.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, $id)
    {
        try{ 
            $this->employeeService->save( $request->all(), $id );
            return redirect()->route('employees.index')->with('success', 'Was saved correctly');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'Ocurrió algún error al guardar');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{ 
            $this->employeeService->delete($id);
            return redirect()->route('employees.index')->with('success', 'Was deleted correctly');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'Ocurrió algún error al guardar');
        } 
    }
}

