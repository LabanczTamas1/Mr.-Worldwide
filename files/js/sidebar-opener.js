function toggleSidebar() {
    console.log("Toggling sidebar");
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('overlay');
    if (sidebar.classList.contains('sidebar-open')) {
        sidebar.classList.remove('sidebar-open');
        if (overlay) overlay.classList.remove('overlay-show');
    } else {
        sidebar.classList.add('sidebar-open');
        if (overlay) overlay.classList.add('overlay-show');
    }
}
