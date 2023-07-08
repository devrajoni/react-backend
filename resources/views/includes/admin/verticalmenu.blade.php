<!--aside open-->
<aside class="app-sidebar">
<!-- <div class="app-sidebar__logo">
    <a class="header-brand" href="" style="color: white;">
    </a>
</div> -->
<div class="app-sidebar3">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{asset('uploads/profile/user-profile.png')}}" class="avatar-xxl rounded-circle mb-1" alt="default">
            </div>
            <div class="user-info">
                <h5 class=" mb-2">{{auth()->user()->name}}</h5>
                <!-- <div class="allprofilerating pt-1" data-rating="5"></div> -->
            </div>
        </div>
    </div>
    <ul class="side-menu custom-ul">

        <li class="slide">
            <a class="side-menu__item"  href="{{url('admin/')}}">
                <svg  class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>
<!--         <li class="slide">
            <a class="side-menu__item"  href="{{url('/admin/profile')}}">
                <svg  class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg>
                <span class="side-menu__label">Profile</span>
            </a>
        </li> -->
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 19.0002V5.70058C3 5.28007 3.26307 4.90449 3.65826 4.76079L13.3291 1.24411C13.5886 1.14974 13.8755 1.28361 13.9699 1.54313C13.9898 1.5979 14 1.65573 14 1.714V6.66682L20.3162 8.77223C20.7246 8.90834 21 9.29048 21 9.72091V19.0002H23V21.0002H1V19.0002H3ZM5 19.0002H12V3.85555L5 6.40101V19.0002ZM19 19.0002V10.4417L14 8.77501V19.0002H19Z" /></svg>
                <span class="side-menu__label mr-2">Banner</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/home-banner')}}" class="slide-item">Home</a></li>
                <li><a href="{{url('admin/service-banner')}}" class="slide-item">Service</a></li>
                <li><a href="{{url('admin/single-service-banner')}}" class="slide-item">Single Service</a></li>
                <li><a href="{{url('admin/work-banner')}}" class="slide-item">Work</a></li>
                <li><a href="{{url('admin/about-banner')}}" class="slide-item">About</a></li>
                <li><a href="{{url('admin/blog-banner')}}" class="slide-item">Blog</a></li>
                <li><a href="{{url('admin/single-blog')}}" class="slide-item">Single Blog</a></li>
                <li><a href="{{url('admin/contact-banner')}}" class="slide-item">Contact</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.0833 10.4998L21.2854 11.2211C21.5221 11.3632 21.5989 11.6703 21.4569 11.9071C21.4146 11.9774 21.3557 12.0363 21.2854 12.0786L11.9999 17.6498L2.71451 12.0786C2.47772 11.9365 2.40093 11.6294 2.54301 11.3926C2.58523 11.3222 2.64413 11.2633 2.71451 11.2211L3.9166 10.4998L11.9999 15.3498L20.0833 10.4998ZM20.0833 15.1998L21.2854 15.9211C21.5221 16.0632 21.5989 16.3703 21.4569 16.6071C21.4146 16.6774 21.3557 16.7363 21.2854 16.7786L12.5144 22.0411C12.1977 22.2311 11.8021 22.2311 11.4854 22.0411L2.71451 16.7786C2.47772 16.6365 2.40093 16.3294 2.54301 16.0926C2.58523 16.0222 2.64413 15.9633 2.71451 15.9211L3.9166 15.1998L11.9999 20.0498L20.0833 15.1998ZM12.5144 1.30852L21.2854 6.57108C21.5221 6.71315 21.5989 7.02028 21.4569 7.25707C21.4146 7.32745 21.3557 7.38635 21.2854 7.42857L11.9999 12.9998L2.71451 7.42857C2.47772 7.2865 2.40093 6.97937 2.54301 6.74258C2.58523 6.6722 2.64413 6.6133 2.71451 6.57108L11.4854 1.30852C11.8021 1.11851 12.1977 1.11851 12.5144 1.30852Z"></path></svg>
                <span class="side-menu__label">Service</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/service-work')}}" class="slide-item">Service Work</a></li>
                <li><a href="{{url('admin/service/create')}}" class="slide-item">Create Service</a></li>
                <li><a href="{{url('admin/service')}}" class="slide-item">All Service</a></li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M2.00488 9.5V4C2.00488 3.44772 2.4526 3 3.00488 3H21.0049C21.5572 3 22.0049 3.44772 22.0049 4V9.5C20.6242 9.5 19.5049 10.6193 19.5049 12C19.5049 13.3807 20.6242 14.5 22.0049 14.5V20C22.0049 20.5523 21.5572 21 21.0049 21H3.00488C2.4526 21 2.00488 20.5523 2.00488 20V14.5C3.38559 14.5 4.50488 13.3807 4.50488 12C4.50488 10.6193 3.38559 9.5 2.00488 9.5ZM4.00488 7.96776C5.4866 8.70411 6.50488 10.2331 6.50488 12C6.50488 13.7669 5.4866 15.2959 4.00488 16.0322V19H20.0049V16.0322C18.5232 15.2959 17.5049 13.7669 17.5049 12C17.5049 10.2331 18.5232 8.70411 20.0049 7.96776V5H4.00488V7.96776ZM9.00488 9H15.0049V11H9.00488V9ZM9.00488 13H15.0049V15H9.00488V13Z"></path></svg>
                        <span class="side-menu__label">Skill</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/service-skill/create')}}" class="slide-item">Create Skill</a></li>
                        <li><a href="{{url('admin/service-skill')}}" class="slide-item">All Skill</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21.5 9C21.5 11.7039 19.849 14.0223 17.5 15.0018L17.5 15C17.5 10.3056 13.6944 6.5 9.00001 6.5L8.99817 6.5C9.97773 4.15105 12.2961 2.5 15 2.5C18.5899 2.5 21.5 5.41015 21.5 9ZM7 3C4.79086 3 3 4.79086 3 7V8.5H5V7C5 5.89543 5.89543 5 7 5H8.5V3H7ZM19 15.5V17C19 18.1046 18.1046 19 17 19H15.5V21H17C19.2091 21 21 19.2091 21 17V15.5H19ZM9 21.5C12.5899 21.5 15.5 18.5899 15.5 15C15.5 11.4101 12.5899 8.5 9 8.5C5.41015 8.5 2.5 11.4101 2.5 15C2.5 18.5899 5.41015 21.5 9 21.5ZM9 12.5L11.5 15L9 17.5L6.5 15L9 12.5Z"></path></svg>
                        <span class="side-menu__label">Feature</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/feature/create')}}" class="slide-item">Create Feature</a></li>
                        <li><a href="{{url('admin/feature')}}" class="slide-item">All Feature</a></li>
                    </ul>
                </li>
