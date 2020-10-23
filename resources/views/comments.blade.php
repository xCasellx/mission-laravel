@extends("layouts.temp")
@section("title")Comments @endsection


@section("content")
    <main role="main" class=" p-3 container">
        @if(session()->has('message_success'))
            <div class="message-success mt-2 alert alert-success">
                {{ session()->get('message_success') }}
            </div>
        @endif
        @if(session()->has('message_error'))
            <div class="message-success mt-2 alert alert-danger">
                {{ session()->get('message_success') }}
            </div>
        @endif
       <div class="container bg-white p-3">
           <form class="m-3 form-comment" method="POST" action="{{route("comment.create")}}">
               @csrf
               <div class="">
                   <textarea name="text" rows="10" maxlength="512" class="@error('text') is-invalid @enderror form-control "></textarea>

                   @error('text')
                   <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
               </div>
               <div class="mt-2 form-group row mb-0">
                   <div class="col-md-6 offset-md-0">
                       <button type="submit" class="create-btn btn btn-primary">
                           {{ __("Send") }}
                       </button>
                   </div>
               </div>
           </form>
       </div>
        <div class="container mt-3 pt-2 border-top border-dark ">
            @include("include.comment",array("comments" => $comments))
        </div>
    </main>

    <div class="modal fade" id="myModal">
        <div class=" modal-dialog" >
            <div class="bg-dark modal-content p-0" >
                <div class="text-center text-light modal-header">
                    <div class="container">
                        <h4 class="modal-title">Leave a comment</h4>
                    </div>
                </div>
                <div class="bg-light modal-body" >
                    <form action="{{route("comment.create")}}" method="POST" class="form-comment">
                        @csrf
                        <input type="hidden" id="parent_id" name="parent_id">
                        <textarea required class="form-control border-dark border" maxlength="512" id="modal_comment" name="text" rows="10" cols="70"></textarea>
                        <div class="mt-2 float-right">
                            <button type="submit"   id="modal_button" class="create-btn off btn btn-success" ><strong>Send</strong></button>
                            <button type="button" class="create-btn btn btn-danger" data-dismiss="modal"><strong>Close</strong></button>
                        </div>
                    </form>
                </div>
                <div class="p-1 bg-dark modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal">
        <div class=" modal-dialog" >
            <div class="bg-dark modal-content p-0" >
                <div class="text-center text-light modal-header">
                    <div class="container">
                        <h4 class="modal-title">Edit comment</h4>
                    </div>
                </div>
                <div class="bg-light modal-body" >
                    <form action="{{route("comment.edit")}}" method="POST" class="form-comment">
                        @csrf
                        <input type="hidden" id="comment_id" name="comment_id">
                        <textarea required class="form-control border-dark border" maxlength="512" id="edit_text_comment" name="text" rows="10" cols="70"></textarea>
                        <div class="mt-2 float-right">
                            <button type="submit"   id="modal_button" class="create-btn off btn btn-success" ><strong>Seve</strong></button>
                            <button type="button" class="create-btn btn btn-danger" data-dismiss="modal"><strong>Close</strong></button>
                        </div>
                    </form>
                </div>
                <div class="p-1 bg-dark modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DeleteModal">
        <div class=" modal-dialog" >
            <div class="bg-dark modal-content p-0" >
                <div class="text-center text-light modal-header">
                    <div class="container">
                        <h4 class="modal-title">Delete comment</h4>
                    </div>
                </div>
                <div class="bg-light modal-body" >
                    <div class="mt-2 offset-4">
                        <a href="/comment/delete/"  id="modal_button_delete" class="create-btn off btn btn-danger " ><strong>Delete</strong></a>
                        <button type="button" class="create-btn btn btn-success" data-dismiss="modal"><strong>Close</strong></button>
                    </div>
                </div>
                <div class="p-1 bg-dark modal-footer"></div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/comments.js') }}"></script>
@endpush



