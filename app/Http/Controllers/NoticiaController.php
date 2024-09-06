<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Image;
use Storage;
use DB;

class NoticiaController extends Controller
{
    public function index()
    {
      $noticia = Noticia::all();

      return view('admin.noticia.index', ['noticias' => $noticia]);
    }

    public function create()
    {
      return view('admin.noticia.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
      'imagem'        => 'sometimes|image|mimes:jpeg,png,jpg',
      'conteudo'      =>'required',
      ));

      $slug = Self::tirarAcentos(str_replace(" ", "-", $request->titulo));

      $noticia = new Noticia;
      $noticia->titulo  = $request->titulo;
      $noticia->descricao       = $request->descricao;
      $noticia->conteudo        = $request->conteudo;
      $noticia->tags            = $request->tags;
      $noticia->slug            = $slug;

      if($noticia->datapublicacao == NULL){
        $noticia->datapublicacao = Carbon::now();
        $noticia->datapublicacao->toDateTimeString();
      }

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/noticia/' . $filename);
        Image::make($image)->save($location);
        $noticia->imagem = $filename;
      }

      $noticia->save();
      $request->session()->flash('success', 'Notícia adicionada com sucesso');
      return redirect('admin/noticias')->with('flash_message', 'Notícia adicionado!');
    }

    public function show($id)
    {
      $noticia = Noticia::where('slug', '=', $id)->first();

      return view('admin.noticia.show')->with('noticia', $noticia);
    }

    public function tirarAcentos($string)
    {
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/","/(\/)/","/(:)/","/(,)/","/(!)/","/(?)/",'/\(|\)/'),explode(" ","a A e E i I o O u U n N c C - - - - "),$string);
    }

    public function getSingle($slug)
    {
      $noticia = Noticia::where('slug', '=', $slug)->first();

      return view('admin.noticia.show')->with('noticia', $noticia);
    }

    public function edit($id)
    {
      $noticia = Noticia::find($id);

      return view('admin.noticia.edit', ['noticia' => $noticia]);
    }

    public function update(Request $request, $id)
    {
      $noticia = Noticia::find($id);
      $noticia->fill($request->all());

      $slug = Self::tirarAcentos(str_replace(" ", "-", $request->titulo));

      $noticia->slug = $slug;

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/noticia/' . $filename);
        Image::make($image)->save($location);

        if ($noticia->imagem) {
          $oldFilename = $noticia->imagem;
          Storage::delete('uploads/noticia/'.$oldFilename);
        }
        $noticia->imagem = $filename;
      }
      $noticia->save();
      $request->session()->flash('success', 'Notícia modificada com sucesso !');
      return redirect('admin/noticias');
    }

    public function destroy($id)
    {
      $noticia = Noticia::find($id);
      
      $noticia->delete();
      return [response()->json("success"), redirect('admin/noticias')];
    }
}
