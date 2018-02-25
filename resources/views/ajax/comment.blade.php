<div class="row">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="thumbnail" id="thumbnail_{{$comment['id']}}">
            {{$comment['body']}}
            <div class="hidden commentParent_{{$comment['id']}}" id="{{$comment['id']}}" >
                <form id="parenCommentForm" onsubmit="alert();return false;">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea type="text" rows="3" name="body" class="form-control" placeholder="Оставьте свой комментарий" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="addComment" onclick="">добавить комментарий</button>
                </form>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" id="commentParent_{{$comment['id']}}"
                    onclick="$('.' + this.id).removeClass('hidden');$('#'+this.id).addClass('hidden');">Ответить</button>
        </div>
    </div>
</div>