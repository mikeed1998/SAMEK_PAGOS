<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$faqs = Faq::orderBy('orden','asc')->get();
			return view('configs.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('configs.faqs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
			$validate = Validator::make($request->all(),[
					'question' => 'required',
					'answer' => 'required',
				],[],[
					'question' => 'pregunta',
					'answer' => 'respuesta',
				]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}
			$faq = new Faq;

			$faq->pregunta = $request->question;
			$faq->respuesta = $request->answer;

			$faq->save();
			\Toastr::success('Guardado');
			return redirect()->route('config.faq.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($faq){
			$faq = Faq::find($faq);

			if (empty($faq)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}
			return view('configs.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
			$faq = Faq::find($id);

			$validate = Validator::make($request->all(),[
					'question' => 'required',
					'answer' => 'required',
				],[],[
					'question' => 'pregunta',
					'answer' => 'respuesta',
				]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}

			if (empty($faq)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$faq->pregunta = $request->question;
			$faq->respuesta = $request->answer;

			$faq->save();

			\Toastr::success('Guardado Exitosamente');
			return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
			if (empty($request->pregunta)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}

			$faq = Faq::find($request->pregunta);

			$faq->delete();
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
    }
}
