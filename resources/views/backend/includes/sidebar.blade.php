<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>
            <li class="nav-title">
                Record
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/record/branch'))
                }}" href="{{ route('admin.record.branch.index') }}">
                    <i class="nav-icon fas fa-code-branch"></i>
                    Branch
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/record/room'))
                }}" href="{{ route('admin.record.room.index') }}">
                    <i class="nav-icon fas fa-house-damage"></i>
                    Rooms
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/record/service'))
                }}" href="{{ route('admin.record.service.index') }}">
                    <i class="nav-icon fas fa-poll-h"></i>
                    Service
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/record/symptom'))
                }}" href="{{ route('admin.record.symptom.index') }}">
                    <i class="nav-icon fas fa-stethoscope"></i>
                    Symptom
                </a>
            </li>

            <li class="nav-title">
                Inventory
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/production/category'))
                }}" href="{{ route('admin.production.category.index') }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    Category
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/production/product'))
                }}" href="{{ route('admin.production.product.index') }}">
                    <i class="nav-icon fas fa-capsules"></i>
                    Product
                </a>
            </li>
            <li class="nav-title">
                Transaction
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/transaction/transaction'))
                }}" href="{{ route('admin.transaction.transaction.index') }}">
                    <i class="nav-icon fas fa-history"></i>
                    Transactions
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/transaction/reservation'))
                }}" href="{{ route('admin.transaction.reservation.index') }}">
                    <i class="nav-icon fas fa-book"></i>
                    Reservation
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/transaction/order'))
                }}" href="{{ route('admin.transaction.order.index') }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    Orders
                </a>
            </li> --}}


            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Active::checkUriPattern('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
