<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title>LuxSpace - @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/content/favicon.png') }}" />
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
    <link rel="icon" href="{{ asset('frontend/images/content/favicon.png') }}" />

    <meta name="theme-color" content="#000" />
    <link rel="icon" href="favicon.ico">
    <link href="{{ asset('frontend/css/app.minify.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Add your site or application content here -->

    <!-- START: HEADER -->
    <header class="w-full z-50 px-4">
        <div class="container mx-auto py-5">
            <div class="flex flex-stretch items-center">
                <div class="w-56 items-center flex">
                    <img src="{{ asset('frontend/images/content/logo.png') }}" alt="Luxspace | Fulfill your house with beautiful furniture" />
                </div>
                <div class="w-full"></div>
                <div class="w-auto">
                    <ul class="fixed bg-white inset-0 z-0 flex flex-col invisible items-center justify-center opacity-0 md:visible md:flex-row md:bg-transparent md:relative md:opacity-100 md:flex md:items-center" id="menu">
                        @foreach ($category as $row)
                        <li class="mx-3 py-6 md:py-0">
                            <a href="{{ route('detail.category', $row->slug) }}" class="text-black md:text-black hover:underline">{{ $row->name }}</a>
                        </li>
                        @endforeach

                        @if (Auth::check())
                        @if (Auth::user()->role === 'admin')
                        <li class="mx-3 py-6 md:py-0">
                            <a href="{{ route('admin.dashboard') }}" class="text-black md:text-black hover:underline">
                                Dashboard
                            </a>
                        </li>
                        @else
                        <li class="mx-3 py-6 md:py-0">
                            <a href="{{ route('user.dashboard') }}" class="text-black md:text-black hover:underline">
                                Dashboard
                            </a>
                        </li>
                        @endif
                        <div class="w-auto">
                            <ul class="items-center flex">
                                <li class="ml-6">
                                    <a id="header-cart" class="flex items-center justify-center w-8 h-8 text-black md:text-black" href="{{ route('cart') }}">
                                        <svg class="fill-current" width="26" height="24" viewBox="0 0 26 24">
                                            <path d="M10.8754 18.7312C9.61762 18.7312 8.59436 19.7115 8.59436 20.9164C8.59436 22.1214 9.61762 23.1017 10.8754 23.1017C12.1331 23.1017 13.1564 22.1214 13.1564 20.9164C13.1563 19.7115 12.1331 18.7312 10.8754 18.7312ZM10.8754 21.8814C10.3199 21.8814 9.86796 21.4485 9.86796 20.9163C9.86796 20.3842 10.3199 19.9512 10.8754 19.9512C11.4308 19.9512 11.8828 20.3842 11.8828 20.9163C11.8828 21.4486 11.4308 21.8814 10.8754 21.8814Z" />
                                            <path d="M18.8764 18.7312C17.6186 18.7312 16.5953 19.7115 16.5953 20.9164C16.5953 22.1214 17.6186 23.1017 18.8764 23.1017C20.1342 23.1017 21.1575 22.1214 21.1575 20.9164C21.1574 19.7115 20.1341 18.7312 18.8764 18.7312ZM18.8764 21.8814C18.3209 21.8814 17.869 21.4485 17.869 20.9163C17.869 20.3842 18.3209 19.9512 18.8764 19.9512C19.4319 19.9512 19.8838 20.3842 19.8838 20.9163C19.8838 21.4486 19.4319 21.8814 18.8764 21.8814Z" />
                                            <path d="M19.438 7.2262H10.3122C9.96051 7.2262 9.67542 7.49932 9.67542 7.83626C9.67542 8.1732 9.96056 8.44632 10.3122 8.44632H19.438C19.7897 8.44632 20.0748 8.1732 20.0748 7.83626C20.0748 7.49927 19.7897 7.2262 19.438 7.2262Z" />
                                            <path d="M18.9414 10.3942H10.8089C10.4572 10.3942 10.1721 10.6673 10.1721 11.0042C10.1721 11.3412 10.4572 11.6143 10.8089 11.6143H18.9413C19.293 11.6143 19.5781 11.3412 19.5781 11.0042C19.5781 10.6673 19.293 10.3942 18.9414 10.3942Z" />
                                            <path d="M25.6499 4.508C25.407 4.22245 25.0472 4.05871 24.6626 4.05871H4.82655L4.42595 2.19571C4.34232 1.80709 4.06563 1.48078 3.68565 1.32272L0.890528 0.160438C0.567841 0.0261566 0.192825 0.168008 0.0528584 0.477043C-0.0872597 0.786176 0.0608116 1.14549 0.383347 1.27957L3.17852 2.4419L6.2598 16.7708C6.38117 17.3351 6.90578 17.7446 7.50723 17.7446H22.7635C23.1152 17.7446 23.4003 17.4715 23.4003 17.1346C23.4003 16.7976 23.1152 16.5245 22.7635 16.5245H7.50728L7.13247 14.7815H22.8814C23.4828 14.7815 24.0075 14.3719 24.1288 13.8076L25.9101 5.52488C25.9876 5.16421 25.8928 4.79349 25.6499 4.508ZM22.8814 13.5615H6.87012L5.08895 5.27879L24.6626 5.27884L22.8814 13.5615Z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @else
                        <li class="mx-3 py-6 md:py-0">
                            <a href="{{ route('login') }}" class="text-black md:text-black hover:underline">
                                Log in
                            </a>
                        </li>
                        <li class="mx-3 py-6 md:py-0">
                            <a href="{{ route('register') }}" class="text-black md:text-black hover:underline">
                                Register
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="w-auto">
                    <ul class="items-center flex">
                        <li class="ml-6 block md:hidden">
                            <button id="menu-toggler" class="relative flex z-50 items-center justify-center w-8 h-8 text-black md:text-white focus:outline-none">
                                <svg class="fill-current" width="18" height="17" viewBox="0 0 18 17">
                                    <path d="M15.9773 0.461304H1.04219C0.466585 0.461304 0 0.790267 0 1.19609C0 1.60192 0.466668 1.93088 1.04219 1.93088H15.9773C16.5529 1.93088 17.0195 1.60192 17.0195 1.19609C17.0195 0.790208 16.5529 0.461304 15.9773 0.461304Z" />
                                    <path d="M15.9773 7.68802H1.04219C0.466585 7.68802 0 8.01698 0 8.42281C0 8.82864 0.466668 9.1576 1.04219 9.1576H15.9773C16.5529 9.1576 17.0195 8.82864 17.0195 8.42281C17.0195 8.01692 16.5529 7.68802 15.9773 7.68802Z" />
                                    <path d="M15.9773 14.9147H1.04219C0.466585 14.9147 0 15.2437 0 15.6495C0 16.0553 0.466668 16.3843 1.04219 16.3843H15.9773C16.5529 16.3843 17.0195 16.0553 17.0195 15.6495C17.0195 15.2436 16.5529 14.9147 15.9773 14.9147Z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
    </header>

    <!-- END: HEADER -->

    @yield('content')

    <!-- START: ASIDE MENU -->
    <section class="">
        <div class="border-b border-gray-200 py-12 mt-16 px-4">
            <div class="flex justify-center mb-8">
                <img src="{{ asset('frontend/images/content/logo.png') }}" alt="Luxspace | Fulfill your house with beautiful furniture" />
            </div>
            <aside class="container mx-auto">
                <div class="flex flex-wrap -mx-4 justify-center">
                    <div class="px-4 w-full md:w-2/12 mb-4 md:mb-0 accordion">
                        <h5 class="text-lg font-semibold mb-2 relative">Overview</h5>
                        <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
                            <li>
                                <a href="#" class="hover:underline py-1 block">Shipping</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline py-1 block">Refund</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline py-1 block">Promotion</a>
                            </li>
                        </ul>
                    </div>
                    <div class="px-4 w-full md:w-2/12 mb-4 md:mb-0 accordion">
                        <h5 class="text-lg font-semibold mb-2 relative">Company</h5>
                        <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
                            <li>
                                <a href="#" class="hover:underline py-1 block">About</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline py-1 block">Career</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline py-1 block">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="px-4 w-full md:w-2/12 mb-4 md:mb-0 accordion">
                        <h5 class="text-lg font-semibold mb-2 relative">Explore</h5>
                        <ul class="h-0 invisible md:h-auto md:visible overflow-hidden">
                            <li>
                                <a href="#" class="hover:underline py-1 block">Terms & Conds</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline py-1 block">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline py-1 block">For Developer</a>
                            </li>
                        </ul>
                    </div>
                    <div class="px-4 w-full md:w-3/12 mb-4 md:mb-0">
                        <h5 class="text-lg font-semibold mb-2 relative">
                            Special Letter
                        </h5>
                        <form action="#">
                            <label class="relative w-full">
                                <input type="text" class="bg-gray-100 rounded-xl py-3 px-5 w-full focus:outline-none" placeholder="Your email adress" />
                                <button class="bg-pink-400 absolute rounded-xl right-0 p-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.6177 0.411971C23.6163 0.410624 23.6152 0.409187 23.6138 0.407839C23.6124 0.406492 23.6109 0.405414 23.6095 0.404157C23.236 0.049307 22.7002 -0.0573008 22.2098 0.126411L0.833871 8.13353C0.268743 8.34518 -0.0623361 8.87521 0.0098048 9.4523C0.0821332 10.0294 0.53462 10.4694 1.13589 10.547L11.5833 11.8968C11.6028 11.8994 11.6185 11.9143 11.6212 11.9332L13.0301 21.9417C13.1112 22.5177 13.5704 22.9512 14.1729 23.0204C14.2279 23.0268 14.2824 23.0298 14.3364 23.0298C14.8735 23.0298 15.3486 22.7229 15.5495 22.231L23.9077 1.75274C24.0994 1.28302 23.9882 0.76983 23.6177 0.411971ZM1.30534 9.34475C1.2819 9.34169 1.27136 9.34039 1.26728 9.30788C1.26325 9.27537 1.27319 9.27159 1.29508 9.26347L21.2946 1.77187L11.9404 10.7333C11.8794 10.7163 1.30534 9.34475 1.30534 9.34475ZM14.37 21.7892C14.3614 21.8102 14.358 21.8198 14.3236 21.8158C14.2897 21.8119 14.2883 21.8017 14.2852 21.7794C14.2852 21.7794 12.8535 11.6495 12.8358 11.5911L22.19 2.62972L14.37 21.7892Z" fill="white" />
                                    </svg>
                                </button>
                            </label>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <!-- END: ASIDE MENU -->

    <!-- START: FOOTER -->
    <footer class="flex text-center px-4 py-8 justify-center">
        <p class="text-sm">
            Copyright 2021 • All Rights Reserved LuxSpace by BuildWith Angga
        </p>
    </footer>
    <!-- END: FOOTER -->

    <!-- START: LOAD SVG -->
    <!-- <svg width="23" height="26" class="hidden" id="icon-play">
      <path
        d="M21 9.536c2.667 1.54 2.667 5.39 0 6.928l-15 8.66c-2.667 1.54-6-.385-6-3.464V4.34C0 1.26 3.333-.664 6 .876l15 8.66z"
        fill="#fff"
      />
    </svg> -->
    <!-- END: LOAD SVG  -->

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments);
        };
        ga.q = [];
        ga.l = +new Date();
        ga("create", "UA-XXXXX-Y", "auto");
        ga("set", "anonymizeIp", true);
        ga("set", "transport", "beacon");
        ga("send", "pageview");
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
</body>

</html>