@extends('layouts.layouts')

@section('content')



    <div class="col-md-2"></div>
    <div class="col-md-7">
            <div class="form-group">
                <label for="exampleInputEmail1">Информация о пользователе</label>
            </div>
            <div class="form-group">
                <div><label>Имя: </label>{{$userInfo->name}} </div><br>
                <div><label>Email: </label> {{$userInfo->email}}</div><br>
                <div class="container">
                <div class="col-sm-6 col-md-2">
                    <div style="width: 100px;height: 100px;border-radius: 100%;background: aquamarine">
                        <div style="padding-top: 10%;padding-left: 37%;"><h1>{{$userInfo->subscriptions_count}}</h1></div></div>
                    <label>Подписчиков:</label>
                </div>
                    <div class="col-sm-6 col-md-2">
                        <div style="width: 100px;height: 100px;border-radius: 100%;background: aquamarine">
                            <div style="padding-top: 10%;padding-left: 37%;"><h1>{{$userInfo->articles_count}}</h1></div></div>
                        <label>статей:</label>
                    </div>
                </div><br>
                <div><label>Дата регистрации: </label> {{$userInfo->created_at}}</div>

            </div>
    </div>

@endsection