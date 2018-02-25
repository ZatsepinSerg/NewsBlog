@extends('layouts.layouts')
@section('content')
    <div class="col-md-2"></div>
                <div class="col-md-7">
                <form method="POST" action="/articles" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Заголовок</label>
                        <input type="text" class="form-control" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Текст статьи</label>
                        <textarea type="text" rows="3" name="body" class="form-control" placeholder="Содержание статьи" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Опубликовать</button>
                </form>
               </div>
@endsection