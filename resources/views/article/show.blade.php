@extends('layouts.layouts')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-2"></div>

                            <div class="thumbnail">
                                <div class="caption">
                                    <h3>
                                        {{$fullNew->title}}
                                    </h3>
                                    <br>
                                        <p>
                                            {{Carbon\Carbon::parse($fullNew->created_at)->format('d M Y')}}
                                        </p>
                                    <br>
                                    <div class="row">
                                        <div class="container article" >
                                                {{$fullNew->body}}
                                        </div>

                                        <form id="subscription" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" id="autorId"  name="autorId" value="{{$fullNew->user_id}}"/>
                                        <button type="submit" class="btn btn-default pull-right"
                                                style="margin-right: 25px;border-radius:20px " >
                                            <span class="glyphicon glyphicon-heart" aria-hidden="true"  id="send"> Подписаться</span>
                                        </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Комментарии:</h3>

                <div class="container-fluid comments">
                    @if(isset($comments))
                        @foreach($comments as $comment)
                    <div class="row">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="thumbnail">
                                {{$comment->body}}
                                <div class="hidden commentParent_{{$comment->id}}" id="{{$comment->id}}" >
                                <form id="parenCommentForm" onsubmit="alert();return false;">
                                    {{csrf_field()}}
                                    <input type="text" class="hidden" id="parentId" value="{{$comment->id}}">
                                    <div class="form-group">
                                        <textarea type="text" rows="3" name="body" class="form-control" placeholder="Оставьте свой комментарий" ></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="addComment" onclick="">добавить комментарий</button>
                                </form>
                            </div>
                                <br>
                                <button type="submit" class="btn btn-primary" id="commentParent_{{$comment->id}}"
                                            onclick="$('.' + this.id).removeClass('hidden');$('#'+this.id).addClass('hidden');">Ответить</button>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @else
                        <div class="thumbnail">
                            <h5>Ещё нет комментариев к этой статье</h5>
                        </div>
                    @endif
                        <form id="commentForm" onsubmit="alert();return false;">
                            {{csrf_field()}}
                            <input type="text" class="hidden" id="articleId" value="{{$comment->id}}">
                            <div class="form-group">
                                <textarea type="text" rows="3" name="body" class="form-control" placeholder="Оставьте свой комментарий" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="addComment"  >добавить комментарий</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection

