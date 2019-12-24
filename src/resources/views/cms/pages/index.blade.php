@extends('cms.layout')

@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">page path</th>
        <th scope="col">page view</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pages as $page)
            <tr>
                <td>{{ $page->view }}</td>
                <td scope="row">{{ $page->path }}</td>
                <td>
                    <form action="{{ route('cms.pages.destory', ['page'=>$page->name, 'component'=>$component->name]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger" type="submit" value="{{ __('Delete') }}" />
                    </form>
                </td>
            </tr>
        @endforeach
        @include('cms.pages')
    </tbody>
</table>
