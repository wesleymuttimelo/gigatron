@extends('layouts.app')

@section('content')
    <style>
        .btn_add_employee{
            display:flex;
            justify-content: flex-end;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">Lista de colaboradores</div>
                                <div class="col-md-8 btn_add_employee">
                                    <button type="button" class="btn btn-success" onclick="addEmployee()">Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cpf</th>
                                <th scope="col">Logradouro</th>
                                <th scope="col">Número</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Cidade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->document}}</td>
                                    <td>{{$employee->street}}</td>
                                    <td>{{$employee->number}}</td>
                                    <td>{{$employee->neighborhood}}</td>
                                    <td>{{$employee->city}}</td>
                                    <td><button type="button" class="btn btn-primary" onclick="toEdit({{$employee->id}})"><i class="fas fa-edit"></i></button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="del({{$employee->id}})"><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <!-- a Tag for previous page -->
                                <li class="page-item"><a class="page-link" href="{{$employees->previousPageUrl()}}">Anterior</a></li>
                                <!-- You can insert logo or text here -->
                                @for($i=1;$i<=$employees->lastPage();$i++)
                                <!-- a Tag for another page -->
                                    <li class="page-item"><a class="page-link" href="{{$employees->url($i)}}">{{$i}}</a></li>
                                @endfor
                                <!-- a Tag for next page -->
                                <li class="page-item"><a class="page-link" href="{{$employees->nextPageUrl()}}">Próxima</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        function addEmployee(){
            window.location = '/employee/index';
        }
        function del(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/employee/delete/' + id,
                type: 'DELETE',
                success: function (result) {
                    // Do something with the result
                    console.log(result);
                }
            });
        }
        function toEdit(id){
            window.location = `/employee/edit/${id}`
        }
    </script>
@endsection
