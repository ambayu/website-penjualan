   <div class="sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">
                
                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>
                
                <ul class="list-unstyled components">
                    @auth

                    @if(auth()->user()->level_id == 1)
                    <li class="{{ ($title === "Home") ? 'active' : '' }}">
                        <a href="/">Home</a>
                    </li>
                    <li class="{{ ($title === "Dashboard") ? 'active' : '' }}">
                        <a href="/dashboard">Dashboard</a>
                    </li>

                     <li class="{{ ($title === "Kasir") ? 'active' : '' }}">
                        <a href="/kasir">Kasir</a>
                    </li>
                    <li class="{{ ($title === "Receipt Management") ? 'active' : '' }}">
                        <a href="/receipt">Receipt Management</a>
                    </li>
                    
                    {{-- <li class="{{ ($title === "Waiting List") ? 'active' : '' }}">
                        <a href="/waiting_list">Waiting List</a>
                    </li>
                    
                    <li class="{{ ($title === "Cheff") ? 'active' : '' }}">
                        <a href="/cheff">Cheff</a>
                    </li> --}}

                     <li class="{{ ($title === "Add Menu") ? 'active' : '' }}">
                        <a href="/add_menu">Add Menu</a>
                    </li>
                    
                    <li class="{{ ($title === "Add Category") ? 'active' : '' }}">
                        <a href="/add_category">Add Category</a>
                    </li>
                    <li class="{{ ($title === "Account Management") ? 'active' : '' }}">
                       <a href="/account">Account Management</a>
                   </li>
                    <li class="{{ ($title === "Laporan") ? 'active' : '' }}">
                       <a href="/laporan">Laporan</a>
                   </li>
                    <li class="{{ ($title === "Setting Tampilan") ? 'active' : '' }}">
                       <a href="/tampilan">Setting Tampilan</a>
                   </li>
                    @elseif(auth()->user()->level_id == 2)
                    <li class="{{ ($title === "Home") ? 'active' : '' }}">
                        <a href="/">Home</a>
                    </li>
                    <li class="{{ ($title === "Dashboard") ? 'active' : '' }}">
                        <a href="/dashboard">Dashboard</a>
                    </li>

                    
                    {{--                  
                    <li class="{{ ($title === "Waiting List") ? 'active' : '' }}">
                        <a href="/waiting_list">Waiting List</a>
                    </li>

                     <li class="{{ ($title === "Cheff") ? 'active' : '' }}">
                        <a href="/cheff">Cheff</a>
                    </li> --}}

                     
                    @endif
                    
                    @else
                    <li class="{{ ($title === "Home") ? 'active' : '' }}">
                        <a href="/">Home</a>
                    </li>
                    <li class="{{ ($title === "About") ? 'active' : '' }}">
                        <a href="/about">About</a>
                    </li>
                    <li class="{{ ($title === "Recipe") ? 'active' : '' }}">
                        <a href="/recipe">Menu</a>
                    </li>
                    <li class="{{ ($title === "Blog") ? 'active' : '' }}">
                        <a href="/blog">Blog</a>
                    </li>
                    <li class="{{ ($title === "Contact") ? 'active' : '' }}">
                        <a href="/contact">Contact Us</a>
                    </li>

                   @endauth
                </ul>
                
            </nav>
        </div>