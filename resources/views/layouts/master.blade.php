<!doctype html>
<html lang="en">
  @include('layouts.head')
  <body>
    @include('layouts.menu_bar')
    <main role="main">
      @yield('content')
      </main>

      @include('layouts.footer')
     @include('layouts.script')
    </body>
  </html>