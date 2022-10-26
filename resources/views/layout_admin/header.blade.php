<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>

    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        
   
        <div class=" dashboard-setting user-notification">
            <div class="dropdown mt-20">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    {{-- <i class="icon-copy bi bi-bullseye"></i> --}}
                    <span class="user-name">{{ session('dataUser')->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                @if (session('dataUser')->role != 'superadmin')
                    <a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i> Profile</a>
                @endif
                    
                    <a class="dropdown-item" href="/login"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>

    </div>
</div>
