<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('mainWebsite.TitleMainSite') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @livewireStyles
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 px-6 dark:text-gray-500 underline">Hodowla</a>
                @endauth
                <select onchange="location = this.value;">
                    <option disabled selected hidden>{{ __('mainWebsite.SelectLang') }}</option>
                    <option value="{{ url('change-language/pl') }}">Polish</option>
                    <option value="{{ url('change-language/en') }}">English</option>
                    <option value="{{ url('change-language/fr') }}">French</option>
                    <option value="{{ url('change-language/it') }}">Italian</option>
                    <option value="{{ url('change-language/de') }}">German</option>
                    <option value="{{ url('change-language/dk') }}">Danish</option>
                    <option value="{{ url('change-language/cz') }}">Czech</option>
                    <option value="{{ url('change-language/ru') }}">Russian</option>
                </select>
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 mb-16">
                <svg viewBox="0 0 682.66669 682.66669" class="h-16 w-auto" xmlns:svg="http://www.w3.org/2000/svg">
                    <defs id="defs1789">
                        <clipPath clipPathUnits="userSpaceOnUse" id="clipPath1799">
                            <path d="M 0,512 H 512 V 0 H 0 Z" id="path1797" />
                        </clipPath>
                    </defs>
                    <g id="g1791" transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                        <g id="g1793">
                            <g id="g1795" clip-path="url(#clipPath1799)">
                                <g id="g1801" transform="translate(391,437)">
                                    <path
                                        d="M 0,0 C 0,8.284 6.716,15 15,15 23.284,15 30,8.284 30,0 30,-8.284 23.284,-15 15,-15 6.716,-15 0,-8.284 0,0"
                                        style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                        id="path1803" />
                                </g>
                                <g id="g1805" transform="translate(254.0137,138.9727)">
                                    <path d="M 0,0 31.986,-63.973"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1807" />
                                </g>
                                <g id="g1809" transform="translate(286,497)">
                                    <path d="M 0,0 H 121"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1811" />
                                </g>
                                <g id="g1813" transform="translate(497,407)">
                                    <path d="M 0,0 H -31"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1815" />
                                </g>
                                <g id="g1817" transform="translate(196.4551,134.0898)">
                                    <path d="M 0,0 29.545,-59.09"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1819" />
                                </g>
                                <g id="g1821" transform="translate(215.0811,135)">
                                    <path
                                        d="M 0,0 C 105.441,0 190.919,87.477 190.919,192.918 V 212 c 0,33.137 26.863,60 60,60 v 30 c 0,36.44 -32.485,65.293 -70.076,59.179 C 151.342,356.38 130.919,328.716 130.919,298.5 129.619,241.366 82.93,195.727 25.78,195.727 c -64.481,0 -122.2,-40.998 -144.843,-101.373 L -200.081,-120 -135,-55.919 C -99.195,-20.115 -50.635,0 0,0 Z"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1823" />
                                </g>
                                <g id="g1825" transform="translate(406.0186,348.5039)">
                                    <path
                                        d="m 0,0 c -4.853,-0.986 -9.875,-1.504 -15.019,-1.504 -25.495,0 -48.018,12.721 -61.57,32.162"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1827" />
                                </g>
                                <g id="g1829" transform="translate(286,340.8818)">
                                    <path d="m 0,0 c 0,-79.464 -64.418,-144.882 -143.882,-144.882 h -58.609"
                                        style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                        id="path1831" />
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <div class="flex items-center ml-9 text-2xl">
                    <span>{{ __('mainWebsite.title') }}</span>
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-5">

                    <div
                        class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l md:col-span-5">
                        <div class="mx-12">
                            <div class="mt-2 space-y-5 text-justify text-gray-600 dark:text-gray-400 text-base">
                                <p>{{ __('mainWebsite.maintext1') }}</p>
                                <p>{{ __('mainWebsite.maintext2') }}</p>
                                <p>{{ __('mainWebsite.maintext3') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:col-span-3">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">{{ __('mainWebsite.offert') }}</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 space-y-2 text-justify text-gray-600 dark:text-gray-400 text-sm">
                                <p>{{ __('mainWebsite.mainoffert1') }}</p>

                                <p>{{ __('mainWebsite.mainoffert2') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:col-span-2 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                {{ __('mainWebsite.contact') }}</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm grid grid-cols-4">
                                <div class="space-y-1 col-span-1 font-semibold">
                                    <p>{{ __('mainWebsite.telephone') }}</p>
                                    <p>{{ __('mainWebsite.mail') }}</p>
                                    <p>{{ __('mainWebsite.address') }}</p>
                                </div>

                                <div class="space-y-1 col-span-3">
                                    <p><a href="tel:+48555555555">+48555555555</a></p>
                                    <p><a href="mailto:bazanty@localhost">bazanty@localhost</a></p>
                                    <p>Hodowla Bażantów</br>Ul. Kaliszka 119</br>62-800
                                        Kalisz</br>{{ __('mainWebsite.country') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-center">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-center sm:ml-0">
                    <?php echo date('Y'); ?>© {{ config('app.name') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
