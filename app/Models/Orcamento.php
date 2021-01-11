<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente',
        'vendedor',
        'descricao',
        'valorOrcado'
    ];



    /**
     * @author Victor Ferreira Souza
     * @return orcamentos
     * realiza a pesquisa no banco de dados
     */
    static function pesquisar($filtroPesquisa){
        if($filtroPesquisa->op == "vendedorOp"){
            if($filtroPesquisa->inicial && $filtroPesquisa->final){
                $orcs = Orcamento::where('vendedor', "like", "%".$filtroPesquisa->pesquisa."%")
                ->where('updated_at', ">=", $filtroPesquisa->inicial)
                ->where('updated_at', "<=", $filtroPesquisa->final)->paginate(15);
            }elseif($filtroPesquisa->inicial){
                $orcs = Orcamento::where('vendedor', "like", "%".$filtroPesquisa->pesquisa."%")
                ->where('updated_at', ">=", $filtroPesquisa->inicial)->paginate(15);
            }elseif($filtroPesquisa->final){
                $orcs = Orcamento::where('vendedor', "like", "%".$filtroPesquisa->pesquisa."%")
                ->where('updated_at', "<=", $filtroPesquisa->final)->paginate(15);
            }else{
                $orcs = Orcamento::where('vendedor', "like", "%".$filtroPesquisa->pesquisa."%")->paginate(15);
            }
            
            
        }else{
            if($filtroPesquisa->inicial && $filtroPesquisa->final){
                $orcs = Orcamento::where('cliente', "like", "%".$filtroPesquisa->pesquisa."%")
                ->where('updated_at', ">=", $filtroPesquisa->inicial)
                ->where('updated_at', "<=", $filtroPesquisa->final)->paginate(15);
            }elseif($filtroPesquisa->inicial){
                $orcs = Orcamento::where('cliente', "like", "%".$filtroPesquisa->pesquisa."%")
                ->where('updated_at', ">=", $filtroPesquisa->inicial)->paginate(15);
            }elseif($filtroPesquisa->final){
                $orcs = Orcamento::where('cliente', "like", "%".$filtroPesquisa->pesquisa."%")
                ->where('updated_at', "<=", $filtroPesquisa->final)->paginate(15);
            }else{
                $orcs = Orcamento::where('cliente', "like", "%".$filtroPesquisa->pesquisa."%")->paginate(15);
            }
            
        }
        
        return $orcs;
    }

}
