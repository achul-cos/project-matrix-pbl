@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="pb-0">
    <div class="flex justify-center items-center min-h-screen px-4 py-12">
        <!-- Card Anda dengan beberapa perbaikan -->
        <div class="w-full md:max-w-xl p-6 bg-white border border-gray-200 rounded-2xl shadow-xl sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="#">

               <a href="/login">
                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-dropdown-placement="bottom-start" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
                    <
                </button>
               </a>

               <div class="flex justify-center">
               <svg class="w-full  items-center mb-5 h-40 text-gray-800 dark:text-white" aria-hidden="true" width="700" height="600" viewBox="0 0 700 600" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M278 411H376.905H394C394 399.367 373.853 396.918 365.305 392.633C356.758 388.347 351.874 381 340.884 381C329.895 381 317.074 395.694 302.421 396.918C290.699 397.898 281.256 406.714 278 411Z" fill="#d6e2fb" fill-opacity="0.6"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M168.025 452.826L184.978 389.558L186.909 390.076L169.957 453.344L168.025 452.826Z" fill="#c8d8fa"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M168.025 452.826L184.978 389.558L186.909 390.076L169.957 453.344L168.025 452.826Z" fill="url(#paint0_linear_275_1035)"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M214.384 396.738L215.459 398.425L178.777 421.802L198.856 460.388L197.082 461.311L176.157 421.1L214.384 396.738Z" fill="#c8d8fa"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M214.384 396.738L215.459 398.425L178.777 421.802L198.856 460.388L197.082 461.311L176.157 421.1L214.384 396.738Z" fill="url(#paint1_linear_275_1035)"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M157.853 381.591L156.079 382.514L176.158 421.1L139.476 444.477L140.551 446.164L178.778 421.802L157.853 381.591Z" fill="#c8d8fa"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M157.853 381.591L156.079 382.514L176.158 421.1L139.476 444.477L140.551 446.164L178.778 421.802L157.853 381.591Z" fill="url(#paint2_linear_275_1035)"/>
