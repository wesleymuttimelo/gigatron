@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Novo colaborador</h5>
                        <form name="formEmployee_edit" id="formEmployee_edit" action="/employee/edit/{{$employee->id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nome</label>
                                    <input type="text" name="name" class="form-control" id="inputName" value="{{$employee->name}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputDocument">Cpf</label>
                                    <input type="text" name="document" class="form-control" id="inputDocument" value="{{$employee->document}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputRg">Rg</label>
                                    <input type="text" name="rg" class="form-control" id="inputRg" value="{{$employee->rg}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputCep">Cep</label>
                                    <input type="text" name="cep" class="form-control" id="inputCep" value="{{$employee->cep}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputStreet">Endereço</label>
                                    <input type="text" name="street" class="form-control" id="inputStreet" value="{{$employee->street}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputNumber">Numero</label>
                                    <input type="text" name="number" class="form-control" id="inputNumber" value="{{$employee->number}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputNeighborhood">Bairro</label>
                                    <input type="text" name="neighborhood" class="form-control" id="inputNeighborhood" value="{{$employee->neighborhood}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" name="city" class="form-control" id="inputCity" value="{{$employee->city}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">Estado</label>
                                    <input type="text" name="state" class="form-control" id="inputState" value="{{$employee->state}}">
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#inputCep').change(()=>{
            cep = $('#inputCep').val()
            if(cep){
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data){
                    console.log(data)
                    if(data){
                        $('#inputStreet').val(data.logradouro)
                        $('#inputNeighborhood').val(data.bairro)
                        $('#inputCity').val(data.localidade)
                        $('#inputState').val(data.uf)
                    }
                });
            }
        })

    </script>
@endsection
