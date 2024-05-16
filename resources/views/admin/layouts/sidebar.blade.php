<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link"> {{--  --}}
        <img src="{{ asset('public/assets/images/logo.png') }}{{-- {{ asset(Setting::getValue('app_logo')) }} --}}" alt="PR OverTheTop"
            class="brand-image img-circle elevation-3 mr-5" style="opacity: .8">
        <span class="brand-text font-weight-light">PR</span>
    </a>

    <!-- Sidebar -->
    <div style="font-size: 18px" class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-compact"
                data-widget="treeview" role="menu" data-accordion="false">

                {{-- start navbar for super admin --}}
                @if (auth()->user()->role == 'super-admin')
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li style="font-size: 20px" class="nav-header ml-2 text-danger">ACCESS</li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active':'' }}">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('role.index') }}" class="nav-link {{ request()->routeIs('role.index') ? 'active':'' }}">
                            <i class="fas fa-user-cog nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('permission.index') }}" class="nav-link {{ request()->routeIs('permission.index') ? 'active':'' }}">
                            <i class="fas fa-unlock nav-icon"></i>
                            <p>Permission</p>
                        </a>
                    </li>

                <hr>


                <li style="font-size: 18px" class="nav-header ml-2 text-danger">Publishers MarketPlace </li>
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link">
                        <svg class="svg-inline--fa fa-arrow-right fa-w-14" style="color: yellow;width: 30ps;height: 22px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg>
                        <p>
                             All Publishers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('all_publishers') }}" class="nav-link">
                                <input type="hidden" name="project_id" value="">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Publishers Sites</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_publishers') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Publisher Site</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <hr>


                <li style="font-size: 18px" class="nav-header ml-2 text-danger">Client Orders </li>
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link">
                        <svg class="svg-inline--fa fa-arrow-right fa-w-14" style="color: yellow;width: 30ps;height: 22px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                        </svg>
                        <p>
                             Tasks <span style="font-size: 18px" class="badge badge-primary mx-2">
                                {{ \App\Models\Task::where('status', \App\Models\Task::NOT_STARDET)->count() ?? 0 }}
                            </span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('client_orders') }}" class="nav-link">
                                <input type="hidden" name="project_id" value="">
                                <i class="fa fa-list nav-icon"></i>
                                <p>All Tasks</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('all_new_tasks') }}" class="nav-link">
                                <input type="hidden" name="project_id" value="">
                                <i style="color: rgb(211, 211, 12)" class="fas fa-tasks nav-icon"></i>
                                <p style="color: rgb(211, 211, 12)">New Tasks</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <hr>

                    <li style="font-size: 18px" class="nav-header ml-2 text-danger">Clients Tasks By Projects</li>
                    <li class="nav-item">

                        <a href="{{ route('user_projects') }}" class="nav-link {{ request()->routeIs('user_projects') ? 'active':'' }}">
                            {{-- <i class="fas fa-folder nav-icon"></i> --}}
                            <svg class="svg-inline--fa fa-arrow-right fa-w-14" style="color: yellow;width: 30ps;height: 22px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                            </svg>
                            <p>Client & Projects</p>
                        </a>
                    </li>

                    <hr>

                    <li style="font-size: 18px" class="nav-header ml-2 text-danger">Pr Contacts</li>
                    <li class="nav-item">

                        <a href="{{ route('contacts') }}" class="nav-link {{ request()->routeIs('contacts.index') ? 'active':'' }}">
                            <svg class="svg-inline--fa fa-arrow-right fa-w-14" style="color: yellow;width: 30ps;height: 22px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                            </svg> <i class="fas fa-users nav-icon"></i>
                            <p>Contacts</p>
                        </a>
                    </li>
                    @endif

                    {{-- end navbar for super admin --}}


           @if(auth()->user()->role == 'client')
                {{-- start projects  --}}
                <li class="nav-item my-3">
                    <a href="{{ route('projects.index') }}"
                        style="{{ request()->routeIs('projects.index') ? 'color:#27bcfd ' : '' }}"
                        class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}">
                        <i class="fa fa-folder mr-2"></i> All My Projects
                    </a>
                </li>

                @foreach ($projects as $project)

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg class="svg-inline--fa fa-arrow-right fa-w-14" style="color: yellow;width: 30ps;height: 22px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg>
                            <p>
                                {{$project->project_name}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{route('site_index',['project_id'=>$project->id])}}" class="nav-link">
                                    <input type="hidden" name="project_id" value="{{$project->id}}">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>All Publishers Sites</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('favorite_publishers', ['project_id' => $project->id  ] ) }}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Favourite Publishers</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <svg style="width: 20px;" class="svg-inline--fa fa-clock fa-w-16 nav-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path>
                                    </svg>
                                    <p>Same Day Delivery</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i style="width: 20px;" class="fa fa-ban  nav-icon"></i>
                                    <p>Blacklist</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('not_started' , ['project_id' => $project->id  ]) }}" class="nav-link">
                                    <i class="fa fa-store nav-icon"></i>
                                    <p>My Orders</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                @endforeach
                {{-- end projects  --}}

                {{-- Invoices --}}
                <li class="nav-item my-2 mr-4">
                    <a href="{{ route('client_invoices') }}"
                        style=""
                        class="nav-link">
                        <svg  style="color:yellow;width: 20px;" class="svg-inline--fa fa-file-invoice-dollar mr-1    fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07z"></path>
                        </svg> Invoices
                    </a>
                </li>
               {{--  @if (auth()->user()->super())

                <li class="nav-item my-2 mr-4">
                    <a href="{{ route('client_invoices') }}"
                        style=""
                        class="nav-link">
                        <svg  style="color:yellow;width: 20px;" class="svg-inline--fa fa-file-invoice-dollar mr-1    fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07z"></path>
                        </svg> Invoices
                    </a>
                </li>

                @else

                @if ( !empty($transactions) ?? !$transactions->count() == 0 )
                    <li class="nav-item my-2 mr-4">
                        <a href="{{ route('client_invoices') }}"
                            style=""
                            class="nav-link">
                            <svg  style="color:yellow;width: 20px;" class="svg-inline--fa fa-file-invoice-dollar mr-1    fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07z"></path>
                            </svg> Invoices
                        </a>
                    </li>
                @endif


                @endif --}}
                {{-- Invoices --}}


            </ul>
            {{-- start pagination --}}
            {{-- <div style="position: fixed;bottom: 0;width: auto;left:2%;"  class="d-flex justify-content-center my-5">
                {{ $projects->links() }}
            </div> --}}
            @endif

            {{-- end pagination --}}
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
