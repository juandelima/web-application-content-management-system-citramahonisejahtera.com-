
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<div class="sidebar-menu">

    <div class="sidebar-menu-inner">
      
      <header class="logo-env">

        <!-- logo -->
        <div class="logo">
          <a href="index.html">
            <img src="assets/images/logo@2x.png" width="120" alt="" />
          </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse">
          <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
            <i class="entypo-menu"></i>
          </a>
        </div>

                
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
          <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
            <i class="entypo-menu"></i>
          </a>
        </div>

      </header>
      
            <div class="sidebar-user-info">

        <div class="sui-normal">
          <a href="#" class="user-link">
            <img src="assets/images/thumb-1@2x.png" width="55" alt="" class="img-circle" />

            <span>Welcome,</span>
            <strong>Art Ramadani</strong>
          </a>
        </div>

        <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
          <a href="#">
            <i class="entypo-pencil"></i>
            New Page
          </a>

          <a href="mailbox.html">
            <i class="entypo-mail"></i>
            Inbox
          </a>

          <a href="extra-lockscreen.html">
            <i class="entypo-lock"></i>
            Log Off
          </a>

          <span class="close-sui-popup">&times;</span><!-- this is mandatory -->        </div>
      </div>
      
                  
      <ul id="main-menu" class="main-menu">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        <li class="active">
              <a href="dashboard-2.html">
                <i class="entypo-gauge"></i>
                <span class="title">Dashboard</span>
              </a>
        </li>

        <li class="title">
              <a href="{{route('projects')}}">
                <i class="entypo-layout"></i>
                <span class="title">Projects</span>
              </a>
        </li>
        <li class="title">
              <a href="{{route('products')}}">
                <i class="entypo-monitor"></i>
                <span class="title">Products</span>
              </a>
        </li>
        <li class="title">
              <a href="{{route('news')}}">
                <i class="entypo-newspaper"></i>
                <span class="title">News</span>
              </a>
        </li>
        <li class="title">
              <a href="{{route('about')}}">
                <i class="entypo-pencil"></i>
                <span class="title">About Us</span>
              </a>
        </li>
        
        
      </ul>
      
    </div>

  </div>