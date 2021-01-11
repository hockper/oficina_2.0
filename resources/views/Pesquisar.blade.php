@extends('welcome')


<style>
    .main{
        background-color: rgb(138, 133, 133);
        height: max-content;
        width: 100vw;
        margin: 0;
        overflow: scroll;
        max-height: 100%;
        scrollbar-width: none;
    }
</style>

@section('main')
    <div class="container main" >
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <form method="POST" action="{{ route('resultado') }}">
                            {{ csrf_field() }}
                            <div class="md-form">
                               <div>
                                    <input class=" form-text" type="text" placeholder="Pesquisar" aria-label="Search", list="data" name="pesquisa"
                                    @isset($form)
                                        value={{$form->pesquisa}}
                                    @endisset
                                    >
                                    <input type="radio" value="vendedorOp" name="op" 
                                    @isset($form)
                                        @if ($form->op == "vendedorOp")
                                            checked
                                        @endif
                                    @else
                                        checked
                                    @endisset >
                                    <label>Vendedor</label>
                                    
                                    <input type="radio" value="clienteOp" name="op"
                                    @isset($form)
                                        @if ($form->op == "clienteOp")
                                        checked
                                        @endif
                                    @endisset>
                                    <label>Cliente</label>
                               </div>
                                
                                <div>
                                    <label for="inicial">Data Inicial</label>
                                    <input type="date" name="inicial"
                                    @isset($form)
                                        value={{$form->inicial}}
                                    @endisset>
                                    <label for="inicial">Data Final</label>
                                    <input type="date" name="final"
                                    @isset($form)
                                        value={{$form->final}}
                                    @endisset>
                                    <button class="btn btn-info">Pesquisar</button>
                                </div>
                                
                                
                            
                              

                            </div>
                            <datalist id="data">
                                @foreach ($orcs as $orc)
                                    <option value="{{$orc->vendedor}}"></option>
                                    <option value="{{$orc->cliente}}"></option>
                                @endforeach
                            </datalist>
                          </form>
                          
                    </div>
                        
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vendedor</th>
                                    <th>Cliente</th>
                                    <th>Descrição</th>
                                    <th>Valor Orçado</th>
                                    <th>Data</th>
                                    <th>Opções</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orcs as $orc)
                                <tr>
                                    <th scope="row">{{$orc->id}}</th> 
                                    <td>{{$orc->vendedor}}</td>
                                    <td>{{$orc->cliente}}</td>
                                    <td>{{$orc->descricao}}</td>
                                    <td>{{$orc->valorOrcado}}</td>
                                    <td>{{$orc->updated_at}}</td>
                                    <td>
                                        <a href="{{route('editar', $orc->id)}}" class="btn btn-default">Editar</a>
                                        <a href="javascript:(confirm('Tem certeza que quer excluir o orçamento?') ? window.location.href='{{route('deletar', $orc->id)}}' : false)" class="btn btn-danger">Excluir</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        <div class=" d-flex justify-content-center">
                            
                            {{ $orcs->links('pagination::bootstrap-4') }}
                            
                            
                        </div>
                       
                       
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection