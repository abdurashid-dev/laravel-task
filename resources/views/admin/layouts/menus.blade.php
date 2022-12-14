<li class="nav-item">
    <a href="{{route('admin.index')}}" class="nav-link @if (request()->is('admin')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item @if(request()->is('admin/roles*') || request()->is('admin/permissions*') || request()->is('admin/users*')))  menu-open @endif">
    <a href="#"
       class="nav-link @if(request()->is('admin/roles*') || request()->is('admin/permissions*') || request()->is('admin/users*')))  active @endif">
        <i class="nav-icon fas fa-user-lock"></i>
        <p>
            R & P
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.users.index')}}"
               class="nav-link {{(request()->is('admin/user*') ) ? 'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.roles.index')}}"
               class="nav-link {{(request()->is('admin/roles*') ) ? 'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.permissions.index')}}"
               class="nav-link {{request()->is('admin/permissions*') ? 'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permissions</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{route('admin.teachers.index')}}" class="nav-link @if (request()->is('admin/teachers*')) active @endif">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Teachers
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.subjects.index')}}" class="nav-link @if (request()->is('admin/subjects*')) active @endif">
        <i class="nav-icon fas fa-book-reader"></i>
        <p>
            Subjects
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.lessons.index')}}" class="nav-link @if (request()->is('admin/lessons*')) active @endif">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Lessons
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.students.index')}}" class="nav-link @if (request()->is('admin/students*')) active @endif">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
            Students
        </p>
    </a>
</li>