<rect x="175.032" y="411.222" width="10" height="19" rx="2" transform="rotate(15 175.032 411.222)" fill="#2563eb"/>
<rect x="175.032" y="411.222" width="10" height="19" rx="2" transform="rotate(15 175.032 411.222)" fill="url(#paint3_linear_275_1035)"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M185.134 362.165L149.567 352.635L149.38 352.585L149.276 352.422C137.81 334.549 121.304 303.062 108.32 266.461C95.3374 229.866 86.0931 188.176 89.6644 150.043C94.1343 102.315 121.143 69.4602 157.325 51.3142C193.49 33.1765 238.816 29.7315 279.99 40.764C321.164 51.7965 358.694 77.4428 380.945 111.233C403.207 145.039 410.17 186.996 390.177 230.565C374.203 265.375 345.353 296.857 315.812 322.058C286.267 347.263 256.353 366.313 237.488 376.058L237.316 376.147L237.129 376.097L195.764 365.013L185.134 362.165Z" fill="#c8d8fa"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M221.78 34.7273C198.646 51.2191 176.94 80.4991 170.261 129.77C158.361 217.555 174.997 318.453 185.658 361.788L191.022 363.225C194.115 329.503 199.298 278.136 205.172 229.587C211.23 179.508 218.034 132.331 224.049 110.658C234.826 71.8267 247.187 49.0496 258.42 36.3452C246.255 34.5991 233.935 34.058 221.78 34.7273ZM218.074 34.9692C195.498 52.0571 174.797 81.4221 168.279 129.502C156.43 216.912 172.752 317.152 183.454 361.197L175.131 358.967C161.056 317.988 134.228 225.304 133.544 164.301C132.78 96.1295 164.505 55.5421 185.948 40.419C196.339 37.6117 207.126 35.7964 218.074 34.9692ZM180.606 41.9606C158.919 59.5359 130.821 99.831 131.544 164.323C132.225 225.043 158.609 316.716 172.804 358.344L162.559 355.598C153.367 338.076 140.638 305.164 129.848 269.65C118.722 233.031 109.7 193.782 108.721 165.908C107.173 121.867 116.647 89.043 137.906 63.0852C143.992 58.6151 150.495 54.6701 157.325 51.2493C164.738 47.5364 172.537 44.4408 180.606 41.9606ZM131.558 68.0687C108.814 87.1461 93.0367 114.373 89.7235 149.819C86.1641 187.898 95.4152 229.53 108.401 266.077C121.389 302.629 138.13 334.14 149.594 351.99L149.699 352.153L149.886 352.203L159.945 354.898C150.744 336.855 138.413 304.721 127.934 270.232C116.797 233.575 107.711 194.122 106.722 165.978C105.281 124.965 113.332 93.4253 131.558 68.0687ZM260.791 36.7011C249.655 48.834 237.02 71.3989 225.976 111.193C220.009 132.691 213.221 179.705 207.157 229.827C201.267 278.518 196.07 330.049 192.982 363.75L193.418 363.867C207.594 333.137 228.859 285.911 248.103 240.799C267.913 194.359 285.541 150.25 291.123 128.649C301.464 88.6318 301.797 62.7635 298.209 46.6907C292.224 44.3942 286.117 42.4057 279.927 40.7473C273.63 39.0598 267.235 37.7109 260.791 36.7011ZM300.441 47.5635C303.827 64.1807 303.151 90.0976 293.059 129.149C287.432 150.926 269.735 195.185 249.943 241.584C230.755 286.565 209.56 333.642 195.378 364.392L195.83 364.513L200.742 365.83C231.642 333.631 296.498 254.568 330.085 172.595C348.977 126.487 344.761 90.2199 332.914 64.3596C322.737 57.7482 311.82 52.0983 300.441 47.5635ZM336.003 66.4116C347.07 92.513 350.373 128.355 331.935 173.353C298.492 254.977 234.236 333.626 202.946 366.42L211.268 368.65C243.947 340.199 313.523 273.346 344.617 220.858C379.569 161.856 372.097 110.588 360.98 86.9526C353.408 79.4152 345.016 72.531 336.003 66.4116ZM364.869 90.959C374.978 116.915 379.386 166.088 346.338 221.877C315.388 274.122 246.703 340.321 213.595 369.274L222.393 371.631C239.114 361.052 266.594 338.913 293.695 313.553C321.64 287.403 349.077 257.923 363.863 234.273C388.498 194.869 396.281 160.139 388.989 125.217C386.573 120.389 383.852 115.692 380.853 111.144C376.166 104.035 370.802 97.2863 364.869 90.959ZM392.29 132.347C397.151 165.323 388.662 198.378 365.559 235.333C350.63 259.212 323.035 288.836 295.062 315.013C268.742 339.643 241.996 361.305 225.006 372.331L236.819 375.496L237.006 375.546L237.178 375.458C256.031 365.731 286.284 346.813 315.808 321.652C345.328 296.494 374.156 265.065 390.113 230.308C406.086 195.516 404.824 161.747 392.29 132.347Z" fill="url(#paint4_linear_275_1035)"/>
<path d="M149.336 352.573C179.995 353.968 209.986 362.004 237.235 376.125L234.864 378.144C227.673 384.265 222.514 392.428 220.07 401.549L151.489 383.173C153.933 374.052 153.546 364.403 150.38 355.506L149.336 352.573Z" fill="#c8d8fa"/>
<path d="M149.336 352.573C179.995 353.968 209.986 362.004 237.235 376.125L234.864 378.144C227.673 384.265 222.514 392.428 220.07 401.549L151.489 383.173C153.933 374.052 153.546 364.403 150.38 355.506L149.336 352.573Z" fill="url(#paint5_linear_275_1035)"/>
<rect width="44" height="69" transform="matrix(-0.965926 -0.258819 -0.258819 0.965926 232.294 467.976)" fill="#2563eb"/>
<rect width="44" height="69" transform="matrix(-0.965926 -0.258819 -0.258819 0.965926 232.294 467.976)" fill="url(#paint6_linear_275_1035)"/>
<rect x="112.52" y="435.883" width="80" height="69" transform="rotate(15 112.52 435.883)" fill="#2563eb"/>
<rect x="111.826" y="477.108" width="29" height="19" rx="2" transform="rotate(15 111.826 477.108)" fill="#d6e2fb"/>
<rect x="112.395" y="486.578" width="16" height="2" rx="1" transform="rotate(15 112.395 486.578)" fill="#2563eb"/>
<path d="M204.282 460.471L216.839 463.835L213.733 475.426C213.448 476.493 212.351 477.127 211.284 476.841L202.591 474.511C201.524 474.225 200.891 473.129 201.176 472.062L204.282 460.471Z" fill="#c8d8fa" fill-opacity="0.2"/>
<rect x="111.359" y="490.441" width="12" height="2" rx="1" transform="rotate(15 111.359 490.441)" fill="#2563eb"/>
<path d="M116.5 39.5H35.5H21.5C21.5 30 38 28 45 24.5C52 21 56 15 65 15C74 15 84.5 27 96.5 28C106.1 28.8 113.833 36 116.5 39.5Z" fill="#d6e2fb"/>
<defs>
<linearGradient id="paint0_linear_275_1035" x1="185.943" y1="389.817" x2="168.991" y2="453.085" gradientUnits="userSpaceOnUse">
<stop stop-color="#9ab7f6"/>
<stop offset="1" stop-color="#9ab7f6" stop-opacity="0"/>
</linearGradient>
<linearGradient id="paint1_linear_275_1035" x1="200.309" y1="392.967" x2="183.006" y2="457.54" gradientUnits="userSpaceOnUse">
<stop stop-color="#9ab7f6"/>
<stop offset="1" stop-color="#9ab7f6" stop-opacity="0"/>
</linearGradient>
<linearGradient id="paint2_linear_275_1035" x1="171.929" y1="385.362" x2="154.626" y2="449.935" gradientUnits="userSpaceOnUse">
<stop stop-color="#9ab7f6"/>
<stop offset="1" stop-color="#9ab7f6" stop-opacity="0"/>
</linearGradient>
<linearGradient id="paint3_linear_275_1035" x1="180.032" y1="403.222" x2="180.032" y2="430.222" gradientUnits="userSpaceOnUse">
<stop stop-color="#111928"/>
<stop offset="1" stop-color="#111928" stop-opacity="0"/>
</linearGradient>
<linearGradient id="paint4_linear_275_1035" x1="258.704" y1="119.953" x2="193.352" y2="363.849" gradientUnits="userSpaceOnUse">
<stop stop-color="#d6e2fb"/>
<stop offset="1" stop-color="#d6e2fb" stop-opacity="0"/>
</linearGradient>
<linearGradient id="paint5_linear_275_1035" x1="211.661" y1="295.768" x2="185.78" y2="392.361" gradientUnits="userSpaceOnUse">
<stop stop-color="#2563eb"/>
<stop offset="1" stop-color="#2563eb" stop-opacity="0"/>
</linearGradient>
<linearGradient id="paint6_linear_275_1035" x1="22" y1="-28.5" x2="22" y2="69" gradientUnits="userSpaceOnUse">
<stop stop-color="#111928"/>
<stop offset="1" stop-color="#111928" stop-opacity="0"/>
</linearGradient>
</defs>
</svg>
</div>

                <h5 class="text-2xl font-bold text-[#556B2F] mb-3 text-center">Lupa Kata Sandi Anda?</h5>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Masukkan email untuk menerima link atur ulang kata sandi
                    </label>
                    <input type="email" name="email" id="email" class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 
                        dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email" required/>
                </div>
                
                <a href="/otp">
                <button 
                    type="submit" class="w-full bg-[#556B2F] hover:bg-[#6e8239] text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                    dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Kirim Email
                </button>
                </a>

            </form>
        </div>
    </div>
</div>

@endsection