<!--                 <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                        <span class="side-menu__label">Similar Project</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/similar-project/create')}}" class="slide-item">Create Project</a></li>
                        <li><a href="{{url('admin/similar-project')}}" class="slide-item">All Project</a></li>
                    </ul>
                </li> -->
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M19.3788 15.1057C20.9258 11.442 19.5373 7.11425 16.0042 5.07444C13.4511 3.6004 10.4232 3.69359 8.03452 5.05554L7.04216 3.31873C10.028 1.61633 13.8128 1.49984 17.0042 3.34239C21.4949 5.93507 23.2139 11.4848 21.1217 16.1119L22.4635 16.8866L18.2984 19.1007L18.1334 14.3866L19.3788 15.1057ZM4.62961 8.89962C3.08263 12.5633 4.47116 16.891 8.00421 18.9308C10.5573 20.4049 13.5851 20.3117 15.9737 18.9499L16.9661 20.6866C13.9803 22.389 10.1956 22.5054 7.00421 20.6629C2.51357 18.0702 0.794565 12.5205 2.88672 7.89336L1.54492 7.11867L5.70999 4.90457L5.87505 9.61867L4.62961 8.89962ZM13.0042 13.5382H16.0042V15.5382H13.0042V17.5382H11.0042V15.5382H8.00421V13.5382H11.0042V12.5382H8.00421V10.5382H10.59L8.46868 8.41686L9.88289 7.00265L12.0042 9.12397L14.1255 7.00265L15.5397 8.41686L13.4184 10.5382H16.0042V12.5382H13.0042V13.5382Z"></path></svg>
                <span class="side-menu__label">Work</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/work-gallery')}}" class="slide-item">Gallery</a></li>
                <li><a href="{{url('admin/work/create')}}" class="slide-item">Craete Work</a></li>
                <li><a href="{{url('admin/work')}}" class="slide-item">All Work</a></li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                        <span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/work-category/create')}}" class="slide-item">Create Category</a></li>
                        <li><a href="{{url('admin/work-category')}}" class="slide-item">All Category</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M9 18H4V10H9V18ZM15 18H10V6H15V18ZM21 18H16V2H21V18ZM22 22H3V20H22V22Z"></path></svg>
                <span class="side-menu__label">About</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/about-gallery')}}" class="slide-item">Gallery</a></li>
                <li><a href="{{url('admin/about/create')}}" class="slide-item">Create About</a></li>
                <li><a href="{{url('admin/about')}}" class="slide-item">All About</a></li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                        <span class="side-menu__label">Skill</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/about-skill/create')}}" class="slide-item">Create Skill</a></li>
                        <li><a href="{{url('admin/about-skill')}}" class="slide-item">All Skill</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                        <span class="side-menu__label">Card</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/about-card/create')}}" class="slide-item">Create Card</a></li>
                        <li><a href="{{url('admin/about-card')}}" class="slide-item">All Card</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                        <span class="side-menu__label">Business</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                        <li><a href="{{url('admin/about-business')}}" class="slide-item">Business</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                        <span class="side-menu__label">Team</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu custom-ul">
                
                    </ul>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                 <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M8 21V11H22V20C22 20.5523 21.5523 21 21 21H8ZM6 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5H21C21.5523 5 22 5.44772 22 6V9H7C6.44772 9 6 9.44772 6 10V21Z"></path></svg>
                <span class="side-menu__label">Blog</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z"/></svg>
                         <span class="side-menu__label">Latest</span><i class="angle fa fa-angle-right"></i>
                    </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/latest/create')}}" class="slide-item">Create Latest</a></li>
                <li><a href="{{url('admin/latest')}}" class="slide-item">All Latest</a></li>
            </ul>
        </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M6.52739 14.5138C6.52739 15.5969 5.64264 16.4816 4.55959 16.4816C3.47654 16.4816 2.5918 15.5969 2.5918 14.5138C2.5918 13.4308 3.47654 12.546 4.55959 12.546H6.52739V14.5138ZM7.51892 14.5138C7.51892 13.4308 8.40366 12.546 9.48671 12.546C10.5698 12.546 11.4545 13.4308 11.4545 14.5138V19.4409C11.4545 20.524 10.5698 21.4087 9.48671 21.4087C8.40366 21.4087 7.51892 20.524 7.51892 19.4409V14.5138ZM9.48671 6.52739C8.40366 6.52739 7.51892 5.64264 7.51892 4.55959C7.51892 3.47654 8.40366 2.5918 9.48671 2.5918C10.5698 2.5918 11.4545 3.47654 11.4545 4.55959V6.52739H9.48671ZM9.48671 7.51892C10.5698 7.51892 11.4545 8.40366 11.4545 9.48671C11.4545 10.5698 10.5698 11.4545 9.48671 11.4545H4.55959C3.47654 11.4545 2.5918 10.5698 2.5918 9.48671C2.5918 8.40366 3.47654 7.51892 4.55959 7.51892H9.48671ZM17.4732 9.48671C17.4732 8.40366 18.3579 7.51892 19.4409 7.51892C20.524 7.51892 21.4087 8.40366 21.4087 9.48671C21.4087 10.5698 20.524 11.4545 19.4409 11.4545H17.4732V9.48671ZM16.4816 9.48671C16.4816 10.5698 15.5969 11.4545 14.5138 11.4545C13.4308 11.4545 12.546 10.5698 12.546 9.48671V4.55959C12.546 3.47654 13.4308 2.5918 14.5138 2.5918C15.5969 2.5918 16.4816 3.47654 16.4816 4.55959V9.48671ZM14.5138 17.4732C15.5969 17.4732 16.4816 18.3579 16.4816 19.4409C16.4816 20.524 15.5969 21.4087 14.5138 21.4087C13.4308 21.4087 12.546 20.524 12.546 19.4409V17.4732H14.5138ZM14.5138 16.4816C13.4308 16.4816 12.546 15.5969 12.546 14.5138C12.546 13.4308 13.4308 12.546 14.5138 12.546H19.4409C20.524 12.546 21.4087 13.4308 21.4087 14.5138C21.4087 15.5969 20.524 16.4816 19.4409 16.4816H14.5138Z"></path></svg>
                <span class="side-menu__label">Testimonial</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/testimonial/create')}}" class="slide-item">Create Testimonial</a></li>
                <li><a href="{{url('admin/testimonial')}}" class="slide-item">All Testimonial</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 22H6C4.34315 22 3 20.6569 3 19V5C3 3.34315 4.34315 2 6 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM19 20V18H6C5.44772 18 5 18.4477 5 19C5 19.5523 5.44772 20 6 20H19ZM5 16.1707C5.31278 16.0602 5.64936 16 6 16H19V4H6C5.44772 4 5 4.44772 5 5V16.1707ZM12 10C10.8954 10 10 9.10457 10 8C10 6.89543 10.8954 6 12 6C13.1046 6 14 6.89543 14 8C14 9.10457 13.1046 10 12 10ZM9 14C9 12.3431 10.3431 11 12 11C13.6569 11 15 12.3431 15 14H9Z"></path></svg>
                <span class="side-menu__label">Contact</span>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('admin/contact-card/create')}}" class="slide-item">Create Contact</a></li>
                <li><a href="{{url('admin/contact-card')}}" class="slide-item">All Contact</a></li>
            </ul>
        </li>
