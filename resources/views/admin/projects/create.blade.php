@extends('layouts.admin')

@section('content')

    <h2 class="text-white">Aggiungi Progetto</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-6">

            @php
                $status = 'prod';
                $title = '';
                $text = '';
                if($status == 'test'){
                    $title = 'test';
                    $text = 'test';
                }
            @endphp

            <form action="{{ route('admin.projects.store')}}" method="POST" enctype="multipart/form-data" class="bg-success-subtle px-3 pt-2 pb-3 rounded-2">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo (*)</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
                    @error('title')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Tipo</label>
                    <select name="type_id" class="form-select" aria-label="Default select example">
                        <option value="" selected>Seleziona un tipo</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                @if (old('type_id') == $type->id) selected @endif
                                >{{ $type->name }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Tecnologie:</label>
                    <div class="btn-group btn-group-sm" role="group">
                        @foreach ($technologies as $technology)
                            <input
                                name="technologies[]"
                                id="technology_{{ $technology->id }}"
                                class="btn-check"
                                autocomplete="off"
                                type="checkbox"
                                value="{{ $technology->id }}"
                                @if (in_array($technology->id, old('technologies',[])))
                                    checked
                                @endif
                            >
                            <label class="btn btn-outline-success" for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input
                        id="image"
                        class="form-control"
                        name="image"
                        type="file"
                        onchange="showImage(event)"
                    >
                    <img class="thumb" id="thumb" src="/img/no-image.webp" alt="">
                    @error('image')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Descrizione (*)</label>
                    <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="text">{{ old('text') }}</textarea>
                    @error('text')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="technology" class="form-label">Tecnologia (*)</label>
                    <input name="technology" type="text" class="form-control @error('technology') is-invalid @enderror" id="technology" value="{{ old('technology') }}">
                    @error('technology')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="type" class="form-label">Tipo (*)</label>
                    <input name="type" type="text" class="form-control @error('type') is-invalid @enderror" id="type" value="{{ old('type') }}">
                    @error('type')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div> --}}

                <button class="btn btn-success" type="submit">Invia nuovo progetto</button>
                <button class="btn btn-danger" type="reset">Reset</button>

            </form>
        </div>
    </div>

    <script>

        function showImage(event){
            const thumb = document.getElementById('thumb');
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }

    </script>
@endsection
