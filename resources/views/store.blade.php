@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Novo colaborador</h5>
                        <form name="formEmployee" id="formEmployee" action="/employee/store" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nome</label>
                                    <input type="text" name="name" class="form-control" id="inputName" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputDocument">Cpf</label>
                                    <input type="text" name="document" class="form-control" id="inputDocument" data-mask="00/00/0000" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputRg">Rg</label>
                                    <input type="text" name="rg" class="form-control" id="inputRg" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputCep">Cep</label>
                                    <input type="text" name="cep" class="form-control" id="inputCep" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputStreet">Endereço</label>
                                    <input type="text" name="street" class="form-control" id="inputStreet" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputNumber">Numero</label>
                                    <input type="text" name="number" class="form-control" id="inputNumber" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputNeighborhood">Bairro</label>
                                    <input type="text" name="neighborhood" class="form-control" id="inputNeighborhood" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" name="city" class="form-control" id="inputCity" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputState">Estado</label>
                                    <input type="text" name="state" class="form-control" id="inputState" required>
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function($){
            $("#inputDocument").mask('000.000.000-00', {reverse: true});
            $('#inputCep').mask('00000-000');
        });
        $('#inputCep').change(()=>{
            cep = $('#inputCep').val()
            if(cep){
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data){
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
