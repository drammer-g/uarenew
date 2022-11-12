<ul class="menu">
    <li class="menu__item">
        <a href="{{@route('project')}}"
           class="menu__link {{ (request()->routeIs('project')) ? 'active' : ''  }}">{{__('Project')}}
        </a>
    </li>
    <li class="menu__item">
        <a href="{{@route('house')}}"
           class="menu__link {{ (request()->routeIs('house')) ? 'active' : ''  }}">{{__('House')}}
        </a>
    </li>
    <li class="menu__item">
        <a href="{{@route('partners')}}"
           class="menu__link {{ (request()->routeIs('partners')) ? 'active' : ''  }}">{{__('Partners')}}
        </a>
    </li>
    <li class="menu__item">
        <a href="{{@route('contacts')}}"
           class="menu__link {{ (request()->routeIs('contacts')) ? 'active' : ''  }}">{{__('Contacts')}}
        </a>
    </li>
</ul>
