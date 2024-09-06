<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Banner;
use App\Models\Noticia;
use App\Models\Parceiro;
use App\Models\Cliente;
use DB;

class WebSiteController extends Controller
{

    public function home()
    {
      $empresa = Empresa::find(1);
      $parceiros = Parceiro::all();
      $banners = DB::table('banner')->where('deleted_at','=' ,NULL)->orderBy('ordem','ASC')->get();
      $noticias = DB::table('noticias')->where('deleted_at','=',NULL)->get();

      return view('pages.index',compact('empresa','banners','noticias','parceiros'));
    }

    public function noticia()
    {
      $empresa = Empresa::find(1);
      $noticia = Noticia::where('slug', '=', $slug)->first();

      return view ('pages.noticia', compact('empresa','noticia'));
    }

    public function getSingleNoticia($slug)
    {
      $empresa = Empresa::find(1);
      $noticia = Noticia::where('slug', '=', $slug)->first();

      if($noticia == NULL){
        return redirect()->route('notfound');
      }else{
        return view ('pages.noticia', compact('empresa','noticia'));

      }

    }

    public function pagenotfound()
    {
      $empresa = Empresa::find(1);

      return view ('pages.404', compact('empresa'));
    }

    function index()
    {
      $empresa = Empresa::find(1);

      return view('pages.financeiro',compact('empresa'));
    }

    function action(Request $request)
    {
      if($request->ajax())
       {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
         $data = DB::table('clientes')
           ->Where([
             ['cpf', '=' ,$query],
             ['status','=',0],
           ])
           ->get();
        }

        $total_row = $data->count();

        if($total_row > 0)
        {
         foreach($data as $row)
         {
          $output .= '
          <tr>
           <td>'.$row->nome.'</td>
           <td>'.$row->cpf.'</td>
           <td>'.$row->datavenda.'</td>
           <td><a href="'.$row->link.'"><button class="btn btn-success">Pagar agora</button></td>
          </tr>
          ';
         }
        }
        else
        {
         $output = '
         <tr>
          <td align="center" colspan="5">Você não tem pendências.</td>
         </tr>
         ';
        }

        $data = array(
         'table_data'  => $output,
         'total_data'  => $total_row
        );

        echo json_encode($data);
       }
    }

}
