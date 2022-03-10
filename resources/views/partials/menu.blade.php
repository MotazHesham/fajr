<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('project_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-project-diagram c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.project.title') }}
                </a>
            </li>
        @endcan
        @can('news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.news.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newss") || request()->is("admin/newss/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.news.title') }}
                </a>
            </li>
        @endcan
        @can('slider_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-images c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.slider.title') }}
                </a>
            </li>
        @endcan
        @can('success_partner_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.success-partners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/success-partners") || request()->is("admin/success-partners/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.successPartner.title') }}
                </a>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @can('fajr_detail_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/policies*") ? "c-show" : "" }} {{ request()->is("admin/managements*") ? "c-show" : "" }} {{ request()->is("admin/sections*") ? "c-show" : "" }} {{ request()->is("admin/descriptions*") ? "c-show" : "" }} {{ request()->is("admin/services*") ? "c-show" : "" }} {{ request()->is("admin/said-aboutuses*") ? "c-show" : "" }} {{ request()->is("admin/fa-qs*") ? "c-show" : "" }} {{ request()->is("admin/certificates*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.fajrDetail.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('policy_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.policies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/policies") || request()->is("admin/policies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.policy.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.management.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/managements") || request()->is("admin/managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.management.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-id-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.section.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('description_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.descriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/descriptions") || request()->is("admin/descriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tasks c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.description.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.service.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('said_about_us_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.said-aboutuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/said-aboutuses") || request()->is("admin/said-aboutuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-headphones c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.saidAboutUs.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('fa_q_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.fa-qs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fa-qs") || request()->is("admin/fa-qs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faQ.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('certificate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.certificates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/certificates") || request()->is("admin/certificates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.certificate.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('crew_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/crew-types*") ? "c-show" : "" }} {{ request()->is("admin/fajr-crews*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.crew.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crew_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crew-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crew-types") || request()->is("admin/crew-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-grip-vertical c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crewType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('fajr_crew_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.fajr-crews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fajr-crews") || request()->is("admin/fajr-crews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.fajrCrew.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('the_request_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/jobresquests*") ? "c-show" : "" }} {{ request()->is("admin/quotation-requests*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-file-upload c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.theRequest.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('jobresquest_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jobresquests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobresquests") || request()->is("admin/jobresquests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-tag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jobresquest.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('quotation_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.quotation-requests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/quotation-requests") || request()->is("admin/quotation-requests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-check-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.quotationRequest.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('contactu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/subscriptions*") ? "c-show" : "" }} {{ request()->is("admin/contacts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contactu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('subscription_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subscriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subscription.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-phone-volume c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contact.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>