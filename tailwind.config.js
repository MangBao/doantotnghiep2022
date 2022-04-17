module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/@my-company/tailwind-components/**/*.js",
    ],
    theme: {
        extend: {
            zIndex: {
                "1": "1",
                "2": "2",
                "3": "3",
                "4": "4"
            }
        },
    },
    plugins: [],
}
