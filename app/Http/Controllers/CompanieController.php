<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\EmailService;
use App\Services\ImageService;
use Illuminate\Database\QueryException;
use App\Requests\StoreCompanyRequest;

class CompanieController extends Controller
{

    private $companieService;
    private $imageService;
    private $emailService;

    public function __construct( CompanyService $companieService,
                                 ImageService $imageService,
                                 EmailService $emailService ) {
        $this->companieService = $companieService;
        $this->imageService = $imageService;
        $this->emailService = $emailService;
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
                'companies' => $this->companieService->getAll()
            ];
            return view('companies.index', $data);
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
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {   
        
        try{ 
            $companie = $this->companieService->create( $request->validated() );
            if( $request->logo ){
                $name = $this->imageService->saveImage($request, $companie->id);
                $companie->fill( array( 'logo' => $name ) );
                $companie->save();
            }

            $this->emailService->sendEmail($companie->email, $companie->name);
            return redirect()->route('companies.index')->with('success', 'Was saved correctly');
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
        $companie = $this->companieService->findByID($id);
        $data = [
            'companie' => $companie,
        ];
        return view('companies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        try{ 
            $this->companieService->save( $request->validated(), $id );
            $companie = $this->companieService->findById($id);
            if( $request->logo ){
                $name = $this->imageService->saveImage($request, $id);
                $companie->fill( array( 'logo' => $name ) );
                $companie->save();
            }
            return redirect()->route('companies.index')->with('success', 'Was saved correctly');
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
            $this->companieService->delete($id);
            return redirect()->route('companies.index')->with('success', 'Was deleted correctly');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'Ocurrió algún error al guardar');
        } 
       
    }
}
