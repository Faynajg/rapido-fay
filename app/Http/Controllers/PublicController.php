<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomeRevisor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
class PublicController extends Controller
{
    public function index()
    {
        $ads= Ad::where('is_accepted', true)->orderBy('created_at','desc')->paginate(6); //sort in db
        return view('welcome',compact('ads'));
    }
    public function adsByCategory(Category $category){
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(6);
        return view('ad.by-category', compact ('category','ads'));
    }
    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
    public function becomeRevisor()
     {
        Mail::to('admin@rapido.es')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Solcitud enviada con éxito,
        pronto sabras algo,gracias!']);
     }
    
}
