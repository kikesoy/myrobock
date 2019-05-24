<div class="modal modal-myrobock fade" id="modal-{{$modal_id}}" tabindex="-1" role="dialog" aria-labelledby="{{$modal_id}}ModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column">
                <img src="{{ asset('img/logo-my-robock-light.png') }}" alt="My Robock" class="modal-brand">
                <h3 class="modal-title" id="{{$modal_id}}ModalLabel">
                    {{$modal_title}}
                </h3>
            </div>
            <div class="brand-gradient-static"></div>
            @include('components.flash-modal-messages')
            <div class="modal-body">
                
                {{$modal_content}}
            </div>
            <div class="modal-footer">
                {{$modal_actions}}
            </div>
        </div>
    </div>
</div>