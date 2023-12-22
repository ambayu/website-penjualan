 <footer>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                  <div class=" col-md-12">
                    <h2>Request  A<strong class="white"> Call  Back</strong></h2>
                  </div>
                      @if (session()->has('success'))
                <div class="alert alert-warning" role="alert">
            {{ session('success') }}
                </div>
                    
                @endif
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      
                        <form action="request" method="post" class="main_form">
                            @csrf
                            <div class="row">
                             
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                     @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                    <input class="form-control" placeholder="Name" type="text"  name="name"  @error('name')
                                is_invalid
                            @enderror>
                            
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                       @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                    <input class="form-control" placeholder="Email" type="text" name="email" @error('email')
                                is_invalid
                            @enderror>
                         
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                      @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                    <input class="form-control" placeholder="Phone" type="text" name="phone"@error('phone')
                                is_invalid
                            @enderror>
                          
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                      @error('message')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                                    <textarea class="textarea" placeholder="Message" type="text" name="message"@error('message')
                                is_invalid
                            @enderror></textarea>
                          
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="send">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="img-box">
                            <figure><img src="/images/img.jpg" alt="img" /></figure>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer_logo">
                          <a href="/"><img src="/images/logo1.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="lik">
                            <li class="{{ ($title === "Home") ? 'active' : '' }}"> <a href="/">Home</a></li>
                            <li class="{{ ($title === "About") ? 'active' : '' }}"> <a href="/about">About</a></li>
                            <li class="{{ ($title === "Recipe") ? 'active' : '' }}"> <a href="/recipe">Menu</a></li>
                            <li class="{{ ($title === "Blog") ? 'active' : '' }}"> <a href="/blog">Blog</a></li>
                            <li class="{{ ($title === "Contact") ? 'active' : '' }}"> <a href="/contact">Contact us</a></li>
                        </ul>
                    </div>
                   
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>© 2022 All Rights Reserved. pateenXfatboyfactory</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->