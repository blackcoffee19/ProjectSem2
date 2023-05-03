@if (Auth::check())
    @if (Auth::user()->admin != '0')
    <div class="position-fixed dropstart position-relative d-none d-sm-block"  style="right: 50px;bottom: 20px;">
        <a class="dropdown-toggle list_mess rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false" style="width:60px;height: 60px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>
        </a>
        <div class="dropdown-menu pt-0" style="background-color:  transparent">
            <div class="btn-group" style="background: transparent">
                @if (isset($groups))
                @foreach ($groups as $group)
                <a class="ms-3 show_chat" data-groupcode="{{$group->code_group}}" data-iduser="" style="width:60px;height: 60px;">
                    @if ($group->User->avatar)
                    <img src="{{asset('images/avatar/'.$group->User->avatar)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @else
                    <img src="{{asset('images/avatar/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @endif
                </a>
                @endforeach
                @endif
                @foreach ($user_message as $user)
                <a class="ms-3 show_chat" data-groupcode="" data-iduser="{{$user->id_user}}" style="width:60px;height: 60px;">
                    @if ($user->image)
                    <img src="{{asset('images/avatar/'.$user->avatar)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @else
                    <img src="{{asset('images/avatar/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        <div class="position-absolute d-none" id="chatbox"  style="height: 400px; width: 300px; bottom:80px;right:60px;">
            <div class="card w-100 h-100 overflow-y-scroll overflow-x-hidden" >
                <div class="card-header row" >
                    <h4 class="col-11" id="usr_contact">User</h4>
                    <button type="button" class="btn-close col-1"  aria-label="Close" id="btn_close"></button>
                </div>
                <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new" data-iduser="{{Auth::user()->id_user}}">
                </div>
                <div class="card-footer p-2 w-100 input_message " >
                    <div class="input-group">
                        <input type="text" class="form-control " style="border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                        <button class="btn border button-submit" type="button" tabindex="1" style="color: #1c71d8;" >
                            <i class="bi bi-send" style="font-size: 1.3rem"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="position-fixed  dropstart position-relative d-none d-sm-block"  style="right: 50px;bottom: 20px;">
        <a class="dropdown-toggle list_mess rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false" style="bottom: 30px;" data-bs-offset="0,0"  style="width:60px;height: 60px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>
        </a>
        <div class=" dropdown-menu pt-0"  style="background: transparent">
          <div class="btn-group" style="background: transparent; height: 60px;">
            @foreach ($groups as $group)
            <a class="me-3 show_chat" data-groupcode="{{$group->code_group}}" data-iduser="" style="width:40px;height: 40px;">
                @if ($group->Admin->avatar)
                <img src="{{asset('images/avatar/'.$group->Admin->avatar)}}" alt="" class="img-thumbnail rounded-circle" style="width:40px;height: 40px;object-fit: cover">
                @else
                <img src="{{asset('images/avatar/admin.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:40px;height: 40px;object-fit: cover">
                @endif
            </a>
            @endforeach
            <a class="me-3 show_chat" data-groupcode="new" data-iduser="{{Auth::user()->id_user}}" style="width:40px;height: 40px; padding: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>
            </a>
          </div>
        </div>
        <div class="position-absolute d-none" id="chatbox"  style="height: 400px; width: 300px; bottom:80px;right:60px;">
            <div class="card w-100 h-100 overflow-y-scroll overflow-x-hidden" >
                <div class="card-header row" >
                    <h4 class="col-11">Admin <span id="usr_contact"></span></h4>
                    <button type="button" class="btn-close col-1"  aria-label="Close" id="btn_close"></button>
                </div>
                <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new" data-iduser="{{Auth::user()->id_user}}" >
                </div>
                <div class="card-footer p-2 w-100 input_message ">
                    <div class="input-group">
                        <input type="text" class="form-control " style=" border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                        <button class="btn border button-submit" type="button" style="color: #1c71d8;" tabindex="1">
                            <i class="bi bi-send" style="font-size: 1.3rem"></i>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@else
    <div class="position-fixed  bottom-0 end-0 p-3 d-none d-sm-block"style="right: 50px;bottom: 20px;" >
            <a href="#!" class="btn shadow rounded-circle" data-bs-toggle="modal" data-bs-target="#userModal" style="width:60px;height: 60px;" >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>
            </a>
    </div>
@endif
