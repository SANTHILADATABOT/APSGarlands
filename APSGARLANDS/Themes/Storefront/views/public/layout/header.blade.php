<header class="header-wrap">
    <div class="header-wrap-inner">
        <div class="container">
            <div class="row flex-nowrap justify-content-between position-relative">
                <div class="header-column-left">
                    <div class="sidebar-menu-icon-wrap">
                        <div class="sidebar-menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <a href="{{ route('home') }}" class="header-logo">
                        @if (is_null($logo))
                            <h3>{{ setting('store_name') }}</h3>
                        @else
                            <img src="{{ $logo }}" alt="logo">
                        @endif
                    </a>
                </div>

                <header-search :categories="{{ $categories }}" :most-searched-keywords="{{ $mostSearchedKeywords }}"
                    is-most-searched-keywords-enabled="{{ setting('storefront_most_searched_keywords_enabled') }}"
                    initial-query="{{ request('query') }}" initial-category="{{ request('category') }}">
                </header-search>

                <!-- old menus -->
                <!-- <div class="header-column-right d-flex">
                    <a href="{{ route('account.wishlist.index') }}" class="header-wishlist">
                        <div class="icon-wrap">
                            <i class="lar la-heart"></i>
                            <div class="count" v-text="wishlistCount"></div>
                        </div>

                        <span>{{ trans('storefront::layout.favorites') }}</span>
                    </a>

                    <div class="header-cart">
                        <div class="icon-wrap">
                            <i class="las la-cart-arrow-down"></i>
                            <div class="count" v-text="cart.quantity"></div>
                        </div>

                        <span v-html="cart.subTotal.inCurrentCurrency.formatted"></span>
                    </div>
                </div> -->



                <!-- Added new menus -->

                <div class="header-column-right d-flex">

                    <div class="header-contact header">
                        <a href="{{ route('contact.create') }}" class="menu-link" style='margin:0;'>
                            <div class="icon-wrap">
                                <i class="las la-phone"></i>
                            </div>
                            <span style="display:none">{{ trans('storefront::layout.contact') }}</span>
                        </a>
                    </div>

                    <div class="header-contact header">
                        <a href="{{ route('compare.index') }}" class="menu-link">
                            <div class="icon-wrap">
                                <i class="las la-random"></i>
                            </div>
                            <span style="display:none">{{ trans('storefront::layout.compare') }}</span>
                        </a>
                    </div>


                    <div class="header-contact header">
                        <a href="{{ route('account.wishlist.index') }}" class="header-wishlist menu-link">
                            <div class="icon-wrap">
                                <i class="lar la-heart"></i>
                                <div class="count" v-text="wishlistCount"></div>
                            </div>

                            <span>{{ trans('storefront::layout.favorites') }}</span>
                        </a>
                    </div>

                    <div class="header-cart">
                        <div class="icon-wrap">
                            <i class="las la-cart-arrow-down"></i>
                            <div class="count" v-text="cart.quantity"></div>
                        </div>

                        <span v-html="cart.subTotal.inCurrentCurrency.formatted"></span>
                    </div>

                    <!-- new  -->




                    @if (is_multilingual())
                        <li>
                            <i class="las la-language"></i>
                            <select class="custom-select-option arrow-black" onchange="location = this.value">
                                @foreach (supported_locales() as $locale => $language)
                                    <option value="{{ localized_url($locale) }}"
                                        {{ locale() === $locale ? 'selected' : '' }}>
                                        {{ $language['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </li>
                    @endif

                    @if (is_multi_currency())
                        <li>
                            <i class="las la-money-bill"></i>
                            <select class="custom-select-option arrow-black" onchange="location = this.value">
                                @foreach (setting('supported_currencies') as $currency)
                                    <option value="{{ route('current_currency.store', ['code' => $currency]) }}"
                                        {{ currency() === $currency ? 'selected' : '' }}>
                                        {{ $currency }}
                                    </option>
                                @endforeach
                            </select>
                        </li>
                    @endif









                    <!-- <div class='quick-menu' style='display:flex'>
                        <i class='las la-phone' onclick='toggleView()'></i>

                        <div id='view' style='display:none' class='view-menu'>
                            <div class="header-contact header">
                                <a href="{{ route('contact.create') }}" class="menu-link">
                                    <div class="icon-wrap">
                                        <i class="las la-phone"></i>
                                    </div>
                                    <span>{{ trans('storefront::layout.contact') }}</span>
                                </a>
                            </div>


                            @auth
                                    <div class="header-contact header">
                                        <a href="{{ route('account.dashboard.index') }}" class="menu-link">
                                            <div class="icon-wrap">
                                                <i class="las la-user"></i>
                                            </div>
                                            <span>{{ trans('storefront::layout.account') }}</span>
                                        </a>
                                    </div>
@else
    <div class="header-contact header">
                                        <a href="{{ route('login') }}" class="menu-link">
                                            <div class="icon-wrap">
                                                <i class="las la-sign-in-alt"></i>
                                            </div>
                                            <span>{{ trans('storefront::layout.login') }}</span>
                                        </a>
                                    </div>
                            @endauth
                        </div>
                    </div> -->



                    <div class='' style='display:flex'>

                        @auth
                            <div class="header-contact header">
                                <a href="{{ route('account.dashboard.index') }}" class="menu-link">
                                    <div class="icon-wrap">
                                        @switch(true)
                                            @case(auth()->user()->sso_google == '1' || auth()->user()->sso_fb == '1')
                                                <img src="{{ auth()->user()->sso_avatar }}" alt="User Profile Image"
                                                    class="profile-image" width="50px" height="50px">
                                            @break

                                            @case(auth()->user()->sso_fb == '' && auth()->user()->sso_google == '' && !empty(auth()->user()->image_url))
                                                <img src="{{ auth()->user()->image_url }}" alt="User Profile Image"
                                                    class="profile-image" width="50px" height="50px">
                                            @break

                                            @default
                                                <i class="las la-user"></i>
                                        @endswitch
                                    </div>
                                    <span>{{ trans('storefront::layout.account') }}</span>
                                </a>
                            </div>
                        @else
                            <div class="header-contact header">
                                <a href="{{ route('login') }}" class="menu-link">
                                    <div class="icon-wrap">
                                        <i class="las la-sign-in-alt"></i>
                                    </div>
                                    <span>{{ trans('storefront::layout.login') }}</span>
                                </a>
                            </div>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
