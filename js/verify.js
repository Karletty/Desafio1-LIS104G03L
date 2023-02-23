let params = new URLSearchParams(location.search);

if (params.get('login') || sessionStorage.getItem('authenticated')) {
      sessionStorage.setItem('authenticated', true);
      if (!window.location.pathname.includes('admin.php') || params.get('login'))
            window.location.href = 'admin.php';
}
else {
      if (!window.location.pathname.includes('login.php'))
            window.location.href = 'login.php'
}