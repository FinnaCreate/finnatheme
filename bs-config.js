module.exports = {
    open: false,
    // host: 'wordpress.test',
    proxy: 'https://wordpress.test',
    https: {
        key: '/Users/Saucz/Dropbox/Web/Certs/wordpress.test-key.pem',
        cert: '/Users/Saucz/Dropbox/Web/Certs/wordpress.test.pem'
    },
    files: './'
}
