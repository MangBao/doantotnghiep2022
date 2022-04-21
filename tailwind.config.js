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
            },
            keyframes: {
                'fadeInDown': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
            },
            animation: {
                'fadeInDown': 'fadeInDown 0.8s ease-out',
            }
        },
    },
    plugins: [

    ],
}
