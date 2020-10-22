<div>
    @foreach($comments as $comment)
        <div class="pt-2  ml-3">
            <div class = 'card p-0 comments' data-id ="{{$comment["id"]}}">
                <div class =' p-1 card-header bg-dark text-light row' >
                    <div class ='col-1 p-0' style="max-width: 32px">
                        <img class ='comment-img rounded m-0 img-fluid img' src='{{asset($comment["image"])}}' style='width: 32px;height: 32px;' alt=''>
                    </div>
                    <h6 class='col '>{{$comment["first_name"] }} {{$comment["second_name"]}}</h6>
                    <small class='col text-right date-comment' data-id="{{$comment["id"]}}" >{{$comment["created_at"]}}</small>

                </div>
                <div class='p-1 card-body comments-text' data-id="{{$comment["id"]}}">
                    {{ $comment["text"]}}
                </div>
                <div class='p-1 pr-2 m-0 card-footer bg-dark text-right'>
                    <a href="#"
                       class=" float-right response-comment text-decoration-none"
                       data-id = "{{$comment["id"]}}"
                       data-toggle='modal'
                       data-target='#myModal'
                       ><strong>response</strong></a>

                    @if($comment["user_id"] === Auth::user()->id)
                         <a href="#"
                            class=" mr-1 float-right edit-comment  text-warning text-decoration-none"
                            data-id = "{{$comment["id"]}}"
                            data-toggle='modal'
                            data-target='#EditModal'
                            ><strong>edit</strong></a>


                         <a href="#"
                            class="mr-1 float-right  delete-comment text-danger text-decoration-none"
                            data-id = "{{$comment["id"]}}"
                            data-toggle='modal'
                            data-target='#DeleteModal'
                            ><strong>delete</strong></a>

                    @endif
                </div>
                <div class="ml-3 border-left border-dark comments-parent" data-id="{{$comment["id"]}}"></div>
            </div>
            @include(".include.comment",  array('comments'=>$comment["child"]))
        </div>
    @endforeach
</div>
