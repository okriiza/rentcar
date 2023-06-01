<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('themes/assets/compiled/svg/logo.svg') }}" alt="Logo"
                            srcset="" /></a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ request()->routeIs('component*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('component*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('component.accordion') ? 'active' : '' }}">
                            <a href="{{ route('component.accordion') }}" class="submenu-link">Accordion</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.alert') ? 'active' : '' }}">
                            <a href="{{ route('component.alert') }}" class="submenu-link">Alert</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.badge') ? 'active' : '' }}">
                            <a href="{{ route('component.badge') }}" class="submenu-link">Bagde</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.breadcrumb') ? 'active' : '' }}">
                            <a href="{{ route('component.breadcrumb') }}" class="submenu-link">Breadcrumb</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.button') ? 'active' : '' }}">
                            <a href="{{ route('component.button') }}" class="submenu-link">Button</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.card') ? 'active' : '' }}">
                            <a href="{{ route('component.card') }}" class="submenu-link">Card</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.carousel') ? 'active' : '' }}">
                            <a href="{{ route('component.carousel') }}" class="submenu-link">Carousel</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.collapse') ? 'active' : '' }}">
                            <a href="{{ route('component.collapse') }}" class="submenu-link">Collapse</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.dropdown') ? 'active' : '' }}">
                            <a href="{{ route('component.dropdown') }}" class="submenu-link">Dropdown</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.listGroup') ? 'active' : '' }}">
                            <a href="{{ route('component.listGroup') }}" class="submenu-link">List Group</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.modal') ? 'active' : '' }}">
                            <a href="{{ route('component.modal') }}" class="submenu-link">Modal</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.navs') ? 'active' : '' }}">
                            <a href="{{ route('component.navs') }}" class="submenu-link">Navs</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.pagination') ? 'active' : '' }}">
                            <a href="{{ route('component.pagination') }}" class="submenu-link">Pagination</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.progress') ? 'active' : '' }}">
                            <a href="{{ route('component.progress') }}" class="submenu-link">Progress</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.spinner') ? 'active' : '' }}">
                            <a href="{{ route('component.spinner') }}" class="submenu-link">Spinner</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.toasts') ? 'active' : '' }}">
                            <a href="{{ route('component.toasts') }}" class="submenu-link">Toasts</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('component.tooltip') ? 'active' : '' }}">
                            <a href="{{ route('component.tooltip') }}" class="submenu-link">Tooltip</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub {{ request()->routeIs('extra*') ? 'active' : '' }}"">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>Extra Components</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('extra*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('extra.avatar') ? 'active' : '' }}">
                            <a href="{{ route('extra.avatar') }}" class="submenu-link">Avatar</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('extra.divider') ? 'active' : '' }}">
                            <a href="{{ route('extra.divider') }}" class="submenu-link">Divider</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('extra.date-picker') ? 'active' : '' }}">
                            <a href="{{ route('extra.date-picker') }}"" class="submenu-link">Date Picker</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('extra.sweet-alert') ? 'active' : '' }}">
                            <a href="{{ route('extra.sweet-alert') }}"" class="submenu-link">Sweet Alert</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('extra.toastify') ? 'active' : '' }}">
                            <a href="{{ route('extra.toastify') }}"" class="submenu-link">Toastify</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('extra.rating') ? 'active' : '' }}">
                            <a href="{{ route('extra.rating') }}"" class="submenu-link">Rating</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub {{ request()->routeIs('layouts*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('layouts*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('layouts.default') ? 'active' : '' }}">
                            <a href="{{ route('layouts.default') }} " class="submenu-link">Default Layout</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('layouts.vertical') ? 'active' : '' }}">
                            <a href="{{ route('layouts.vertical') }}" class="submenu-link">Vertical Navbar</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-title">Forms &amp; Tables</li>

                <li class="sidebar-item has-sub {{ request()->routeIs('form-elements*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Form Elements</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('form-elements*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('form-elements.input') ? 'active' : '' }}">
                            <a href="{{ route('form-elements.input') }}" class="submenu-link">Input</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('form-elements.select') ? 'active' : '' }}">
                            <a href="{{ route('form-elements.select') }}" class="submenu-link">Select</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('form-elements.radio') ? 'active' : '' }}">
                            <a href="{{ route('form-elements.radio') }}" class="submenu-link">Radio</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('form-elements.checkbox') ? 'active' : '' }}">
                            <a href="{{ route('form-elements.checkbox') }}" class="submenu-link">Checkbox</a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('form-elements.textarea') ? 'active' : '' }}">
                            <a href="{{ route('form-elements.textarea') }}" class="submenu-link">Textarea</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ request()->routeIs('form-layout') ? 'active' : '' }}">
                    <a href="{{ route('form-layout') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Layout</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ request()->routeIs('form-editor*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pen-fill"></i>
                        <span>Form Editor</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('form-editor*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('form-editor.quill') ? 'active' : '' }}">
                            <a href=" {{ route('form-editor.quill') }} " class="submenu-link">Quill</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub {{ request()->routeIs('datatables*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Datatables</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('datatables*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('datatables.datatable') ? 'active' : '' }}">
                            <a href="{{ route('datatables.datatable') }}" class="submenu-link">Datatable</a>
                        </li>

                        <li
                            class="submenu-item {{ request()->routeIs('datatables.datatable-jquery') ? 'active' : '' }}">
                            <a href="{{ route('datatables.datatable-jquery') }}" class="submenu-link">Datatable
                                (jQuery)</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
