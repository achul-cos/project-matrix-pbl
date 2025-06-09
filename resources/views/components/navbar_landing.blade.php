<!-- Navbar -->
<nav id="navbar" class="bg-transparent fixed w-full z-50 top-0 start-0 transition duration-300">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <!-- Logo -->
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="../../../../img/logo/Matrix_Icon_Square_Logo_White.png" class="h-12" alt="Matrix Logo" />
      <img src="../../../../img/logo/(M)ATRIX Text icon logo white.png" class="h-8 max-md:hidden" alt="Matrix Logo" />
      <p class="text-white font-bold ml-5 text-lg tracking-10 max-md:tracking-5 max-md:ml-2 max-md:text-base max-sm:hidden">
        Ngewarnet Tanpa Takut War PC
      </p>
    </a>

    <!-- Tombol -->
    <div class="flex order-1 space-x-3 md:space-x-0 rtl:space-x-reverse gap-4">
      <a href="/login">
        <button id="login"
          class="bg-transparent text-white border border-white font-black text-lg px-3 py-2 rounded-full transition duration-300 hover:bg-white/10">
          Login
        </button>
      </a>
      <a href="/register">
        <button id="register"
          class="bg-transparent text-white border border-white font-black text-lg px-3 py-2 rounded-full transition duration-300 hover:bg-white/10">
          Register
        </button>
      </a>
    </div>

  </div>
</nav>

<!-- Script -->
<script>
  const navbar   = document.getElementById('navbar');
  const loginBtn = document.getElementById('login');
  const regBtn   = document.getElementById('register');

  /* Kelas-kelas untuk dua “kostum” berbeda */
  const topClasses      = ['bg-transparent', 'text-white', 'border-white', 'hover:bg-white/10'];
  const scrolledClasses = ['bg-lime-600',   'text-lime-950', 'border-gray-950', 'hover:bg-lime-800', 'hover:text-lime-50'];

  function switchCostume(addList, removeList, el) {
    el.classList.remove(...removeList);
    el.classList.add(...addList);
  }

  window.addEventListener('scroll', () => {
    const pastTop = window.scrollY > 50;

    // Navbar background + bayangan
    navbar.classList.toggle('bg-lime-700', pastTop);
    navbar.classList.toggle('shadow-lg', pastTop);
    navbar.classList.toggle('bg-transparent', !pastTop);

    // Tombol kostum
    if (pastTop) {
      switchCostume(scrolledClasses, topClasses, loginBtn);
      switchCostume(scrolledClasses, topClasses, regBtn);
    } else {
      switchCostume(topClasses, scrolledClasses, loginBtn);
      switchCostume(topClasses, scrolledClasses, regBtn);
    }
  });
</script>
