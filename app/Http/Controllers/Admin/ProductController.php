<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.catalog', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('admin.forms.product-form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $attributes = [];
        $attributePrefix = 'attr_';

        $params = $request->all();
        unset($params['image']);

        if (null !== $request->file('image')){
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }

        foreach ($params as $field => $value){
            if(str_contains($field, $attributePrefix) && !empty($value)){
                unset($params[$field]);
                $attributes[str_replace($attributePrefix, '', $field)] = [
                    'value' => $value
                ];
            }
        }

        $product = Product::create($params);

        foreach ($attributes as $id => $data) {
            $product->attributes()->attach($id, $data);
        }
        return redirect()->route('category.show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Product $product)
    {
        return view('admin.forms.product-form', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Product $product)
    {
        $attributes = [];
        $attributePrefix = 'attr_';

        $params = $request->all();
        unset($params['image']);

        if ($request->has('image')){
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }

        foreach ($params as $field => $value){
            if(str_contains($field, $attributePrefix) && !is_null($value)){
                unset($params[$field]);
                $attributes[str_replace($attributePrefix, '', $field)] = [
                    'value' => $value
                ];
            }
        }

        $product->update($params);

        foreach ($attributes as $id => $data) {
            if ($product->attributes->contains($id)){
                $currentAttribute = $product->attributes()->where('attribute_id', $id)->first()->pivot;
                $currentAttribute->value = $data['value'];
                $currentAttribute->update();
            } else{
                $product->attributes()->attach($id, $data);
            }
        }

        return redirect()->route('category.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
