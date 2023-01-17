@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Category'])
    <div class="container-fluid py-4">


        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Category List</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul id="tree1">
                            @foreach ($categories as $category)
                                @php
                                    $cid = $category->id;
                                    $ctitle = $category->title;
                                @endphp
                                <li>
                                    {{ $category->title }}
                                        <a class="text-danger text-gradient px-3 mb-0" onclick="return confirm('Are you sure?')" href="{{ route('delete.category', $category->id) }}"><i
                                                class="far fa-trash-alt me-2"></i></a>
                                        <a class="text-dark mb-0" onclick="$('#category{{$category->id}}').modal('show');"><i
                                                class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                    @if (count($category->childs))
                                        @include('pages.manageChild', ['childs' => $category->childs])
                                    @endif
                                </li>
                                @include('pages.edit-category')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card shadow-lg mb-4" id="addCategory">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Add New Category</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="row gx-4">
                            {!! Form::open(['route' => 'add.category']) !!}


                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                {!! Form::label('Title:') !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                {!! Form::label('Category:') !!}
                                {!! Form::select('parent_id', $allCategories, old('parent_id'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Category',
                                ]) !!}
                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-success">Add New</button>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
