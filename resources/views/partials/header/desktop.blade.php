<header class="site__header d-lg-block d-none">
    <div class="site-header">
        <!-- .topbar -->
        @include('partials.topbar')
        <!-- .topbar / end -->
        <div class="site-header__middle container">
            <div class="site-header__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset($logo->desktop ?? '') }}" width="{{ config('services.logo.desktop.width', 260) }}" height="{{ config('services.logo.desktop.height', 54) }}" alt="Logo" style="max-width: 100%;">
                </a>
            </div>
            <div class="site-header__search">
                <div class="search">
                    <!-- HTML Markup -->
                    <div class="aa-input-container" id="aa-input-container">
                        <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for products..." name="search" value="{{ request('search') }}" autocomplete="off" />
                        <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
                            <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="d-flex text-light ml-3">
                <div class="nav-panel__indicators ml-0 mr-2">
                    <div class="indicator indicator--trigger--click">
                        <a href="#" class="indicator__button">
                                    <span class="indicator__area">
                                        <svg width="20" height="20">
                                            <circle cx="7" cy="17" r="2"></circle>
                                            <circle cx="15" cy="17" r="2"></circle>
                                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"></path>
                                        </svg>
                                        <span class="indicator__value cart-count"></span>
                                    </span>
                        </a>
                        <div class="indicator__dropdown">
                            <!-- .dropcart -->
                            <div class="dropcart">
                                <div class="dropcart__products-list">

                                </div>
                                <div class="dropcart__totals">
                                    <table>
                                        <tr>
                                            <th>@lang('Subtotal')</th>
                                            <td class="cart-subtotal">{!!  theMoney(0)  !!}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="dropcart__buttons">
                                    <a class="btn btn-primary" href="{{ route('checkout') }}">@lang('Checkout')</a>
                                </div>
                            </div><!-- .dropcart / end -->
                        </div>
                    </div>
                </div>
                @include('partials.auth-indicator')
            </div>
        </div>
        <div class="site-header__nav-panel">
            <div class="nav-panel">
                <div class="nav-panel__container container">
                    <div class="nav-panel__row">
                        @include('partials.departments')
                        <!-- .nav-links -->
                        @include('partials.header.menu.desktop')
                        <!-- .nav-links / end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
