<?php

namespace App\Http\Controllers;

use App\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = books::all();
        $data['data'] = false;

        if($books) {
            $data['data'] = true;
            $data['books'] = $books;
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //devolver una vista que pude ser un formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = new books();
        $book->nombre = $request->nombre;
        $book->descripcion = $request->descripcion;
        $book->codigo = $request->codigo;

        $save = $book->save();
        $data['data'] = false;
        if($save) 
            $data['data'] = true;
        
        //return json_decode($data);
        return response()->json( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $book = books::findOrFail($request->id);
        $data['data'] = false;

        if($book) {
            $data['data'] = true;
            $data['books'] = $book;
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     
        $book = books::findOrFail($request->id);
        $book->update($request->all());

        $data['data'] = false;

        if($book) {
            $data['data'] = true;
            $data['books'] = $book;
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = books::destroy($id);

        $data['data'] = false;

        if($book) {
            $data['data'] = true;
            $data['books'] = $book;
        }
        return $data;
    }
}
