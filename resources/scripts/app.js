// Navigation toggle
window.addEventListener('load', function () {
    const mainNavigation = document.querySelector('#primary-menu')
    document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
        e.preventDefault()
        mainNavigation.classList.toggle('hidden')
    })
})
