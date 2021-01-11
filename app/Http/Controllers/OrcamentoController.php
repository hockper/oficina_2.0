<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;

class OrcamentoController extends Controller
{
    /**
     * @author Victor Ferreira Souza
     * @return view
     * retorna a view Adicionar
     */
    public function indexAdicionar(){
        return view('Adicionar');
    }


    /**
     * @author Victor Ferreira Souza
     * @param formRequest
     * @return view
     * salva um novo orçamento no banco de dados
     */
    public function salvar(\App\Http\Requests\OrcamentoRequest $r){
        Orcamento::create($r->all());
        \Session::flash('flash_message',[
            'msg' => "Orçamento cadastrado com sucesso",
            'class' => "alert-success"        
        ]);
        return redirect()->route('adicionar');
    }



    /**
     * @author Victor Ferreira Souza
     * @return view
     * retorna a view Pesquisar
     */
    public function indexPesquisar(){
    
        $orcs = Orcamento::paginate(15);

        return view('Pesquisar', ['orcs' => $orcs]);
    }



    /**
     * @author Victor Ferreira Souza
     * @param formRequest
     * @return view
     * realiza uma pesquisa no banco de dados
     * e retorna para a view Pesquisar o resultado
     */
    public function resultado(\App\Http\Requests\PesquisaRequest $r){
        $orcs = Orcamento::pesquisar($r);
        
        return view('Pesquisar', ['orcs' => $orcs,
                                  'form' => $r]);
    }



    /**
     * @author Victor Ferreira Souza
     * @param id
     * @return view
     * retorna uma view para edição de um orçamento
     */
    public function editar($id){
        $orc = Orcamento::find($id);
        if(!$orc){
            \Session::flash('flash_message',[
                'msg' => "Esse orçamento não esta cadastrado",
                'class' => "alert-danger"
            ]);
            return redirect()->route('pesquisar');
        }
        return view('Editar', compact('orc'));
    }



    /**
     * @author Victor Ferreira Souza
     * @param formRequest, id
     * @return view
     * realiza a edição de um orçamento
     * e salva no banco de dados
     */
    public function atualizar(\App\Http\Requests\PesquisaRequest $r, $id){
        Orcamento::find($id)->update($r->all());
      
        \Session::flash('flash_message',[
            'msg' => "Orçamento atualizado com sucesso",
            'class' => "alert-success"
        ]);
        return redirect()->route('pesquisar');
       
    }



    /**
     * @author Victor Ferreira Souza
     * @param id
     * @return view
     * deleta um orçamento
     */
    public function deletar($id){
        Orcamento::find($id)->delete();
        \Session::flash('flash_message',[
            'msg' => "Orçamento deletado com sucesso",
            'class' => "alert-success"
        ]);
        return redirect()->route('pesquisar');
    }
}
