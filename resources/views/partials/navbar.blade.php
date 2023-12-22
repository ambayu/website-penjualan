<header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" href="/"><img src="/images/logo.png" alt="#" /></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">
                            <ul>

                            @auth
                            <li class="dinone"><a href="#">{{ auth()->user()->email }}</a></li>
                            <li class="button_user">
                                <form name="formName" action="/logout" method="post">
                                    @csrf
                                    <a type="submit" class="button active" onclick="document.formName.submit();" >Logout</a>
                                </form>
                            
                            </li>
                               @else

                               
                               <li class="dinone">Contact Us:
                                   <img style="margin-right: 15px;margin-left: 15px;" src="/images/phone_icon.png" alt="#">
                                   @if(isset($about) && isset($about->contact))
                                       <a href="#">{{ $about->contact }}</a>
                                   @else
                                       <!-- Provide a default message or handle the absence of $about->contact -->
                                       <span>Contact information unavailable</span>
                                   @endif
                               </li>
                               <li class="dinone">
                                <img style="margin-right: 15px;" src="/images/mail_icon.png" alt="#">
                                @if(isset($about) && isset($about->email))
                                    <a href="#">{{ $about->email }}</a>
                                @else
                                    <!-- Provide a default message or handle the absence of $about->email -->
                                    <span>Email information unavailable</span>
                                @endif
                            </li>
                            <li class="dinone">
                                <img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="/images/location_icon.png" alt="#">
                                @if(isset($about) && isset($about->alamat))
                                    <a href="#">{{ $about->alamat }}</a>
                                @else
                                    <!-- Provide a default message or handle the absence of $about->alamat -->
                                    <span>Address information unavailable</span>
                                @endif
                            </li>
                                                            <li class="button_user"><a class="button active" href="/login">Login</a><a class="button" href="/register">Register</a></li>
                                @endauth
                               
                            
                                 
                                <li><img style="margin-right: 15px;" src="/images/search_icon.png" alt="#"></li>
                                <li>
                                    <button type="button" id="sidebarCollapse">
                                        <img src="/images/menu_icon.png" alt="#">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>