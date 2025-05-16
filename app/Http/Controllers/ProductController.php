<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
 /**
 * Display a listing of the resource.
 */
 public function index() : View
 {
 return view('products.index', [
 'products' => Product::latest()->paginate(4)
 ]);
 }
 /**
 * Show the form for creating a new resource.
 */
 public function create() : View
 {
 return view('products.create');
 }
 /**
 * Store a newly created resource in storage.
 */
 public function store(StoreProductRequest $request) : RedirectResponse
 {
 try {
 $data = $request->validated();
 
 if ($request->hasFile('image')) {
 $image = $request->file('image');
 $imageName = time() . '_' . $image->getClientOriginalName();
 
 // Create directory if it doesn't exist
 $uploadPath = public_path('storage/products');
 if (!File::exists($uploadPath)) {
 File::makeDirectory($uploadPath, 0777, true);
 }
 
 // Move the file
 $image->move($uploadPath, $imageName);
 $data['image'] = $imageName;
 }
 
 $product = Product::create($data);
 
 return redirect()->route('products.index')
 ->withSuccess('New product is added successfully.');
 } catch (\Exception $e) {
 return redirect()->back()
 ->withErrors(['error' => 'Error uploading image: ' . $e->getMessage()])
 ->withInput();
 }
 }
 /**
 * Display the specified resource.
 */
 public function show(Product $product) : View
 {
 return view('products.show', compact('product'));
 }
 /**
 * Show the form for editing the specified resource.
 */
 public function edit(Product $product) : View
 {
 return view('products.edit', compact('product'));
 }
 /**
 * Update the specified resource in storage.
 */
 public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
 {
 try {
 $data = $request->validated();
 
 if ($request->hasFile('image')) {
 $image = $request->file('image');
 $imageName = time() . '_' . $image->getClientOriginalName();
 
 // Create directory if it doesn't exist
 $uploadPath = public_path('storage/products');
 if (!File::exists($uploadPath)) {
 File::makeDirectory($uploadPath, 0777, true);
 }
 
 // Delete old image if exists
 if ($product->image && File::exists($uploadPath . '/' . $product->image)) {
 File::delete($uploadPath . '/' . $product->image);
 }
 
 // Move the new file
 $image->move($uploadPath, $imageName);
 $data['image'] = $imageName;
 }
 
 $product->update($data);
 return redirect()->back()
 ->withSuccess('Product is updated successfully.');
 } catch (\Exception $e) {
 return redirect()->back()
 ->withErrors(['error' => 'Error updating image: ' . $e->getMessage()])
 ->withInput();
 }
 }
 /**
 * Remove the specified resource from storage.
 */
 public function destroy(Product $product) : RedirectResponse
 {
 try {
 // Delete image if exists
 if ($product->image) {
 $imagePath = public_path('storage/products/' . $product->image);
 if (File::exists($imagePath)) {
 File::delete($imagePath);
 }
 }
 
 $product->delete();
 return redirect()->route('products.index')
 ->withSuccess('Product is deleted successfully.');
 } catch (\Exception $e) {
 return redirect()->back()
 ->withErrors(['error' => 'Error deleting product: ' . $e->getMessage()]);
 }
 }
}