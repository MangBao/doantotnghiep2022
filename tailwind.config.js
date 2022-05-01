const zIndex = {};
const minHeight = {};
const keyframes = {
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
};
const animation = {
    'fadeInDown': 'fadeInDown 0.8s ease-out',
};
const screens = {
    'xs': '375px',
    'sm': '576px',
    'md': '768px',
    'lg': '992px',
    'xl': '1200px',
    '2xl': '1440px',
    'down-md': {'max': '767px'},
}
// Loop zIndex
for (let i = 0; i < 101; i++) {
    zIndex[i] = i + i
}
// Loop minHeight
for (let i = 0; i < 500; i++) {
    minHeight[i] = i * 2 + 'px'
    p = i + 'p'
    minHeight[p] = i + '%'
}
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/@my-company/tailwind-components/**/*.js",
    ],
    theme: {
        screens,
        minHeight,
        extend: {
            zIndex,
            keyframes,
            animation
        },
    },
    plugins: [

    ],
};


