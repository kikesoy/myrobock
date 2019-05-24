@php
    $now = now()->format('d/m/Y');
@endphp

@if ($message == "vacio")
    <table style="height: 90%;">
        <tbody>
            <tr class="text-center">
                <td class="align-middle" style="width: 60rem;">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 2rem;">{{ trans('myrobock/messenger/index.table.empty') }}</h5>
                            <p class="card-text" style="font-size: 5rem;"><i class="far fa-envelope-open"></i></p>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@else
{{ $message->links() }}
    <table class="table table-hover table-sm text-center">
        <thead class="thead-dark">
            <tr>
                <th> </th>
                <th scope="col">Status 
                    @if (Route::getCurrentRoute()->uri() === 'my-account/messenger' or Route::getCurrentRoute()->uri() === 'my-account/messenger/order-asc')
                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chevron-down" style="font-size: small;"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="max-height: 200px;
                        overflow: auto;">
                            <a href="{{ route('messenger.status', ['option' => 2]) }}" class="dropdown-item"><span class="kpi-mail-new">Nuevo</span></a>
                            <a href="{{ route('messenger.status', ['option' => 3]) }}" class="dropdown-item"><span class="kpi-mail-received">Recibido</span></a>
                            <a href="{{ route('messenger.status', ['option' => 4]) }}" class="dropdown-item"><span class="kpi-mail-read">Leido/Abierto</span></a>
                            <a href="{{ route('messenger.status', ['option' => 5]) }}" class="dropdown-item"><span class="kpi-mail-closed">Cerrado</span></a>
                        </div>
                    @endif
                    @if (substr(Request::path(), 0, 31) === 'my-account/messenger/category/1')
                        <a href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chevron-down" style="font-size: small;"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 1]) }}" class="dropdown-item"><span class="kpi-mail-send">Enviado</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 2]) }}" class="dropdown-item"><span class="kpi-mail-new">Nuevo</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 3]) }}" class="dropdown-item"><span class="kpi-mail-received">Recibido</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 4]) }}" class="dropdown-item"><span class="kpi-mail-read">Leido/Abierto</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 5]) }}" class="dropdown-item"><span class="kpi-mail-closed">Cerrado</span></a>
                        </div>
                    @endif
                    @if (substr(Request::path(), 0, 31) === 'my-account/messenger/category/2')
                        <a href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chevron-down" style="font-size: small;"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                            <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 1]) }}" class="dropdown-item"><span class="kpi-mail-send">Enviado</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 2]) }}" class="dropdown-item"><span class="kpi-mail-new">Nuevo</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 3]) }}" class="dropdown-item"><span class="kpi-mail-received">Recibido</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 4]) }}" class="dropdown-item"><span class="kpi-mail-read">Leido/Abierto</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 5]) }}" class="dropdown-item"><span class="kpi-mail-closed">Cerrado</span></a>
                        </div>
                    @endif
                    @if (substr(Request::path(), 0, 31) === 'my-account/messenger/category/3')
                        <a href="#" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chevron-down" style="font-size: small;"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                            <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 1]) }}" class="dropdown-item"><span class="kpi-mail-send">Enviado</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 2]) }}" class="dropdown-item"><span class="kpi-mail-new">Nuevo</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 3]) }}" class="dropdown-item"><span class="kpi-mail-received">Recibido</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 4]) }}" class="dropdown-item"><span class="kpi-mail-read">Leido/Abierto</span></a>
                            <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 5]) }}" class="dropdown-item"><span class="kpi-mail-closed">Cerrado</span></a>
                        </div>
                    @endif
                </th>
                <th scope="col">Category</th>
                <th scope="col">Subject</th>
                <th scope="col">Managed</th>
                <th scope="col">Update 
                    @if (Route::getCurrentRoute()->uri() === 'my-account/messenger' or Route::getCurrentRoute()->uri() === 'my-account/messenger/order-asc')
                        <a href="{{ route('messenger.index') }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.index-order') }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (substr(Request::path(), 0, 29) === 'my-account/messenger/status/1')
                        <a href="{{ route('messenger.status', ['option' => 1]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.status-asc', ['option' => 1]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (substr(Request::path(), 0, 29) === 'my-account/messenger/status/2')
                        <a href="{{ route('messenger.status', ['option' => 2]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.status-asc', ['option' => 2]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (substr(Request::path(), 0, 29) === 'my-account/messenger/status/3')
                        <a href="{{ route('messenger.status', ['option' => 3]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.status-asc', ['option' => 3]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (substr(Request::path(), 0, 29) === 'my-account/messenger/status/4')
                        <a href="{{ route('messenger.status', ['option' => 4]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.status-asc', ['option' => 4]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (substr(Request::path(), 0, 29) === 'my-account/messenger/status/5')
                        <a href="{{ route('messenger.status', ['option' => 5]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.status-asc', ['option' => 5]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/1' || Request::path() === 'my-account/messenger/category/1/order-asc')
                        <a href="{{ route('messenger.category', ['option' => 1]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category-asc', ['opcion' => 1]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/2' || Request::path() === 'my-account/messenger/category/2/order-asc')
                        <a href="{{ route('messenger.category', ['option' => 2]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category-asc', ['opcion' => 2]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/3' || Request::path() === 'my-account/messenger/category/3/order-asc')
                        <a href="{{ route('messenger.category', ['option' => 3]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category-asc', ['opcion' => 3]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/1/status/1' || Request::path() === 'my-account/messenger/category/1/status/1/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 1]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 1, 'opcion1' => 1]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/1/status/2' || Request::path() === 'my-account/messenger/category/1/status/2/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 2]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 1, 'opcion1' => 2]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/1/status/3' || Request::path() === 'my-account/messenger/category/1/status/3/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 3]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 1, 'opcion1' => 3]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/1/status/4' || Request::path() === 'my-account/messenger/category/1/status/4/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 4]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 1, 'opcion1' => 4]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/1/status/5' || Request::path() === 'my-account/messenger/category/1/status/5/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 1, 'opcion1' => 5]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 1, 'opcion1' => 5]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/2/status/1' || Request::path() === 'my-account/messenger/category/2/status/1/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 1]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 2, 'opcion1' => 1]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/2/status/2' || Request::path() === 'my-account/messenger/category/2/status/2/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 2]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 2, 'opcion1' => 2]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/2/status/3' || Request::path() === 'my-account/messenger/category/2/status/3/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 3]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 2, 'opcion1' => 3]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/2/status/4' || Request::path() === 'my-account/messenger/category/2/status/4/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 4]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 2, 'opcion1' => 4]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/2/status/5' || Request::path() === 'my-account/messenger/category/2/status/5/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 2, 'opcion1' => 5]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 2, 'opcion1' => 5]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/3/status/1' || Request::path() === 'my-account/messenger/category/3/status/1/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 1]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 3, 'opcion1' => 1]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/3/status/2' || Request::path() === 'my-account/messenger/category/3/status/2/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 2]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 3, 'opcion1' => 2]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/3/status/3' || Request::path() === 'my-account/messenger/category/3/status/3/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 3]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 3, 'opcion1' => 3]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/3/status/4' || Request::path() === 'my-account/messenger/category/3/status/4/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 4]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 3, 'opcion1' => 4]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                    @if (Request::path() === 'my-account/messenger/category/3/status/5' || Request::path() === 'my-account/messenger/category/3/status/5/order-asc')
                        <a href="{{ route('messenger.category.status', ['opcion' => 3, 'opcion1' => 5]) }}"><i class="fas fa-long-arrow-alt-down"></i></a>
                        <a href="{{ route('messenger.category.status-asc', ['opcion' => 3, 'opcion1' => 5]) }}"><i class="fas fa-long-arrow-alt-up"></i></a>
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
           @foreach ($message as $content)
            <tr>
                <td> 
                    <div class="custom-control custom-checkbox" style="display: inline-flex; cursor:pointer;">
                        <input type="checkbox" class="case custom-control-input" id="{{$content->id}}">
                        <label class="custom-control-label" for="{{$content->id}}"> </label>
                    </div>
                </td>
                
                @if ($content->messageStatusUser->name == 'Enviado')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"><span class="kpi-mail-send">{{ trans("myrobock/messenger/index.category.".$content->messageStatusUser->name) }}</span></td>
                @elseif ($content->messageStatusUser->name == 'Cerrado')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"><span class="kpi-mail-closed">{{ trans("myrobock/messenger/index.category.".$content->messageStatusUser->name) }}</span></td>
                @elseif ($content->messageStatusUser->name == 'Leido/Abierto')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"><span class="kpi-mail-read">{{ trans("myrobock/messenger/index.category.".$content->messageStatusUser->name) }}</span></td>
                @elseif ($content->messageStatusUser->name == 'Recibido')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"><span class="kpi-mail-received">{{ trans("myrobock/messenger/index.category.".$content->messageStatusUser->name) }}</span></td>
                @elseif ($content->messageStatusUser->name == 'Nuevo')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"><span class="kpi-mail-new">{{ trans("myrobock/messenger/index.category.".$content->messageStatusUser->name) }}</span></td>
                @endif

                <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">{{ trans("myrobock/messenger/index.category.".$content->messageHeader->messageCategory->name) }}</td>

                <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">{{ $content->messageHeader->subject }}</td>
                

                @if ($content->id_message_status_user == 1)
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"><span class="kpi-mail-wait">En espera</span></td>
                @elseif ($content->id_message_status_user == 2)
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">{{ $content->userReceiver->first_name }} {{ $content->userReceiver->last_name }}</td>
                @elseif ($content->id_message_status_user == 3)
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">{{ $content->userReceiver->first_name }} {{ $content->userReceiver->last_name }}</td>
                @elseif ($content->id_message_status_user == 4 )
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">{{ $content->userRemitter->first_name }} {{ $content->userRemitter->last_name }}</td>
                @elseif ($content->id_message_status_user == 5)
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')"></td>
                @endif
                @if (App::getLocale() == 'es')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">
                        @if ($content->updated_at->format('d/m/Y') == $now)
                            {{ $content->updated_at->format('H:i') }}
                        @else
                            {{ $content->updated_at->format('d F Y') }}
                        @endif
                    </td>    
                @elseif(App::getLocale() == 'en')
                    <td style="cursor:pointer;" onclick="showMail('{{ route('messenger.show', $content->id) }}')">
                        @if ($content->updated_at->format('d/m/Y') == $now)
                            {{ $content->updated_at->format('H:i') }}
                        @else
                            {{ $content->updated_at->format('F d Y') }}
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $message->links() }}
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm justify-content-end">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
@endif

@section('scripts')
    <script>
        function showMail(messengerRoute){
            $(location).attr('href', messengerRoute);
        }

        $("#selectall").on("click", function() {  
            $(".case").prop("checked", this.checked);  
        });  

        // if all checkbox are selected, check the selectall checkbox and viceversa  
        $(".case").on("click", function() {  
        if ($(".case").length == $(".case:checked").length) {  
            $("#selectall").prop("checked", true);  
        } else {  
            $("#selectall").prop("checked", false);  
        }  
        });
    </script>
@endsection