<!--         <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z"/><path d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z"/><path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z"/></g></g></svg>
                <span class="side-menu__label">Manage Roles</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                
                @can('Roles & Permission Access')
                <li><a href="{{url('/admin/role')}}" class="slide-item">Roles & Permissions</a></li>
               
                @endcan
                @can('Roles & Permission Create')
                <li><a href="{{url('/admin/employee/create')}}" class="slide-item">Create Employee</a></li>
                @endcan
                
                <li class=""><a href="{{url('/admin/employee')}}" class="slide-item ">Employees List</a></li>
            </ul>
        </li> -->
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
                <span class="side-menu__label">Notifications</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu custom-ul">
                <li><a href="{{url('/admin/contacts')}}" class="slide-item smark-all" >All Notifications</a></li>
            </ul>
        </li> 
        <li class="slide">
            <a class="side-menu__item"  href="{{url('/profile')}}">
                <svg  class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM6 15V17H18V15H6ZM6 7V13H12V7H6ZM14 7V9H18V7H14ZM14 11V13H18V11H14ZM8 9H10V11H8V9Z"></path></svg>
                <span class="side-menu__label">Profile</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{url('/admin/social')}}">
                <svg  class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 1L21.5 6.5V17.5L12 23L2.5 17.5V6.5L12 1ZM6.49896 9.97089L11 12.5768V17.6252H13V12.5768L17.501 9.9709L16.499 8.24005L12 10.8447L7.50104 8.24004L6.49896 9.97089Z"></path></svg>
                <span class="side-menu__label">Social</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{url('/admin/setting')}}">
                <svg  class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM8.14499 12.071L7.16987 12.634L8.16987 14.366L9.1459 13.8025C9.64746 14.3133 10.2851 14.69 11 14.874V16H13V14.874C13.7149 14.69 14.3525 14.3133 14.8541 13.8025L15.8301 14.366L16.8301 12.634L15.855 12.071C15.9495 11.7301 16 11.371 16 11C16 10.629 15.9495 10.2699 15.855 9.92901L16.8301 9.36602L15.8301 7.63397L14.8541 8.19748C14.3525 7.68674 13.7149 7.31003 13 7.12602V6H11V7.12602C10.2851 7.31003 9.64746 7.68674 9.1459 8.19748L8.16987 7.63397L7.16987 9.36602L8.14499 9.92901C8.0505 10.2699 8 10.629 8 11C8 11.371 8.0505 11.7301 8.14499 12.071ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"></path></svg>
                <span class="side-menu__label">
                Setting</span>
            </a>
        </li>
<!--         <li class="slide">
            <a class="side-menu__item"  href="{{url('/admin/profile')}}">
                <svg  class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="dropdown-item d-flex">
                            <i class="feather feather-power me-3 fs-16 my-auto"></i>
                            <div class="mt-1" >Logout</div>
                        </button>
                    </form>
                </span>
            </a>
        </li> -->
    </ul>
</div>
</aside>
<!--aside closed-->

