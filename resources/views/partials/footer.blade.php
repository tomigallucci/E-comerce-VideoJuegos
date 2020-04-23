<footer  class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row" style="padding-left: 2%">
        <div class="col-12 col-md">
            {{-- image.mb-2[width="24" height="24"] --}}
            <small class="d-block mb-3 text-muted">Copyright &copy 2020. <br><a href="#">Soluciones Informaticas Ros.</a></small>
        </div>  
        <div class="col-6 col-md">
            <h5 class="text-center">Menu</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">{{ __('Home') }}</a></li>
                <li><a class="text-muted" href="#">{{ __('Gaming')}}</a></li>
                <li><a class="text-muted" href="#">{{ __('Merchandasing')}}</a></li>
                <li><a class="text-muted" href="#">{{ __('F.A.Q')}}</a></li>
                <li><a class="text-muted" href="#">{{ __('Contact') }}</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5 class="text-center">{{ __('My Account') }}</h5>
            <ul class="list-unstyled text-small">
            @if(Auth::user())
                <li><a class="text-muted" href="#">{{__('Profile')}}</a></li>
                <li><a class="text-muted" href="#">{{__('Favorite')}}</a></li>
                <li><a class="text-muted" href="#">{{__('Search history')}}</a></li>
                <li><a class="text-muted" href="#">{{__('Logout')}}</a></li>
            @else
                <li><a class="text-muted" href="#">{{__('Login')}}</a></li>
                <li><a class="text-muted" href="#">{{__('Register')}}</a></li>
                <li><a class="text-muted" href="#">{{__('Terms and conditions')}}</a></li>
            @endif
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5 class="text-center">About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
    </div>
</footer>