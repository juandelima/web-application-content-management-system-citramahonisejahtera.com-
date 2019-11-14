<header>
    <nav class="navi" id="nav">
      <input type="checkbox" id="nav" class="hidden">
      <label for="nav" class="nav-btn">
        <i></i>
        <i></i>
        <i></i>
        <a href=""></a>
      </label>
      <div class="logo">
        <a href="{{route('index')}}" class="img-logo" ><span style = "font-family: Cinzel, serif;" class="logo-text"
        >Citra Mahoni Sejahtera</span></a>
      </div>
      <div class="display_none nav-wrapper">
        <ul>
          <li><a href="{{route('index')}}">Home</a></li>
          <li><a href="{{route('project')}}">Projects</a></li>
          <li><a href="{{route('products')}}">Products</a></li>
          <li><a href="{{route('news')}}">News</a></li>
          <li><a href="{{route('about')}}">About Us</a></li>
        </ul>
      </div>
    </nav>
</header>