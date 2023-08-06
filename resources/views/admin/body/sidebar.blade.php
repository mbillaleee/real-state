<nav class="sidebar">
        <div class="sidebar-header">
          <a href="#" class="sidebar-brand">
            Secreet<span>Seven</span>
          </a>
          <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="sidebar-body">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">RealEstate</li>
            @if(Auth::user()->can('Agent.Menu'))
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Property Type</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                  @if(Auth::user()->can('Agent.All'))
                  <li class="nav-item">
                    <a href="{{ route('all.type')}}" class="nav-link">All Type</a>
                  </li>
                  @endif
                  @if(Auth::user()->can('Agent.Add'))
                  <li class="nav-item">
                    <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
                  </li>
                  @endif
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Amenitie</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="amenitie">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="{{ route('all.amenitie')}}" class="nav-link">All Amenitie</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add.amenitie')}}" class="nav-link">Add Amenitie</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="pages/apps/calendar.html" class="nav-link">
                <i class="link-icon" data-feather="calendar"></i>
                <span class="link-title">Calendar</span>
              </a>
            </li>
            <li class="nav-item nav-category">Components</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">UI Kit</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="uiComponents">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon" data-feather="anchor"></i>
                <span class="link-title">Advanced UI</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">Role & Permission</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#role" role="button" aria-expanded="false" aria-controls="uiComponents">
                <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">Role & Permission</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="role">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('all.role')}}" class="nav-link">All Roles</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add.roles.permission')}}" class="nav-link">Roles In Permission</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('all.roles.permission')}}" class="nav-link">All Roles In Permission</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">Manage Admin</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
                <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">Manage Admin</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="admin">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add.admin')}}" class="nav-link">Add Admin</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon" data-feather="anchor"></i>
                <span class="link-title">Advanced UI</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
              <a href="#" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Documentation</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>