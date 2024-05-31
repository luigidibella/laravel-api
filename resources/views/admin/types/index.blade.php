@extends('layouts.admin')

@section('content')

    <h2 class="text-white">Elenco Tipi</h2>

    <div class="row">
        <div class="col-6">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error')}}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <div class="my-4">
                <form action="{{ route('admin.types.store') }}" method="POST" class="d-flex">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Nuovo Tipo" name="name">
                    <button class="btn btn-success" type="submit">Invia</button>
                </form>
            </div>
            <table class="table crud-table">
                <thead>
                  <tr>
                    <th scope="col" class="bg-success-subtle">Nome</th>
                    <th scope="col" class="bg-success-subtle">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($types as $item)
                    <tr>
                      <td>
                        <form action="{{ route('admin.types.update', $item) }}" method="POST" id="form-edit-{{ $item->id }}">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{ $item->name }}" name="name">
                        </form>
                      </td>
                      <td>
                        <div class="d-flex">
                            <button class="btn btn-warning me-2" onclick="submitForm( {{ $item->id }} )"><i class="fa-regular fa-pen-to-square"></i></button>
                            <form action="{{ route('admin.types.destroy', $item) }}" method="POST" onsubmit="return confirm('Sei sicuro di vole eliminare \'{{ $item->name }}\'?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                            {{-- <a href="{{ route('admin.types.edit', $item->id) }}" class="btn btn-warning me-2"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form
                                class="d-inline"
                                action="{{ route('admin.types.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Sei sicuro di vole eliminare \'{{ $item->title }}\'?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                            </form> --}}
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function submitForm(id){
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>

@endsection
