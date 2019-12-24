@extends('cms.layout')

@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">component name</th>
        <th scope="col">component type</th>
        <th scope="col">delete from page</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($page->components as $component)
            <tr>
                <td scope="row">{{ $component->name }}</td>
                <td>{{ $component->component_type }}</td>
                <td>
                    <form action="{{ route('cms.pages.components.destory', ['page'=>$page->name, 'component'=>$component->name]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger" type="submit" value="{{ __('Delete') }}" />
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
