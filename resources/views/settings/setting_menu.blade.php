<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="{{ route('settings.show', ['group' => 'general']) }}"
                           class="nav-link {{ $groupName == 'general'? 'active' : ''}}">
                            {{ __('messages.general') }}
                        </a>
                        <a href="{{ route('settings.show', ['group' => 'company_information']) }}"
                           class="nav-link mobile-text-nowrap tabText {{ $groupName == 'company_information'? 'active' : ''}}">
                            {{ __('messages.company_information') }}
                        </a>
                        <a href="{{ route('settings.show', ['group' => 'note']) }}"
                           class="nav-link tabText {{ $groupName == 'note' ? 'active' : ''}}">
                            {{ __('messages.notes') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <form   id="settingUpdate" action="{{ route('settings.update')}}"  enctype="multipart/form-data"  method="POST">
       {{ csrf_field() }}
        @include("settings.$groupName")


        </form>
    </div>
</div>


