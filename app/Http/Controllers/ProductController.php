<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;
use View;

class ProductController extends Controller
{
    protected $request, $user;
    private $repository;

    public function __construct(Request $request, User $user, Product $product)
    {
        $this->request = $request;
        $this->user = $user;
        $this->repository = $product;

        /* $this->middleware('auth')->only([
            'create', 'store'
        ]); */

        /* $this->middleware('auth')->except([
            'index', 'show'
        ]); */
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('image') && $request->image->isValid()) {
            //dd($request->file('photo')->storeAs('products'));
            //$nameFile = $request->name . '.' . $request->photo->extension();
            //dd($request->file('photo')->storeAs('products', $nameFile));
            //dd($request->image->store('products'));
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        $product = $this->repository->create($data);

        return redirect()->route('products.index');

        /* $product = new Product;
        $product->name = $request->name;
        $product->save(); */

        //dd('ok');

        //dd($request->all());
        //dd($request->only(['name', 'description']));
        //dd($request->name);
        //dd($request->input('teste', 'defaut'));
        //dd($request->except(['name', '_token']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();       

        if (!$product = Product::find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();        

        if ($request->hasFile('image') && $request->image->isValid()) {

            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
