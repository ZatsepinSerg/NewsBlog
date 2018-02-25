@extends('layouts.layouts')
@section('content')

    <div class="container-fluid">
        @if(!empty($newsAll))
        @foreach( $newsAll AS $new)
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3>
                                        {{$new->title}}
                                    </h3>
                                    <br>
                                    <p>
                                        {{Carbon\Carbon::parse($new->created_at)->format('d M Y')}}
                                    </p>
                                    <br>
                                    <div class="row" style=" ">
                                        <div class="container article">

                                                {{$new->body}}

                                        </div>
                                    </div>
                                    <p>
                                        <a class="btn btn-primary" href="/articles/{{$new->id}}">Подробнее</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <h2>Ещё нет новостей</h2>
            </div>
        @endif
        <div class="col-md-10">
        </div>
    </div>


@endsection