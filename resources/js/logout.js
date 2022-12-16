const logout = document.getElementById('logoutBtn');

if (logout) {

    logout.addEventListener('click', ( e) => {
        e.preventDefault();
        const form = document.getElementById('logoutForm').submit();

    });

}