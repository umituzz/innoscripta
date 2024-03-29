@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ __('Article Management') }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Articles') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Source') }}</th>
                        <th>{{ __('Author') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Published At') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->source->name }}</td>
                            <td>{{ $article->author->name }}</td>
                            <td>{{ $article->category->name ?? NULL }}</td>
                            <td>
                                <a href="{{ $article->url }}" target="_blank">
                                    {{ $article->title }}
                                </a>
                            </td>
                            <td>{{ $article->published_at }}</td>
                            <td></td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                    <tfoot>
                    @isset($articles)
                    {{ $articles->links() }}
                    @endisset
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
