@extends('welcome')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">Editar</div>
                        
                    <div class="card-body">
                        <form action="{{ route('atualizar', $orc->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="nomeVendedor">Nome do vendedor</label>
                                <input type="text" name="vendedor" class="form-control" placeholder="Nome do vendedor" value="{{$orc->vendedor}}">
                                @error('vendedor')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror       
                            </div>
                            <div class="form-group">
                                <label for="nomeCliente">Nome do cliente</label>
                                <input type="text" name="cliente" class="form-control" placeholder="Nome do cliente" value="{{$orc->cliente}}">
                                @error('cliente')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror  
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descriçao</label>
                                <input type="text" name="descricao" class="form-control" placeholder="Descriçao" value="{{$orc->descricao}}">
                                @error('descricao')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror  
                            </div>
                            <div class="form-group">
                                <label for="valorOrcado">Valor Orçado</label>
                                <input type="number" min="0" step="0.01" name="valorOrcado" class="form-control" placeholder="Valor Orçado" value="{{$orc->valorOrcado}}">
                                @error('valorOrcado')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror  
                            </div>
                            <button class="btn btn-info">Salvar</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection